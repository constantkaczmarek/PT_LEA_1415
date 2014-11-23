<?php

namespace LEA\EtuBundle\Html;

class Utils
{
    function toHtml($str) {
        $str1 = str_replace("\r\n", "<br/>", $str);
        $str1 = str_replace("\n\r", "<br/>", $str1);
        $str1 = str_replace("\r", "<br/>", $str1);
        $str1 = str_replace("\n", "<br/>", $str1);
        $final = $str1;
        return $final;
    }

    function toMinimumLines($str, $nbLines) {
        if ($str == null || count($str) == 0)
            $lines = "";
        else
            $lines = explode("<br/>", $str);
        $add = "";
        //echo $str," ",count($lines);
        for ($i = count($lines); $i < $nbLines; $i++)
            $add.="<br/>";
        $final = $str . "" . $add;
        return $final;
    }
}