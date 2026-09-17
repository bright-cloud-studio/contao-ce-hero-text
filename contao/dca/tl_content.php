<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

/** Table tl_content */

// Palettes
$GLOBALS['TL_DCA']['tl_content']['palettes']['hero_text'] = '{type_legend},type,headline,title;{text_legend},text,buttonLink;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';

// Fields
$GLOBALS['TL_DCA']['tl_content']['fields']['buttonLink'] = array
(
    'label'                       => &$GLOBALS['TL_LANG']['tl_content']['buttonLink'],
    'exclude'                     => true,
    'inputType'                   => 'pageTree',
    'foreignKey'                  => 'tl_page.title',
    'eval'                        => array('fieldType'=>'radio', 'tl_class'=>'w50'),
    'sql'                         => "varchar(255) NOT NULL default ''"
);
