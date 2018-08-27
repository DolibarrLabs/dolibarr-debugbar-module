<?php

use \DebugBar\DataCollector\RequestDataCollector;

/**
 * DolRequestCollector class
 */

class DolRequestCollector extends RequestDataCollector
{
	/**
	 *	Return widget settings
	 *
	 */
	public function getWidgets()
	{
		global $langs;

		return array(
			$langs->trans('Request') => array(
				"icon" => "tags",
				"widget" => "PhpDebugBar.Widgets.VariableListWidget",
				"map" => "request",
				"default" => "{}"
			)
		);
	}
}