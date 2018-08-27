<?php

// Load Dolibase config file for this module (mandatory)
dol_include_once('/debugbar/config.php');
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

		$this->enableHook('main');
		$this->enableHook('login');
	}
}
