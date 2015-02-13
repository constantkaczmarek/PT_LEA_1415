<?php

namespace LEA\Services\Role;

use Symfony\Component\HttpFoundation\Session\Session;

class GestionRole
{

    function checkAllRoles($session, $conn) {

        $session->set("CK_ROLES","");

        $this->checkStudentRole($session, $conn);
        $this->checkProfRole($session, $conn);
        $this->checkRoles($session, $conn, $session->get("CK_USER"));
    }

    function checkStudentRole($session, $conn)
    {

        $query = $conn->fetchAll("select etudCle from etudiant where etudCle like '".$session->get("CK_USER")."' and obsolete=0;");

        if (count($query) != 0) {
            $roles = $session->get("CK_ROLES");
            $roles .= "STUD" . " ";
            $session->set("CK_ROLES", $roles);
        }
    }

    function checkProfRole($session, $conn)
    {
        $query = $conn->fetchAll("select profCle from membre where profCle like '".$session->get("CK_USER")."'");

        if (count($query) != 0) {
            $roles = $session->get("CK_ROLES");
            $roles .= "PROF" . " ";
            $session->set("CK_ROLES", $roles);
        }
    }

    function hasRole($session, $role)
    {
        $user = $session->get("CK_USER");
        $roles = $session->get("CK_ROLES");

        if ((strlen($user)==0) ||
            (strlen($roles)==0)
            || ($user===null) || ($roles === null))
        {
            return FALSE;
        }

        if (strlen($role)==0)
            return TRUE;

        return (strpos($roles,$role,0)!== FALSE);
    }

    function checkRoles($session, $conn, $user)
    {

        if (!$session->get("REF_YEAR"))
            $session->set("REF_YEAR", "2014");


        $query = $conn->fetchAll("Select roleRef from roles_membres"
            ." where userRef='".$user."' and roleRef in (select roleCle from roles) "
            ." and anneeReference<=".$session->get("REF_YEAR")." and obsolete=0;");

        $roles = $session->get("CK_ROLES");

        for ($i = 0; $i < count($query); $i++)
        {
            $roles .= $query[$i]["roleRef"]." ";
        }

        $session->set("CK_ROLES", $roles);

        $query = $conn->fetchAll("Select roleRef from roles_membres"
            ." where userRef='". $user ."' "
            ." and anneeReference<=".$session->get("REF_YEAR")." and obsolete=0;");

        for ($i = 0; $i < count($query); $i++)
        {
            $this->checkRoles($session, $conn, $query[$i]["roleRef"]);
        }
    }

    function constructGrantedGroupesKeys($session, $unique=false, $all=false, $ft=null, $onlyM1INFO=false, $sansM1INFOFI=false)
    {
        if ($ft==null)
            $ft=$session->has("REF_FORMATIONTYPE")?$session->get("REF_FORMATIONTYPE"):"FA/FI";
        $roles = $session->get("CK_ROLES");

        {
            $predefKeys=array();
            $predefValues=array();

            if (strstr($ft,"FA")!=FALSE) {
                $res=$this->initPredefinedFAKeysValues($onlyM1INFO);
                $keys=$res["keys"];$values=$res["values"];
                $ikeys=array_keys($keys);
                for ($i=0;$i<count($ikeys);$i++) {
                    $predefKeys[$ikeys[$i]]=$keys[$ikeys[$i]];
                    $predefValues[$ikeys[$i]]=$values[$ikeys[$i]];
                }
            }
            if (strstr($ft,"FI")!=FALSE) {
                $res=$this->initPredefinedFIKeysValues($onlyM1INFO);
                $keys=$res["keys"];$values=$res["values"];
                $ikeys=array_keys($keys);
                for ($i=0;$i<count($ikeys);$i++) {
                    $predefKeys[$ikeys[$i]]=$keys[$ikeys[$i]];
                    $predefValues[$ikeys[$i]]=$values[$ikeys[$i]];
                }
            }

            $roles = preg_replace("/PROF/","",$roles);
            $roles = preg_replace("/ETUD/","",$roles);

            $index=array_keys($predefKeys);

            $keys=array();
            $values=array();

            for ($i=1,$k=1;$i<count($index);$i++) {
                $pos = strpos($roles,$index[$i],0);

                if (
                    (($all==true)||($pos!==FALSE)) &&
                    ((!$sansM1INFOFI) ||
                        ((strpos($predefKeys[$index[$i]],'M1')===FALSE) ||
                            (strpos($predefKeys[$index[$i]],'FI')===FALSE))) &&
                    ((!$unique || (strpos($predefKeys[$index[$i]],',')===FALSE)) ||
                        ($onlyM1INFO && ((strpos($predefKeys[$index[$i]],'1INFO'))==1)))
                )
                {
                    $keys[$k]=$predefKeys[$index[$i]];
                    $values[$k]=$predefValues[$index[$i]];
                    $k++;
                }
            }

            if ($k>1&&!$unique) {
                $keys[0]=$keys[1];
                $values[0]="Toutes";
                for ($i=2;$i<$k;$i++)
                    $keys[0] .= ",".$keys[$i];
            } else {
                $keys[0]="";$values[0]="Aucune";
            }
        }
        $result=array("keys"=>$keys,"values"=>$values);
        return $result;
    }

