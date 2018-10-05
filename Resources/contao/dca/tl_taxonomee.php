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

    'palettes' => [
        '__selector__' => [],
    ],
    'subpalettes' => [
        '' => ''
    ],
];

$tl_taxonomee = new Helper\DcaHelper($moduleName);

try{
    $tl_taxonomee
        #-- Config
        ->addConfig('taxonomie',array(
            #'ptable' => 'tl_taxonomee'
        ))
        #-- List
        ->addList('base')
        #-- Sorting
        ->addSorting('tree')
        #-- Fields
        ->addField('id', 'id')
        ->addField('pid', 'pid', array(
            'foreignKey' => 'tl_taxonomee.id'
        ))
        ->addField('alias','alias', array(
            'refField' => 'name',
        ))
        ->addField('tstamp', 'tstamp')
        ->addField('name', 'name')
        ->addField('published', 'published')
        ->addField('sorting', 'sorting')
        #-- Operations
        ->addOperation('edit', 'edit', array(),'_first')
        ->addOperation('copy')
        ->addOperation('cut', 'cut')
        ->addOperation('delete','delete',array(
            'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;"'
        ))
        ->addOperation('show')
        #-- Global_Operations
        ->addGlobalOperation('toggleNodes')
        ->addGlobalOperation('all')
        #-- Palette
        ->addPaletteGroup('default', array(
            'name', 'alias'
        ))
    ;
}catch(\Exception $e){
    var_dump($e);
}
