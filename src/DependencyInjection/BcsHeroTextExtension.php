<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

namespace Bcs\HeroTextBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class BcsHeroTextExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config')
        );
        $loader->load('services.yaml');
    }
}