    function initPredefinedFIKeysValues($onlyM1INFO=false)
    {

        $predefinedKeys["ALL_RESP_FI"]="M1MIAGEFI,M2MIAGEFI,M1INFOFI,M2IAGLFI,"
            ."M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";
        $predefinedValues["ALL_RESP_FI"]="MIAGE &amp; INFO FI";

        $predefinedKeys["L3MIAGEFI_RESP"]="L3MIAGEFI";
        $predefinedValues["L3MIAGEFI_RESP"]=" - MIAGE - L3 FI";

        $predefinedKeys["MMIAGEFI_RESP"]="M1MIAGEFI,M2MIAGEFI";
        $predefinedValues["MMIAGEFI_RESP"]="MIAGE - M1 &amp; M2 FI";

        $predefinedKeys["M1MIAGEFI_RESP"]="M1MIAGEFI";
        $predefinedValues["M1MIAGEFI_RESP"]=" - MIAGE - M1 FI";

        $predefinedKeys["M2MIAGEFI_RESP"]="M2MIAGEFI";
        $predefinedValues["M2MIAGEFI_RESP"]=" - MIAGE - M2 FI";


        $predefinedKeys["L3INFOFI_RESP"]="L3INFOFI";
        $predefinedValues["L3INFOFI_RESP"]="L3 INFO FI";

        if ($onlyM1INFO==false)  {
            $predefinedKeys["MINFOFI_RESP"]="M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";
            $predefinedValues["MINFOFI_RESP"]="INFO - M1 &amp; M2 FI";
        }

        $predefinedKeys["M1INFOFI_RESP"]="M1INFOFI,M1IAGLFI,M1ESERVFI,M1TIIRFI,M1IVIFI,M1MOCADFI";
        $predefinedValues["M1INFOFI_RESP"]="INFO - M1 FI";

        if ($onlyM1INFO==false) {
            $predefinedKeys["M1ESERVFI_RESP"]="M1ESERVFI";
            $predefinedValues["M1ESERVFI_RESP"]=" - ESERV - M1 FI";

            $predefinedKeys["M1IAGLFI_RESP"]="M1IAGLFI";
            $predefinedValues["M1IAGLFI_RESP"]=" - IAGL - M1 FI";

            $predefinedKeys["M1IVIFI_RESP"]="M1IVIFI";
            $predefinedValues["M1IVIFI_RESP"]=" - IVI - M1 FI";

            $predefinedKeys["M1MOCADFI_RESP"]="M1MOCADFI";
            $predefinedValues["M1MOCADFI_RESP"]=" - MOCAD - M1 FI";

            $predefinedKeys["M1TIIRFI_RESP"]="M1TIIRFI";
            $predefinedValues["M1TIIRFI_RESP"]=" - TIIR - M1 FI";

            $predefinedKeys["M1INFOFIG_RESP"]="M1INFOFI";
            $predefinedValues["M1INFOFIG_RESP"]=" - Sans Spec - M1 FI";
        }
        $predefinedKeys["M2INFOFI_RESP"]="M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";
        $predefinedValues["M2INFOFI_RESP"]="INFO - M2 FI";

        $predefinedKeys["M2ESERVFI_RESP"]="M2ESERVFI";
        $predefinedValues["M2ESERVFI_RESP"]=" - ESERV - M2 FI";

        $predefinedKeys["M2IAGLFI_RESP"]="M2IAGLFI";
        $predefinedValues["M2IAGLFI_RESP"]=" - IAGL - M2 FI";

        $predefinedKeys["M2IVIFI_RESP"]="M2IVIFI";
        $predefinedValues["M2IVIFI_RESP"]=" - IVI - M2 FI";

        $predefinedKeys["M2MOCADFI_RESP"]="M2MOCADFI";
        $predefinedValues["M2MOCADFI_RESP"]=" - MOCAD - M2 FI";

        $predefinedKeys["M2TIIRFI_RESP"]="M2TIIRFI";
        $predefinedValues["M2TIIRFI_RESP"]=" - TIIR - M2 FI";

        return array("keys"=>$predefinedKeys,"values"=>$predefinedValues);
    }


