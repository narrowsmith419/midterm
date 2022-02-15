<?php

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require auto-load function
require_once('vendor/autoload.php');

//create instance of Base class
$f3 = Base::instance();

//define default route
$f3->route('GET /', function(){

    $view = new Template();

    echo $view->render('views/home.html');

});

//define personal-info route
$f3->route('GET|POST /personal', function($f3){

    //if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        //add data to the session variable
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['optradio'] = $_POST['optradio'];
        $_SESSION['number'] = $_POST['number'];

        //redirect user to next page
        $f3->reroute('profile');

    }

    $view = new Template();

    echo $view->render('views/personal-info.html');

});


//define summary route
$f3->route('GET /survey', function(){

    $view = new Template();

    echo $view->render('views/survey.html');


});

//run fat-free
$f3->run();
