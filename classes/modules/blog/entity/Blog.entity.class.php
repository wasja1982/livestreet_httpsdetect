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

class PluginHttpsdetect_ModuleBlog_EntityBlog extends PluginHttpsdetect_Inherit_ModuleBlog_EntityBlog {
    /**
     * Возвращает описание блога
     *
     * @return string|null
     */
    public function getDescription() {
        return PluginHttpsdetect::CorrectImages(parent::getDescription());
    }
    /**
     * Возвращает полный серверный путь до аватара блога
     *
     * @return string|null
     */
    public function getAvatar() {
        return PluginHttpsdetect::CorrectUrl(parent::getAvatar());
    }
    /**
     * Возвращает полный серверный путь до аватара блога определенного размера
     *
     * @param int $iSize	Размер аватара
     * @return string
     */
    public function getAvatarPath($iSize=48) {
        return PluginHttpsdetect::CorrectUrl(parent::getAvatarPath($iSize));
    }
}
?>