    function initPredefinedFAKeysValues($onlyM1INFO=false)
    {

        $predefinedKeys["ALL_RESP_FA"]="M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFA,M2IAGLFA,"
            ."M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";
        $predefinedValues["ALL_RESP_FA"]="MIAGE &amp; INFO FA";

        $predefinedKeys["L3MIAGEFA_RESP"]="L3MIAGEFA";
        $predefinedValues["L3MIAGEFA_RESP"]=" - MIAGE - L3 FA";

        $predefinedKeys["MMIAGEFA_RESP"]="M1MIAGEFA,M2MIAGEFA, M2IPINTFA";
        $predefinedValues["MMIAGEFA_RESP"]="MIAGE - M1 &amp; M2 FA";

        $predefinedKeys["M1MIAGEFA_RESP"]="M1MIAGEFA";
        $predefinedValues["M1MIAGEFA_RESP"]=" - MIAGE - M1 FA";

        $predefinedKeys["M2MIAGEFA_RESP"]="M2MIAGEFA";
        $predefinedValues["M2MIAGEFA_RESP"]=" - MIAGE - M2 FA";

        $predefinedKeys["M2IPINTFA_RESP"]="M2IPINTFA";
        $predefinedValues["M2IPINTFA_RESP"]=" - IPINT - M2 FA";

        if ($onlyM1INFO==false)  {
            $predefinedKeys["MINFOFA_RESP"]="M1INFOFA,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";
            $predefinedValues["MINFOFA_RESP"]="INFO - M1 &amp; M2 FA";
        }

        $predefinedKeys["M1INFOFA_RESP"]="M1INFOFA,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA";
        $predefinedValues["M1INFOFA_RESP"]="INFO - M1 FA";

        if ($onlyM1INFO==false) {
            $predefinedKeys["M1ESERVFA_RESP"]="M1ESERVFA";

            $predefinedValues["M1ESERVFA_RESP"]=" - ESERV - M1 FA";

            $predefinedKeys["M1IAGLFA_RESP"]="M1IAGLFA";
            $predefinedValues["M1IAGLFA_RESP"]=" - IAGL - M1 FA";

            $predefinedKeys["M1IVIFA_RESP"]="M1IVIFA";
            $predefinedValues["M1IVIFA_RESP"]=" - IVI - M1 FA";

            $predefinedKeys["M1MOCADFA_RESP"]="M1MOCADFA";
            $predefinedValues["M1MOCADFA_RESP"]=" - MOCAD - M1 FA";

            $predefinedKeys["M1TIIRFA_RESP"]="M1TIIRFA";
            $predefinedValues["M1TIIRFA_RESP"]=" - TIIR - M1 FA";

            $predefinedKeys["M1INFOFAG_RESP"]="M1INFOFA";
            $predefinedValues["M1INFOFAG_RESP"]=" - Sans Spec - M1 FA";
        }

        $predefinedKeys["M2INFOFA_RESP"]="M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";
        $predefinedValues["M2INFOFA_RESP"]="INFO - M2 FA";

        $predefinedKeys["M2ESERVFA_RESP"]="M2ESERVFA";
        $predefinedValues["M2ESERVFA_RESP"]=" - ESERV - M2 FA";

        $predefinedKeys["M2IAGLFA_RESP"]="M2IAGLFA";
        $predefinedValues["M2IAGLFA_RESP"]=" - IAGL - M2 FA";

        $predefinedKeys["M2IVIFA_RESP"]="M2IVIFA";
        $predefinedValues["M2IVIFA_RESP"]=" - IVI - M2 FA";

        $predefinedKeys["M2MOCADFA_RESP"]="M2MOCADFA";
        $predefinedValues["M2MOCADFA_RESP"]=" - MOCAD - M2 FA";

        $predefinedKeys["M2TIIRFA_RESP"]="M2TIIRFA";
        $predefinedValues["M2TIIRFA_RESP"]=" - TIIR - M2 FA";

        return array("keys"=>$predefinedKeys,"values"=>$predefinedValues);
    }
}