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

class PluginHttpsdetect_HookHttpsdetect extends Hook {
    public function RegisterHook() {
        $this->AddHook('module_Viewer_init_after','viewer_init_after');
    }

    public function viewer_init_after($arg){
		$bHttps = ((isset($_SERVER['HTTP_SCHEME']) && strtolower($_SERVER['HTTP_SCHEME']) == 'https') ||
		           (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
		           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https') ||
		           $_SERVER['SERVER_PORT'] == 443);

		if ($bHttps) {
			$aJs = Config::Get('head.default.js');
			if ($aJs && is_array($aJs))	{
				foreach($aJs as $sJs => $aExtra) {
					if (stripos($sJs, 'http://') === 0) {
						$sJsNew = str_replace('http://', 'https://', $sJs);
						unset($aJs[$sJs]);
						$aJs[$sJsNew] = $aExtra;
					}
				}
				Config::Set('head.default.js', $aJs);
			}
			$aCss = Config::Get('head.default.css');
			if ($aCss && is_array($aCss))	{
				foreach($aCss as $sCss => $aExtra) {
					if (stripos($sCss, 'http://') === 0) {
						$sCssNew = str_replace('http://', 'https://', $sCss);
						unset($aCss[$sCss]);
						$aCss[$sCssNew] = $aExtra;
					}
				}
				Config::Set('head.default.css', $aCss);
			}
            $this->Viewer_ReloadFileParams();
		}

    }
}