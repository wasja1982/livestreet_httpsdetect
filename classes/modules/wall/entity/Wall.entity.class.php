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

class PluginHttpsdetect_ModuleWall_EntityWall extends PluginHttpsdetect_Inherit_ModuleWall_EntityWall {
    public function getText() {
        return PluginHttpsdetect::CorrectImages(parent::getText());
    }
}
?>