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

class PluginHttpsdetect_HookHttpsdetect extends Hook {
    public function RegisterHook() {
        $this->AddHook('module_Viewer_init_after','viewer_init_after');
    }

    public function viewer_init_after($arg){
        $bJs = Config::Get('plugin.httpsdetect.correct_js_link');
        $bCss = Config::Get('plugin.httpsdetect.correct_css_link');

		if ($bJs) {
			$aJs = Config::Get('head.default.js');
			if ($aJs && is_array($aJs))	{
				foreach($aJs as $sJs => $aExtra) {
					if (stripos($sJs, 'http://') === 0 || stripos($sJs, 'https://') === 0) {
						$sJsNew = PluginHttpsdetect::CorrectUrl($sJs);
						unset($aJs[$sJs]);
						$aJs[$sJsNew] = $aExtra;
					}
				}
				Config::Set('head.default.js', $aJs);
			}
        }
		if ($bCss) {
			$aCss = Config::Get('head.default.css');
			if ($aCss && is_array($aCss))	{
				foreach($aCss as $sCss => $aExtra) {
					if (stripos($sCss, 'http://') === 0 || stripos($sCss, 'https://') === 0) {
						$sCssNew = PluginHttpsdetect::CorrectUrl($sCss);
						unset($aCss[$sCss]);
						$aCss[$sCssNew] = $aExtra;
					}
				}
				Config::Set('head.default.css', $aCss);
			}
        }
        if ($bJs || $bCss) {
            $this->Viewer_ReloadFileParams();
		}
    }
}