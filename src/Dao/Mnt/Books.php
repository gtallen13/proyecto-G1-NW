<?php
namespace Dao\Mnt;

use Dao\Table;

class Books extends Table
{
    public static function obtenerLibros()
    {
        $sqlStr = "SELECT * from libros;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerLibro($idlibro)
    {
        $sqlStr = "SELECT * from libros where idlibro = :idlibro;";
        return self::obtenerUnRegistro($sqlStr, array("idlibro"=>intval($idlibro)));
    }
    public static function crearLibro(
        $nomlibro, 
        $dsclibro, 
        $preciolibro,
        $imglibro,
        $pdflibro,
        $fchpublicacion,
        $autor,
        $categoria,
    )
    {
        
        $sqlstr = "INSERT INTO libros (
            nomlibro, 
            dsclibro, 
            preciolibro,
            imglibro,
            pdflibro,
            fchpublicacion,
            autor,
            categoria
            ) 
            values (
                :nomlibro, 
                :dsclibro, 
                :preciolibro,
                :imglibro,
                :pdflibro,
                :fchpublicacion,
                :autor,
                :categoria
            );";
        $parametros = array(
            "nomlibro"=> $nomlibro,
            "dsclibro"=> $dsclibro,
            "preciolibro"=> $preciolibro,
            "imglibro"=> $imglibro,
            "pdflibro"=> $pdflibro,
            "fchpublicacion"=> $fchpublicacion,
            "autor" => $autor,
            "categoria" => $categoria,
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function editarLibro(
        $nomlibro, 
        $dsclibro, 
        $preciolibro,
        $imglibro,
        $pdflibro,
        $fchpublicacion,
        $idautor,
        $autor,
        $categoria,
        $idlibro
    )
    {
        $sqlstr = "UPDATE libros set 
            nomlibro = :nomlibro, 
            dsclibro = :dsclibro, 
            preciolibro = :preciolibro,
            imglibro = :imglibro,
            pdflibro = :pdflibro,
            fchpublicacion = :fchpublicacion,
            autor = :autor,
            categoria = :categoria,
         where idlibro = :idlibro;";
        $parametros = array(
            "nomlibro"=> $nomlibro,
            "dsclibro"=> $dsclibro,
            "preciolibro"=> $preciolibro,
            "imglibro"=> $imglibro,
            "pdflibro"=> $pdflibro,
            "fchpublicacion"=> $fchpublicacion,
            "autor" => $autor,
            "categoria" => $categoria,
            "idlibro" => intval($idlibro)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarCategoria($idlibro)
    {
        $sqlstr = "DELETE FROM libros where idlibro=:idlibro;";
        $parametros = array(
            "idlibro" => intval($idlibro)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}
