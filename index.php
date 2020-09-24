<?php
error_reporting(0);
use classes\Elevator;
use classes\Neighbour;

require_once 'vendor/autoload.php';
require_once 'classes/Elevator.php';
require_once 'classes/ElevatorText.php';
require_once 'classes/Neighbour.php';


session_start();
var_dump(Neighbour::NeighbourRandom());



if (!$_SESSION['current']) {
    $_SESSION['current'] = 1;
}
if ($_GET['f']) {
    $_SESSION['future'] = $_GET['f'];
}



$elevator = new Elevator($_SESSION['future'], $_SESSION['current']);
if ($elevator) {
    $time = $elevator->timeToWait();
    $message = $elevator->goFloor();
    $_SESSION['current'] = $_SESSION['future'];

}

if ($_GET['stop'] == 1) {
    $time = 'Let\'s start from begin';
    $message = 'You are on 1st floor';
    session_unset();
}


Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);



if ($_SERVER['REQUEST_URI'] == '/index.php')
{
    $template = $twig->loadTemplate('inside.php');
    echo $template->render(array());
}
else
{
    $template = $twig->loadTemplate('index.php');
    echo $template->render(array(   'msg' => $message,
                                    'time' => $time ));
}

