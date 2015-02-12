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
}