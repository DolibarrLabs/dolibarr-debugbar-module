<?php

/**
 * Simple autoloader, so we don't need Composer just for this.
 */

spl_autoload_register(function ($class) {
	$file = dol_buildpath('/debugbar/lib/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php');
	if (file_exists($file)) {
		require_once $file;
		return true;
	}
	return false;
});
