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

class PluginHttpsdetect_ModuleUser_EntityUser extends PluginHttpsdetect_Inherit_ModuleUser_EntityUser {
    /**
     * Возвращает информацию о себе
     *
     * @return string|null
     */
    public function getProfileAbout() {
        return PluginHttpsdetect::CorrectImages(parent::getProfileAbout());
    }
    /**
     * Возвращает полный веб путь до аватра
     *
     * @return string|null
     */
    public function getProfileAvatar() {
        return PluginHttpsdetect::CorrectUrl(parent::getProfileAvatar());
    }
    /**
     * Возвращает полный веб путь до фото
     *
     * @return string|null
     */
    public function getProfileFoto() {
        return PluginHttpsdetect::CorrectUrl(parent::getProfileFoto());
    }
}
?>