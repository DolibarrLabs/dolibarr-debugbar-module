<?php

// Load Dolibase
dol_include_once('/debugbar/autoload.php');
// Load Dolibase Module class
dolibase_include_once('/core/class/module.php');

/**
 *	Class to describe and enable module
 */
class modDebugBar extends DolibaseModule
{
	/**
	 * Function called after module configuration.
	 * 
	 */
	public function loadSettings()
	{
		$this->addPermission("use", "UseDebugBar", "u");

		$this->enableHooks(array(
			'main',
			'login'
		));
	}
}
