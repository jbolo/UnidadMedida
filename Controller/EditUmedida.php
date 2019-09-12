<?php

namespace FacturaScripts\Plugins\UnidadMedida\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
/**
 * Controller to edit Umedida.
 *
 * @author Jonathan Bolo        <jbolo.des@gmail.com>
 *
 */
class EditUmedida extends EditController 
{
    public function getModelClassName() {
        return 'Umedida';
    }
    public function getPageData()
    {
        $pageData = parent::getPageData();
        $pageData['menu'] = 'accounting';
        $pageData['title'] = 'Unidad de Medida';
        $pageData['icon'] = 'fas fa-ruler';

        return $pageData;
    }
    
}
