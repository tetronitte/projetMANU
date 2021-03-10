<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    public function regexName(string $str) {
        if (preg_match('/^([0-9a-zA-ZàáâäæçéèêëîïôœùûüÿÀÂÄÆÇÉÈÊËÎÏÖÔŒÙÛÜŸ \-\']+)$/',$str)) return true;
        else return false;
    }

    public function regexDate(string $date) {
        if (preg_match('/^(19|20)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])$/',$date)) return true;
        else return false;
    }

    public function checkMajority(string $date) {
        $majorityDate = strtotime(date('d-m-Y', strtotime('-18 year')));
        $date = strtotime($date);
        if($date < $majorityDate) return true;
        else false;
    }

    public function regexPhone(string $phone) {
        return preg_match('/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',$phone);
    }

    public function regexPassword(string $pwd) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,18}$/',$pwd);
    }

    public function regexDrivingLicense(string $pwd) {
        return preg_match('/^[0-9]{12}$/',$pwd);
    }

    public function sizePassword(string $pwd) {
        if (strlen($pwd) > 7 && strlen($pwd) < 19) return true;
        else return false;
    }

    public function isEqualPassword(string $pwd, string $vpwd) {
        if ($pwd == $vpwd) return true;
        else return false;
    }
}