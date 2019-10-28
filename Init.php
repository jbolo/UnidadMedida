<?php
/**
 * This file is part of the UnidadMedidas plugin for FacturaScripts
 * Copyright (C) 2019 Jonathan Bolo <jbolo.des@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace FacturaScripts\Plugins\UnidadMedida;

use FacturaScripts\Core\Base\InitClass;
use FacturaScripts\Plugins\UnidadMedida\Extension\Model;
use FacturaScripts\Plugins\UnidadMedida\Model\Umedida;

class Init extends InitClass
{

    public function init()
    {
        $this->loadExtension(new Model\AlbaranCliente());
        $this->loadExtension(new Model\AlbaranProveedor());
        $this->loadExtension(new Model\FacturaCliente());
        $this->loadExtension(new Model\FacturaProveedor());
        $this->loadExtension(new Model\PedidoCliente());
        $this->loadExtension(new Model\PedidoProveedor());
        $this->loadExtension(new Model\PresupuestoCliente());
        $this->loadExtension(new Model\PresupuestoProveedor());
        $this->loadExtension(new Model\LineaAlbaranCliente());
        $this->loadExtension(new Model\LineaAlbaranProveedor());
        $this->loadExtension(new Model\LineaFacturaCliente());
        $this->loadExtension(new Model\LineaFacturaProveedor());
        $this->loadExtension(new Model\LineaPedidoCliente());
        $this->loadExtension(new Model\LineaPedidoProveedor());
        $this->loadExtension(new Model\LineaPresupuestoCliente());
        $this->loadExtension(new Model\LineaPresupuestoProveedor());
    }

    public function update()
    {
        /// needed depndencies
        new Umedida();

        /// Why?
        $tables = $this->toolBox()->cache()->get('fs_checked_tables');

        $tables_unchecked = array('productos',
            'lineaspresupuestosprov', 'lineaspedidosprov', 'lineasalbaranesprov', 'lineasfacturasprov',
            'lineaspresupuestoscli', 'lineaspedidoscli', 'lineasalbaranescli', 'lineasfacturascli');

        $tables_checked = array_diff($tables, $tables_unchecked);

        $this->toolBox()->cache()->set('fs_checked_tables', $tables_checked);
    }
}
