<?php
session_start();
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file autoload.php
require_once('vendor/autoload.php');
require_once('model/validation-functions.php');


//Create an instance of the Base class/ instantiate Fat-Free
$f3 = Base::instance();

//Array
$f3 -> set('theAnswers', array('This midterm is easy','I like Midterm','Today is Monday'));

//Turn on Fat-free error reporting/Debugging
$f3->set('DEBUG',3);

//Define a default route (use backlash / )
$f3->route('GET /', function()
{
    echo"<h1>Midterm Survey</h1>
    <br><p><a href='form'>Take My Midterm Survey</a></p>";
});

$f3->route('GET|POST /form',
    function ($f3)
    {

        if (!empty($_POST)) {
            $answers = $_POST['answers'];

            $f3->set('answers', $answers);

            if (form()) {
                $_SESSION['answers'] = $answers;

                $f3->reroute('/summary');
            }

        }
        $view=new Template();
        echo $view->render( 'views/form.html');
    });

//summary
$f3->route('GET|POST /summary', function() {

    $view = new Template();
    echo $view->render('views/results.html');
});

//Run fat free F3
$f3->run();