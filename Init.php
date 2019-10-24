<?php
namespace FacturaScripts\Plugins\UnidadMedida;

use FacturaScripts\Core\Base\InitClass;

class Init extends InitClass
{

    public function init()
    {
        
    }

    public function update()
    {
        $tables = $this->toolBox()->cache()->get('fs_checked_tables');

        $tables_unchecked = array('productos', 
                                  'lineaspresupuestosprov','lineaspedidosprov','lineasalbaranesprov','lineasfacturasprov',
                                  'lineaspresupuestoscli' ,'lineaspedidoscli' ,'lineasalbaranescli' ,'lineasfacturascli' );

        $tables_checked = array_diff($tables,$tables_unchecked);

        $this->toolBox()->cache()->set('fs_checked_tables', $tables_checked);
    }
}
