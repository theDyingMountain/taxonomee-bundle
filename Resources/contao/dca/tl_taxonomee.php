<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 15.09.2017
 * Time: 09:16
 */

use Home\PearlsBundle\Resources\contao\Helper\Dca as Helper;

$moduleName = 'tl_taxonomee';

$GLOBALS['TL_DCA'][$moduleName] = [
    /*'config' => [
        'dataContainer' => 'Table',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index',
            ]
        ]
    ],*/
    /*'list' => [
        'sorting' => [
            'mode' => 5,
            'fields' => ['name'],
            'headerFields' => ['name'],
            'panelLayout' => 'debug;filter;sort,search,limit',
        ],
        'label' => [
            'fields' => ['name','alias'],
            'format' => '%s (%s)'
        ],
        'global_operations' => [
            'toggleNodes' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['toggleAll'],
                'href'                => 'ptg=all',
                'class'               => 'header_toggle',
                'showOnSelect'        => true
            ),
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'accesskey="e"'
            )
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG'][$moduleName]['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG'][$moduleName]['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG'][$moduleName]['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG'][$moduleName]['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],*/
    'palettes' => [
        '__selector__' => [],
        //'default' => '
        //    name,
        //    alias'
    ],
    'subpalettes' => [
        '' => ''
    ],
    //'fields' => []
];

$tl_taxonomee = new Helper\DcaHelper($moduleName);

$tl_taxonomee
    #-- Config
    ->addConfig('taxonomie')
    #-- List
    ->addList('base')
    #-- Sorting
    ->addSorting('tree')
    #-- Fields
    ->addField('id', 'id')
    ->addField('pid', 'pid', array('foreignKey' => 'tl_taxonomee.id'))
    ->addField('alias','alias')
    ->addField('tstamp', 'tstamp')
    ->addField('name', 'name')
    ->addField('published', 'published')
    ->addField('sorting', 'sorting')
    #-- Operations
    ->addOperation('edit', 'edit', array(),'_first')
    ->addOperation('copy')
    ->addOperation('delete','delete',array('attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;"'))
    ->addOperation('show')
    #-- Global_Operations
    ->addGlobalOperation('toggleNodes')
    ->addGlobalOperation('all')
    #-- Palette
    ->addPaletteGroup('default', array('name', 'alias'))
;

//var_dump($GLOBALS['TL_DCA'][$moduleName]['list']['operations']);
