<?php

use \DebugBar\DataCollector\ConfigCollector;

/**
 * DolConfigCollector class
 */

class DolConfigCollector extends ConfigCollector
{
	/**
	 *	Return widget settings
	 *
	 */
	public function getWidgets()
	{
		global $langs;

		return array(
			$langs->trans('Config') => array(
				"icon" => "gear",
				"widget" => "PhpDebugBar.Widgets.VariableListWidget",
				"map" => $this->getName(),
				"default" => "{}"
			)
		);
	}

	/**
	 *	Return collected data
	 *
	 */
	public function collect()
	{
		$this->data = $this->getConfig();

		return parent::collect();
	}

	/**
	 * Returns an array with config data
	 *
	 */
	protected function getConfig()
	{
		global $dolibase_config, $dolibase_path, $dolibase_tables, $conf, $user;

		$config = array(
			'Dolibarr' => array(
				'const' => array(),
				'var'   => array(
					'$conf' => $this->object_to_array($conf),
					'$user' => $this->object_to_array($user)
				)
			),
			'PHP' => array(
				'version' => PHP_VERSION
			)
		);

		// Get constants
		$const = get_defined_constants(true);

		if (isset($dolibase_config))
		{
			// Add dolibase config
			$config['Dolibase'] = array(
				'const' => array(),
				'var'   => array(
					'$dolibase_path'   => $dolibase_path,
					'$dolibase_tables' => $dolibase_tables,
					'$dolibase_config' => $dolibase_config
				)
			);

			// Separate constants
			foreach ($const['user'] as $key => $value)
			{
				if (substr($key, 0, 8) == 'DOLIBASE') {
					$config['Dolibase']['const'][$key] = $value;
				}
				else  {
					$config['Dolibarr']['const'][$key] = $value;
				}
			}
		}
		else
		{
			$config['Dolibarr']['const'] = $const['user'];
		}

		return $config;
	}

	/**
	 * Convert an object to array
	 *
	 */
	protected function object_to_array($obj)
	{
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj;
		foreach ($_arr as $key => $val) {
			$val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
			$arr[$key] = $val;
		}

		return $arr;
	}
}