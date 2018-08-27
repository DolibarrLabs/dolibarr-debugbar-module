<?php

/**
 * ActionsDebugBar class
 */

class ActionsDebugBar
{
	/**
	 * Overloading the updateSession function
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function updateSession($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $debugbar;

		$error = 0; // Error counter

		if (in_array('main', explode(':', $parameters['context'])))
		{
			dol_include_once('/debugbar/class/DebugBar.php');
			$debugbar = new DolibarrDebugBar();
			$renderer = $debugbar->getRenderer();
			$conf->global->MAIN_HTML_HEADER .= $renderer->renderHead();
		}

		if (! $error)
		{
			return 0; // or return 1 to replace standard code
		}
		else
		{
			return -1;
		}
	}

	/**
	 * Overloading the printCommonFooter function
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function printCommonFooter($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $user, $debugbar, $langs;

		$error = 0; // Error counter

		if (in_array('main', explode(':', $parameters['context'])))
		{
			if ($user->rights->debugbar->use && is_object($debugbar)) {
				$langs->load('debugbar@debugbar');
				$renderer = $debugbar->getRenderer();
				echo $renderer->render();
			}
		}

		if (! $error)
		{
			return 0; // or return 1 to replace standard code
		}
		else
		{
			return -1;
		}
	}
}
