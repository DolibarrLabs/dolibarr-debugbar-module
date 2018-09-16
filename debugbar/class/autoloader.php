<?php
/**
 * Autoloader class
 *
 * Simple autoloader, so we don't need Composer just for this.
 */

class Autoloader
{
    /**
     * Register autoloader
     *
     * @return boolean
     */
    public static function register()
    {
        spl_autoload_register(
            function ($class) {
                $file = '/debugbar/lib/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
                if (dol_include_once($file)!==false) {
                    return true;
                }
                $file = '/debugbar/class/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
                if (dol_include_once($file)!==false) {
                    return true;
                }
                $file = '/debugbar/class/DataCollector/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
                if (dol_include_once($file)!==false) {
                    return true;
                }
                $file = '/core/class/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
                if (dol_include_once($file)!==false) {
                    return true;
                }
                //print $class." NOT LOADED<br>";
                return false;
            }
        );
    }
}
