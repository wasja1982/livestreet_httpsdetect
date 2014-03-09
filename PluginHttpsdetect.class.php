<?php
/**
 * HTTPS Detect - отслеживание HTTP / HTTPS входа на сайт
 *
 * Версия:	1.0.1
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
        'entity' => array(
            'ModuleUser_EntityUser',
            'ModuleTopic_EntityTopic',
            'ModuleTopic_EntityTopicPhoto',
            'ModuleComment_EntityComment',
            'ModuleBlog_EntityBlog',
            'ModuleTalk_EntityTalk',
            'ModuleWall_EntityWall',
            'PluginPage_ModulePage_EntityPage' => 'PluginHttpsdetect_ModulePage_EntityPage'
        ),
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
        $bStaticDomain = false;
        if (class_exists('PluginStaticdomain')) {
            $plugins = $this->Plugin_GetActivePlugins();
            if (in_array('staticdomain', $plugins)) {
                $bStaticDomain = true;
            }
        }
        Config::Set('plugin.httpsdetect.staticdomain', $bStaticDomain);
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
        $bHttps = Config::Get('plugin.httpsdetect.https');
        if (Config::Get('plugin.httpsdetect.correct_img_src')) {
            $aServers = array(parse_url(Config::Get('path.root.web'), PHP_URL_HOST));
            if (Config::Get('plugin.httpsdetect.staticdomain')) {
                $aServers[] = parse_url(Config::Get('plugin.staticdomain.static_web'), PHP_URL_HOST);
            }
            $sServers = count($aServers)>1 ? ('[' . implode('|', $aServers) . ']') : $aServers[0];
            if ($bHttps) {
                $sText = preg_replace('~(src\s*=\s*["|\'])http:\/\/(' . $sServers . ')~musi', '$1https://$2', $sText);
            } elseif ($bBidirect) {
                $sText = preg_replace('~(src\s*=\s*["|\'])https:\/\/(' . $sServers . ')~musi', '$1http://$2', $sText);
            }
        }
        if (Config::Get('plugin.httpsdetect.correct_video_src') && $bHttps) {
            $sText = str_replace('http://www.youtube.com/embed/', 'https://www.youtube.com/embed/', $sText);
            $sText = str_replace('http://player.vimeo.com/video/', 'https://player.vimeo.com/video/', $sText);
            $sText = str_replace('http://video.rutube.ru/', 'https://video.rutube.ru/', $sText);
            $sText = str_replace('http://video.yandex.ru/users/', 'https://video.yandex.ru/users/', $sText);
        }
        return $sText;
    }
}