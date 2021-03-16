<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    public function regexName(string $str) {
        $preg = preg_match('/^([0-9a-zA-ZàáâäæçéèêëîïôœùûüÿÀÂÄÆÇÉÈÊËÎÏÖÔŒÙÛÜŸ \-\']+)$/',$str);
        if ($preg) return true;
        else return false;
    }

    public function regexDate(string $date) {
        $preg = preg_match('/^(19|20)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])$/',$date);
        if ($preg) return true;
        else return false;
    }

    public function checkMajority(string $date) {
        $majorityDate = strtotime(date('d-m-Y', strtotime('-18 year')));
        $date = strtotime($date);
        if($date < $majorityDate) return true;
        else return false;
    }

    public function regexPhone(string $phone) {
        $preg = preg_match('/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',$phone);
        if($preg) return true;
        else return false; 
    }

    public function regexPassword(string $pwd) {
        $preg = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,18}$/',$pwd);
        if ($preg) return true;
        else return false;
    }

    public function regexDrivingLicense(string $str) {
        $preg = preg_match('/^[0-9]{12}$/',$str);
        if($preg) return true;
        else return false;
    }

    public function sizePassword(string $pwd) {
        if (strlen($pwd) > 7 && strlen($pwd) < 19) return true;
        else return false;
    }

    public function isEqualPassword(string $pwd, string $vpwd) {
        if ($_POST['pwd'] == $_POST['verifPwd']) return true;
        else return false;
    }

    public function regexPostal(string $postal) {
        $preg = preg_match('/^[0-9]{5}$/',$postal);
        if($preg) return true;
        else return false; 
    }

    public function regexLicensePlate(string $licensePlate) {
        $preg = preg_match('/^[A-Z]{2}[-][0-9]{3}[-][A-Z]{2}$/',$licensePlate);
        if($preg) return true;
        else return false; 
    }
    
    public function regexNumRent(string $numRent) {
        $preg = preg_match('/^[A-Z]{3}[0-9]{5}[A-Z]{3}$/',$numRent);
        if($preg) return true;
        else return false;
    }
}