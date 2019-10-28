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
namespace FacturaScripts\Plugins\UnidadMedida\Model;

/**
 * Class created by Plugins/UnidadMedida
 * @author Jonathan Bolo        <jbolo.des@gmail.com>
 */

class Producto extends \FacturaScripts\Core\Model\Producto
{

    /**
     * Unidad de medida of the product.
     *
     * @var string
     */
    public $codumedida;
}
