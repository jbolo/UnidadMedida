<?php
namespace FacturaScripts\Plugins\UnidadMedida\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

/**
 * Controller to List Umedida.
 *
 * @author Jonathan Bolo        <jbolo.des@gmail.com>
 *
 */

class ListUmedida extends ListController
{
    public function getPageData()
    {
        $pageData = parent::getPageData();
        $pageData['menu'] = 'accounting';
        $pageData['title'] = 'Unidad de Medida';
        $pageData['icon'] = 'fas fa-ruler';

        return $pageData;
    }
    
    protected function createViews()
    {
        $this->createViewProtected();
        
    }
    
    protected function createViewProtected($viewName = 'ListUmedida')
    {
        $this->addView($viewName, 'Umedida');
        $this->addOrderBy($viewName, ['codumedida'], 'code');
    }
}
