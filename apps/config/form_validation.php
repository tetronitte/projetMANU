<?php

$config = array(
    'register' => array(
        array(
            'field' => 'lastname',
            'label' => 'lastname',
            'rules' => 'required'
        ),
        array(
            'field' => 'firstname',
            'label' => 'firstname',
            'rules' => 'required'
        ),
        array(
            'field' => 'birthdate',
            'label' => 'birthdate',
            'rules' => 'required'
        ),
        array(
            'field' => 'phone',
            'label' => 'phone',
            'rules' => 'required|regex_match[/^[0-9]{10}/]'
        ),
        array(
            'field' => 'mail',
            'label' => 'mail',
            'rules' => 'valid_email|is_unique[patients.mail]|required'
        )
        ,
        array(
            'field' => 'city',
            'label' => 'city',
            'rules' => 'required'
        )
        ,
        array(
            'field' => 'adress',
            'label' => 'adress',
            'rules' => 'required'
        )
        ,
        array(
            'field' => 'pwd',
            'label' => 'pwd',
            'rules' => 'required'
        )
        ,
        array(
            'field' => 'verifPwd',
            'label' => 'verifPwd',
            'rules' => 'required'
        )
        ,
        array(
            'field' => 'drivingLicence',
            'label' => 'drivingLicence',
            'rules' => 'required'
        )
        ,
        array(
            'field' => 'drivingLicenceObtainDate',
            'label' => 'drivingLicenceObtainDate',
            'rules' => 'required'
        )
    )
);