<?php

$config = array(
    'register' => array(
        array(
            'field' => 'lastname',
            'label' => 'lastname',
            'rules' => 'required|regexName'
        ),
        array(
            'field' => 'firstname',
            'label' => 'firstname',
            'rules' => 'required|regexName'
        ),
        array(
            'field' => 'birthdate',
            'label' => 'birthdate',
            'rules' => 'required|regexDate|checkMajority'
        ),
        array(
            'fiabel' => 'mail',
            'rules' => 'required|valid_email|is_unique[users.mail]'
        ),
        array(
            'field' => 'city',
            'label' => 'city',
            'rules' => 'required|regexName'
        ),
        array(
            'field' => 'phone',
            'label' => 'phone',
            'rules' => 'required|regexPhone'
        ),
        array(
            'field' => 'postal',
            'label' => 'postal',
            'rules' => 'required|regexPostal'
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'required'
        ),
        array(
            'field' => 'pwd',
            'label' => 'pwd',
            'rules' => 'required|sizePassword|regexPassword'
        ),
        array(
            'field' => 'verifPwd',
            'label' => 'verifPwd',
            'rules' => 'required|sizePassword|regexPassword|isEqualPassword[pwd]'
        ),
        array(
            'field' => 'drivingLicense',
            'label' => 'drivingLicense',
            'rules' => 'required|regexDrivingLicense'
        ),
        array(
            'field' => 'drivingLicenseObtainDate',
            'label' => 'drivingLicenseObtainDate',
            'rules' => 'required|regexDate'
        )
    ),
    'login' => array(
        array(
            'field' => 'mail',
            'label' => 'mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'pwd',
            'label' => 'pwd',
            'rules' => 'required|sizePassword|regexPassword'
        )
    ),
    'update' => array(
        array(
            'field' => 'mail',
            'rules' => 'required|valid_email|is_unique[users.mail]'
        ),
        array(
            'field' => 'phone',
            'label' => 'phone',
            'rules' => 'required|regexPhone'
        ),
        array(
            'field' => 'city',
            'label' => 'city',
            'rules' => 'required|regexName'
        ),
        array(
            'field' => 'postal',
            'label' => 'postal',
            'rules' => 'required|regexPostal'
        ),
        array(
            'field' => 'address',
            'label' => 'address',
            'rules' => 'required'
        ),
        array(
            'field' => 'drivingLicense',
            'label' => 'drivingLicense',
            'rules' => 'required|regexDrivingLicense'
        ),
        array(
            'field' => 'drivingLicenseObtainDate',
            'label' => 'drivingLicenseObtainDate',
            'rules' => 'required|regexDate'
        )
    ),
    'updatePassword' => array(
        array(
            'field' => 'oldPwd',
            'label' => 'oldPwd',
            'rules' => 'required|sizePassword|regexPassword'
        ),
        array(
            'field' => 'pwd',
            'label' => 'pwd',
            'rules' => 'required|sizePassword|regexPassword'
        ),
        array(
            'field' => 'verifPwd',
            'label' => 'verifPwd',
            'rules' => 'required|sizePassword|regexPassword|isEqualPassword[pwd]'
        )
    )
);