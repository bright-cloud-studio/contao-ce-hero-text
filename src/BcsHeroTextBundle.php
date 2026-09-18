<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

namespace Bcs\HeroTextBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BcsHeroTextBundle extends Bundle
{
    /**
     * Override getPath() to return the bundle root (parent of src/).
     * This tells Contao to look for resources in contao/dca/,
     * contao/languages/ and contao/templates/ at the bundle root.
     * Twig subfolder names like content_element/ are kept by the empty
     * contao/templates/.twig-root marker, not by this override.
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
