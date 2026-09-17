<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

namespace Bcs\HeroTextBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\PageModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Core's text element plus a play button linking to a page picked in the back end.
 *
 * Flow:
 *   1. Build the optional image, exactly as core's TextController does.
 *   2. Look up the page behind 'buttonLink', if one was picked.
 *   3. Hand the page to the template and let it resolve the URL.
 */
#[AsContentElement(type: 'hero_text', category: 'texts', template: 'content_element/hero_text')]
class HeroTextController extends AbstractContentElementController
{
    public function __construct(private readonly Studio $studio)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $figure = !$model->addImage ? null : $this->studio
            ->createFigureBuilder()
            ->fromUuid($model->singleSRC ?: '')
            ->setSize($model->size)
            ->setOverwriteMetadata($model->getOverwriteMetadata())
            ->enableLightbox($model->fullsize)
            ->buildIfResourceExists()
        ;

        $template->set('text', $model->text ?: '');
        $template->set('image', $figure);
        $template->set('layout', $model->floating);

        // Pass the page itself rather than a URL so the template can use content_url(),
        // which already returns null for a page that cannot be routed
        $template->set('button_page', $model->buttonLink ? PageModel::findById($model->buttonLink) : null);

        return $template->getResponse();
    }
}
