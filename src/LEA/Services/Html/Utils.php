<?php

namespace LEA\Services\Html;

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

    function toText($str) {
        $str1 = str_replace("<br/>", "\r\n", $str);
        $final = $str1;
        return $final;
    }

    function toMinimumLines($str, $nbLines) {
        if ($str == null || count($str) == 0)
            $lines = "";
        else
            $lines = explode("<br/>", $str);
        $add = "";
        for ($i = count($lines); $i < $nbLines; $i++)
            $add.="<br/>";
        $final = $str . "" . $add;
        return $final;
    }

    function getlistFormationSelect(){

        $keysValues=array();
        $keysValues["keys"]=array();
        $keyValues["values"]=array();

        $keysValues["keys"][]="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";
        $keysValues["values"][]="== Toutes FA ==";

        $keysValues["keys"][]="M1MIAGEFA,M2MIAGEFA, M2IPINTFA";
        $keysValues["values"][]="MIAGE - M1  M2 FA";

        $keysValues["keys"][]="M1MIAGEFA";
        $keysValues["values"][]=" - MIAGE - M1 FA";
        $keysValues["keys"][]="M2MIAGEFA";
        $keysValues["values"][]=" - MIAGE - M2 FA";
        $keysValues["keys"][]="M2IPINTFA";
        $keysValues["values"][]=" - IPINT - M2 FA";

        $keysValues["keys"][]="M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";
        $keysValues["values"][]="INFO - M1  M2 FA";

        $keysValues["keys"][]="M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA";
        $keysValues["values"][]="INFO - M1 FA";

        $keysValues["keys"][]="M1ESERVFA";
        $keysValues["values"][]=" - ESERV - M1 FA";

        $keysValues["keys"][]="M1IAGLFA";
        $keysValues["values"][]=" - IAGL - M1 FA";

        $keysValues["keys"][]="M1IVIFA";$keysValues["values"][]=" - IVI - M1 FA";
        $keysValues["keys"][]="M1MOCADFA";$keysValues["values"][]=" - MOCAD - M1 FA";
        $keysValues["keys"][]="M1TIIRFA";$keysValues["values"][]=" - TIIR - M1 FA";
        $keysValues["keys"][]="M1INFOFI";$keysValues["values"][]=" - Sans Spec - M1 FA";
        $keysValues["keys"][]="M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";$keysValues["values"][]="INFO - M2 FA";
        $keysValues["keys"][]="M2ESERVFA";$keysValues["values"][]=" - ESERV - M2 FA";
        $keysValues["keys"][]="M2IAGLFA";$keysValues["values"][]=" - IAGL - M2 FA";
        $keysValues["keys"][]="M2IVIFA";$keysValues["values"][]=" - IVI - M2 FA";
        $keysValues["keys"][]="M2MOCADFA";$keysValues["values"][]=" - MOCAD - M2 FA";
        $keysValues["keys"][]="M2TIIRFA";$keysValues["values"][]=" - TIIR - M2 FA";

        $keysValues["keys"][]="L3MIAGEFI,M1MIAGEFI,M2MIAGEFI,M1MIAGEFI,M2MIAGEFI,L3INFOFI,M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI,M1INFOFI,M1IAGLFI,M1ESERVFI,M1TIIRFI,M1IVIFI,M1MOCADFI,M1ESERVFI,M1IAGLFI,M1IVIFI,M1MOCADFI,M1TIIRFI,M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI,M2ESERVFI,M2IAGLFI,M2IVIFI,M2MOCADFI,M2TIIRFI";
        $keysValues["values"][]="== Toutes FI ==";
        $keysValues["keys"][]="L3MIAGEFI";$keysValues["values"][]=" - MIAGE - L3 FI";
        $keysValues["keys"][]="M1MIAGEFI,M2MIAGEFI";$keysValues["values"][]="MIAGE - M1 M2 FI";
        $keysValues["keys"][]="M1MIAGEFI";$keysValues["values"][]=" - MIAGE - M1 FI";
        $keysValues["keys"][]="M2MIAGEFI";$keysValues["values"][]=" - MIAGE - M2 FI";
        $keysValues["keys"][]="L3INFOFI";$keysValues["values"][]="L3 INFO FI";
        $keysValues["keys"][]="M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";$keysValues["values"][]="INFO - M1 M2 FI";
        $keysValues["keys"][]="M1INFOFI,M1IAGLFI,M1ESERVFI,M1TIIRFI,M1IVIFI,M1MOCADFI";$keysValues["values"][]="INFO - M1 FI";
        $keysValues["keys"][]="M1ESERVFI";$keysValues["values"][]=" - ESERV - M1 FI";
        $keysValues["keys"][]="M1IAGLFI";$keysValues["values"][]=" - IAGL - M1 FI";
        $keysValues["keys"][]="M1IVIFI";$keysValues["values"][]=" - IVI - M1 FI";
        $keysValues["keys"][]="M1MOCADFI";$keysValues["values"][]=" - MOCAD - M1 FI";
        $keysValues["keys"][]="M1TIIRFI";$keysValues["values"][]=" - TIIR - M1 FI";
        $keysValues["keys"][]="M1INFOFI";$keysValues["values"][]=" - Sans Spec - M1 FI";
        $keysValues["keys"][]="M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";$keysValues["values"][]="INFO - M2 FI";
        $keysValues["keys"][]="M2ESERVFI";$keysValues["values"][]=" - ESERV - M2 FI";
        $keysValues["keys"][]="M2IAGLFI";$keysValues["values"][]=" - IAGL - M2 FI";
        $keysValues["keys"][]="M2IVIFI";$keysValues["values"][]=" - IVI - M2 FI";
        $keysValues["keys"][]="M2MOCADFI";$keysValues["values"][]=" - MOCAD - M2 FI";
        $keysValues["keys"][]="M2TIIRFI";$keysValues["values"][]=" - TIIR - M2 FI";


        return $keysValues;
    }
}