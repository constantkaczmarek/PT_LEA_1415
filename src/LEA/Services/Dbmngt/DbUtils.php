<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\Services\Dbmngt;


class DbUtils
{
    function convertArrayToChoices($array, $key, $value,$value_1=NULL)
    {

        $tmp = array();
        foreach ($array as $elem) {
            $tmpKey = $elem[$key];
            if($value_1==null) {
                $tmpVal = $elem[$value];
            }
            else
                $tmpVal = $elem[$value] . " " . $elem[$value_1];
            $tmp[$tmpKey] = $tmpVal;
        }
        return $tmp;
    }
}