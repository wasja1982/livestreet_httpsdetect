<?php
/**
 * HTTPS Detect - отслеживание HTTP / HTTPS входа на сайт
 *
 * Версия:	1.0.0
 * Автор:	Александр Вереник
 * Профиль:	http://livestreet.ru/profile/Wasja/
 * GitHub:	https://github.com/wasja1982/livestreet_httpsdetect
 *
 **/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (! class_exists ( 'Plugin' )) {
    die ( 'Hacking attemp!' );
}

class PluginHttpsdetect extends Plugin {

    protected $aInherits = array(
        'action' => array('ActionAjax'),
        'entity' => array('ModuleUser_EntityUser', 'ModuleTopic_EntityTopic', 'ModuleTopic_EntityTopicPhoto', 'ModuleComment_EntityComment'),
        'module' => array('ModuleViewer')
    );

    /**
     * Активация плагина
     */
    public function Activate() {
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
        return true;
    }

    static public function CorrectUrl($sUrl, $bBidirect = true) {
        $bHttps = Config::Get('plugin.httpsdetect.https');
		if ($bHttps) {
            $sUrl = str_replace('http://', 'https://', $sUrl);
        } elseif ($bBidirect) {
            $sUrl = str_replace('https://', 'http://', $sUrl);
        }
		return $sUrl;
    }

    static public function CorrectImages($sText, $bBidirect = true) {
        if (Config::Get('plugin.httpsdetect.correct_img_src')) {
            $bHttps = Config::Get('plugin.httpsdetect.https');
            $sServer = parse_url(Config::Get('path.root.web'), PHP_URL_HOST);

            if ($bHttps) {
                $sText = preg_replace('~(src\s*=\s*["|\'])http:\/\/' . $sServer . '~musi', '$1https://' . $sServer, $sText);
            } elseif ($bBidirect) {
                $sText = preg_replace('~(src\s*=\s*["|\'])https:\/\/' . $sServer . '~musi', '$1http://' . $sServer, $sText);
            }
        }
		return $sText;
    }
}