<?php
namespace FacturaScripts\Plugins\UnidadMedida\Model\Base;

/**
 * Class created by Plugins/UnidadMedida
 * @author Jonathan Bolo        <jbolo.des@gmail.com>
 */

use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Dinamic\Model\Variante;

abstract class BusinessDocument extends \FacturaScripts\Core\Model\Base\BusinessDocument
{

    /**
     *
     * @param string $reference
     *
     * @return BusinessDocumentLine
     */
    public function getNewProductLine($reference)
    {
        $newLine = $this->getNewLine();

        $variant = new Variante();
        $where = [new DataBaseWhere('referencia', $this->toolBox()->utils()->noHtml($reference))];
        if ($variant->loadFromCode('', $where)) {
            $product = $variant->getProducto();
            $impuesto = $product->getImpuesto();

            $newLine->codumedida = $product->codumedida;
            
            $newLine->cantidad = 1;
            $newLine->codimpuesto = $impuesto->codimpuesto;
            $newLine->descripcion = $variant->description();
            $newLine->idproducto = $product->idproducto;
            $newLine->iva = $impuesto->iva;
            $newLine->pvpunitario = isset($this->tarifa) ? $this->tarifa->apply($variant->coste, $variant->precio) : $variant->precio;
            $newLine->recargo = $impuesto->recargo;
            $newLine->referencia = $variant->referencia;
        }

        return $newLine;
    }
}
