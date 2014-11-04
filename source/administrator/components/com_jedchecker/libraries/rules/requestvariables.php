<?php
/**
 * @author     Daniel Dimitrov <daniel@compojoom.com>
 * @date       04/08/2012
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

// Include the rule base class
require_once JPATH_COMPONENT_ADMINISTRATOR . '/models/rule.php';

/**
 * class JedcheckerRulesEncoding
 *
 * This class checks if base64 encoding is used in the files
 *
 * @since  1.0
 */
class JedcheckerRulesRequestvariables extends JEDcheckerRule
{
	/**
	 * The formal ID of this rule. For example: SE1.
	 *
	 * @var    string
	 */
	protected $id = 'Techjoomla: RequestVariables';

	/**
	 * The title or caption of this rule.
	 *
	 * @var    string
	 */
	protected $title = "Used direct request variables/deprecated functions JRequest instead of JInput";

	/**
	 * The description of this rule.
	 *
	 * @var    string
	 */
	protected $description = "Using Joomla Jinput to get variables";

	/**
	 * Initiates the file search and check
	 *
	 * @return    void
	 */
	public function check()
	{
		// Find all php files of the extension
		$files = JFolder::files($this->basedir, '.php$', true, true);

		// Iterate through all files
		foreach ($files as $file)
		{
			// Try to find the base64 use in the file
			if ($this->find($file))
			{
				// Add as error to the report if it was not found
				$this->report->addError($file, JText::_("Used direct request variables/deprecated functions"));
			}
		}
	}

	/**
	 * Reads a file and searches for any encoding function defined in the params
	 * Not a very clever way of doing this, but it should be fine for now
	 *
	 * @param   string  $file  The path to the file
	 *
	 * @return boolean True if the statement was found, otherwise False.
	 */
	protected function find($file)
	{
		$content = (array) file($file);

		// Get the functions to look for
		$queries = explode(',', $this->params->get('queries'));

		foreach ($queries as $query)
		{
			$query = trim($query);

			$lineCount = 1;

			foreach ($content AS $line)
			{
				$pos_1 = stripos($line, $query);

				if ($pos_1 !== false)
				{
					$this->report->addError($file, JText::_("Line number:" . $lineCount . " - Using {<strong>" . $query . "</strong>} instead of using Joomla jinput"));

					return true;
				}

				$lineCount++;
			}
		}

		return false;
	}
}
