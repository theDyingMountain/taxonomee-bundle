<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 15.09.2017
 * Time: 11:58
 */

array_insert($GLOBALS['BE_MOD']['content'], 3 ,[
    'taxonomee' => [
        'tables' => ['tl_taxonomee'],
        'table' => ['TableWizard', 'importTable'],
        'list' => ['ListWizard', 'importList']
    ]
]);

$GLOBALS['TL_MODELS']['tl_taxonomee'] = 'Home\TaxonomeeBundle\Resources\contao\models\TaxonomeeModel';
