<?php

$config = array(
    'signin' => array(
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
            'field' => 'mail',
            'label' => 'birthdate',
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
    'newRent' => array(
        array(
            'field' => 'start',
            'label' => 'start',
            'rules' => 'required'
        ),
        array(
            'field' => 'end',
            'label' => 'end',
            'rules' => 'required'
        ),
        array(
            'field' => 'car',
            'label' => 'car',
            'rules' => 'required'
        ),
        array(
            'field' => 'user',
            'label' => 'user',
            'rules' => 'required'
        )
    ),
    'updateUser' => array(
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
    ),
    'updateCar' => array(
        array(
            'field' => 'licensePlate',
            'label' => 'licensePlate',
            'rules' => 'required|regexLicensePlate'
        ),
        array(
            'field' => 'mileage',
            'label' => 'mileage',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'details',
            'label' => 'details',
            'rules' => 'required|regexName'
        )
    ),
    'addRent' => array(
        array(
            'field' => 'licensePlate',
            'label' => 'licensePlate',
            'rules' => 'required|regexLicensePlate'
        ),
        array(
            'field' => 'mail',
            'label' => 'mail',
            'rules' => 'required'
        ),
        array(
            'field' => 'dateStart',
            'label' => 'dateStart',
            'rules' => 'required|regexDate'
        ),
        array(
            'field' => 'dateEnd',
            'label' => 'dateEnd',
            'rules' => 'required|regexDate'
        ),
    ),
    'addRent' => array(
        array(
            'field' => 'licensePlate',
            'label' => 'licensePlate',
            'rules' => 'required|regexLicensePlate'
        ),
        array(
            'field' => 'mail',
            'label' => 'mail',
            'rules' => 'required'
        ),
        array(
            'field' => 'dateStart',
            'label' => 'dateStart',
            'rules' => 'required|regexDate'
        ),
        array(
            'field' => 'dateEnd',
            'label' => 'dateEnd',
            'rules' => 'required|regexDate'
        )
    ),
    'addReturn' => array(
        array(
            'field' => 'numRent',
            'label' => 'numRent',
            'rules' => 'required|regexNumRent'
        ),
        array(
            'field' => 'dateReturn',
            'label' => 'dateReturn',
            'rules' => 'required'
        )
    )
);