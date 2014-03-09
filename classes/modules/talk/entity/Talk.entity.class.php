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

class PluginHttpsdetect_ModuleTalk_EntityTalk extends PluginHttpsdetect_Inherit_ModuleTalk_EntityTalk {
    /**
     * Возвращает текст сообщения
     *
     * @return string|null
     */
    public function getText() {
        return PluginHttpsdetect::CorrectImages(parent::getText());
    }
}
?>