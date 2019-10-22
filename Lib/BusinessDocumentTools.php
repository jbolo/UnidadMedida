<?php
namespace FacturaScripts\Plugins\UnidadMedida\Lib;

/**
 * Class created by Plugins/UnidadMedida
 * @author Jonathan Bolo        <jbolo.des@gmail.com>
 */

use FacturaScripts\Core\Base\Utils;
use FacturaScripts\Dinamic\Model\Base\BusinessDocument;

class BusinessDocumentTools extends \FacturaScripts\Core\Lib\BusinessDocumentTools
{

    /**
     *
     * @param array            $fLine
     * @param BusinessDocument $doc
     *
     * @return BusinessDocumentLine
     */
    protected function recalculateFormLine(array $fLine, BusinessDocument $doc)
    {

        if (isset($fLine['cantidad']) && '' !== $fLine['cantidad']) {
            /// edit line
            $newLine = $doc->getNewLine($fLine);
        } elseif (isset($fLine['referencia']) && '' !== $fLine['referencia']) {
            /// new line with reference
            $newLine = $doc->getNewProductLine($fLine['referencia']);
            $newLine->codumedida = Utils::fixHtml($newLine->codumedida);
            $this->recalculateFormLineTaxZones($newLine);
        } else {
            /// new line without reference
            $newLine = $doc->getNewLine();
            $newLine->descripcion = $fLine['descripcion'];
            $this->recalculateFormLineTaxZones($newLine);
        }

        $newLine->descripcion = Utils::fixHtml($newLine->descripcion);
        $newLine->pvpsindto = $newLine->pvpunitario * $newLine->cantidad;
        $newLine->pvptotal = $newLine->pvpsindto * (100 - $newLine->dtopor) / 100;
        $newLine->referencia = Utils::fixHtml($newLine->referencia);

        if ($this->siniva) {
            $newLine->codimpuesto = null;
            $newLine->irpf = $newLine->iva = $newLine->recargo = 0.0;
        } elseif (!$this->recargo) {
            $newLine->recargo = 0.0;
        }

        return $newLine;
    }
}
