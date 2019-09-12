<?php
namespace FacturaScripts\Plugins\UnidadMedida\Model;

use FacturaScripts\Core\Model\Base;


class Umedida extends Base\ModelClass {
    use Base\ModelTrait;

    public $codumedida;
    public $umedidanac;
    public $descripcion;

    
    public static function primaryColumn(): string //Devuelve el nombre de la columna que es clave primaria
    { 
        return 'codumedida';
    }
    
    public static function tableName() //Devuelve el nombre de la table en la base de datos
    {
        return 'umedidas';
    }
    
    
}
