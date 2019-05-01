<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once("vendor/autoload.php");

//create an instance of the base class
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default root
$f3->route('GET /', function () {

    echo "hello";
    //display a view
    //$view = new Template();
    //echo $view->render('views/home.html');
});

//begin order
$f3->route('GET /order', function() {
    //display a view
    $view = new Template();
    echo $view->render('views/form1.html');
});

//second step of order
$f3->route('POST /order2', function () {

    //print_r($_POST);
    //save form info in session for next form
    $_SESSION['animal'] = $_POST['animal'];
    $view = new Template();
    echo $view->render('views/form2.html');
});

//final step of order
$f3->route('POST /result', function () {

    //save form info in session
    $_SESSION['color'] = $_POST['color'];

    $view = new Template();
    echo $view->render('views/results.html');
});

//run fat-free
$f3->run();