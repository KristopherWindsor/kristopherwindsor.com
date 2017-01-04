<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$system = @$_REQUEST['system'];
@$ip = $_SERVER['REMOTE_ADDR'];

if (!ctype_alpha($system) || strlen($system) > 30) $system = 'bad';

file_put_contents($system . '.json', json_encode( array( 'date'=>date(DATE_ATOM), 'ip'=>$ip ) ));

echo 'ok';
