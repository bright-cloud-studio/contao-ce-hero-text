<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

namespace Bcs\HeroTextBundle;

use Contao\ContentText;

class ContentHeroText extends ContentText
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_hero_text';

	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		// Add the static files URL to images
		if ($staticUrl = System::getContainer()->get('contao.assets.files_context')->getStaticUrl())
		{
			$path = System::getContainer()->getParameter('contao.upload_path') . '/';
			$this->text = str_replace(' src="' . $path, ' src="' . $staticUrl . $path, (string) $this->text);
		}

		$this->Template->text = StringUtil::encodeEmail((string) $this->text);
		$this->Template->addImage = false;
		$this->Template->addBefore = false;

		// Add an image
		if ($this->addImage)
		{
			$figure = System::getContainer()
				->get('contao.image.studio')
				->createFigureBuilder()
				->from($this->singleSRC)
				->setSize($this->size)
				->setOverwriteMetadata($this->objModel->getOverwriteMetadata())
				->enableLightbox($this->fullsize)
				->buildIfResourceExists();

			$figure?->applyLegacyTemplateData($this->Template, null, $this->floating);
		}
	}
}
