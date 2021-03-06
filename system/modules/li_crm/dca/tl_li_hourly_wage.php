<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @copyright	Liplex Webprogrammierung und -design Christian Kolb 2011
 * @author		ApoY2k <apoy2k@gmail.com>
 * @author		Christian Kolb <info@liplex.de>
 * @license		MIT (see /LICENSE.txt for further information)
 */

/**
 * Table tl_li_hourly_wage
 */
$GLOBALS['TL_DCA']['tl_li_hourly_wage'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'             => 'Table',
		'enableVersioning'			=> true
	),
	
	// List
    'list' => array
	(
		'sorting' => array
		(
			'mode'                  => 1,
			'fields'                => array('currency', 'wage'),
			'flag'                  => 11,
            'panelLayout'           => 'search,filter,limit',
		),
		'label' => array
		(
			'fields'                => array('wage', 'title'),
			'label_callback'        => array('HourlyWage', 'renderLabel')
		),
		'global_operations' => array
		(
            'all' => array
			(
				'label'             => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'              => 'act=select',
				'class'             => 'header_edit_all',
				'attributes'        => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'             => &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['edit'],
				'href'              => 'act=edit',
				'icon'              => 'edit.gif'
			),
			'copy' => array
			(
				'label'             => &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['copy'],
				'href'              => 'act=copy',
				'icon'              => 'copy.gif'
			),
			'delete' => array
			(
				'label'             => &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['delete'],
				'href'              => 'act=delete',
				'icon'              => 'delete.gif',
				'attributes'        => 'onclick="if (!confirm(\''.$GLOBALS['TL_LANG']['MSC']['deleteConfirm'].'\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'             => &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['show'],
				'href'              => 'act=show',
				'icon'              => 'show.gif'
			)
		)
	),
	
	// Palettes
	'palettes' => array
	(
		'__selector__'				=> array(),
		'default'					=> '{wage_legend},title;
										{price_legend},wage,toTax,currency;'
	),
	
	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['title'],
			'inputType'				=> 'text',
			'exclude'   			=> true,
            'search'    			=> true,
			'eval'					=> array('mandatory'=>true, 'maxlength'=>250),
		),
		'wage' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['wage'],
			'inputType'				=> 'text',
			'exclude'   			=> true,
			'default'				=> '',
            'rgxp'      			=> 'digit',
            'filter'    			=> true,
			'eval'					=> array('mandatory'=>true, 'tl_class'=>'w50'),
		),
        'toTax' => array
		(
			'label'     	   		=> &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['toTax'],
			'inputType' 	   		=> 'select',
			'exclude'   	   		=> true,
			'options_callback' 		=> array('CompanySettings', 'getTaxOptions'),
			'eval'      	   		=> array('mandatory'=>true, 'chosen'=>true, 'tl_class'=>'w50')
		),
        'currency' => array(
            'label'            		=> &$GLOBALS['TL_LANG']['tl_li_hourly_wage']['currency'],
            'inputType'       		=> 'select',
            'exclude'          		=> true,
            'options_callback' 		=> array('CurrencyHelper', 'getCurrencyOptions'),
            'eval'             		=> array('mandatory'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
        )
	)
);
