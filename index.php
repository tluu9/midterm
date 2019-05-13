<?php
session_start();
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file autoload.php
require_once('vendor/autoload.php');


//Create an instance of the Base class/ instantiate Fat-Free
$f3 = Base::instance();


//Turn on Fat-free error reporting/Debugging
$f3->set('DEBUG',3);

//Define a default route (use backlash / )
$f3->route('GET /', function()
{
    echo"<h1>Midterm Survey</h1>
    <br><p><a href='survey'>Take My Midterm Survey</a></p>";
});

//Run fat free F3
$f3->run();