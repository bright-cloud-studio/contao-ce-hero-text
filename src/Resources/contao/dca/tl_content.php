<?php

/**
 * @copyright  Bright Cliud Studio
 * @author     Bright Cloud Studio
 * @package    Contao CE Hero Text
 * @license    LGPL-3.0+
 * @see	       https://github.com/bright-cloud-studio/contao-ce-hero-text
 */

// Get our default 'tl_content' DCA
$dc = &$GLOBALS['TL_DCA']['tl_content'];

$GLOBALS['TL_DCA']['tl_content']['palettes']['hero_text'] = '{type_legend},type,headline;{text_legend},text,buttonLink;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';

$arrFields = array(
    'buttonLink'                => array(
        'label'      => &$GLOBALS['TL_LANG']['tl_content']['buttonLink'],
        'exclude'    => true,
        'inputType'  => 'pageTree',
        'foreignKey' => 'tl_page.title',
        'eval'       => array('mandatory' => false, 'fieldType' => 'radio'),
        'sql'        => "int(10) unsigned NOT NULL default '0'",
        'relation'   => array('type' => 'belongsTo', 'load' => 'lazy'),
    )
);

$dc['fields'] = array_merge($dc['fields'], $arrFields);

