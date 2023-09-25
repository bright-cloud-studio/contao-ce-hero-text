<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

namespace Bcs\HeroTextBundle;

class ContentHeroText extends \ContentText
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_hero_text';


	/**
	 * Generate the content element
	 */
	public function compile()
	{
		parent::compile();
	}
}
