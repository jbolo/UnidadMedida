<?php
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
