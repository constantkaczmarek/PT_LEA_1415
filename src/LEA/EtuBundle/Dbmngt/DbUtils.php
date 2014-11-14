<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\EtuBundle\Dbmngt;


class DbUtils
{
    function convertArrayToChoices($array, $key, $value)
    {
        $tmp = array();
        foreach ($array as $elem) {
            $tmpKey = $elem[$key];
            $tmpVal = $elem[$value];
            $tmp[$tmpKey] = $tmpVal;
        }
        return $tmp;
    }
}