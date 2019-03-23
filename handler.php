<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

/*
Tested working with PHP5.4 and above (including PHP 7)
*/

require_once('assets/php/autoload.php');

use FormGuide\Handlx\FormHandler;

$pp = new FormHandler();

$validator = $pp->getValidator();
$validator->fields(['your-name', 'your-email'])->areRequired()->maxLength(40);
$validator->field('your-email')->isEmail();
$validator->field('your-title')->maxLength(1000);
$validator->field('your-message')->maxLength(6000);

$pp->sendEmailTo('test@test.com'); // Your email here

echo $pp->process($_POST);