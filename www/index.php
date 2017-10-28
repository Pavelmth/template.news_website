<?php

require_once __DIR__.'../autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$controllerClassName = $ctrl.'Controller';

try {
$controller = new $controllerClassName;
$method = 'action'.$act;
$controller->$method($id);
} catch (ModelEcxeption $ex) {
    $view = new View();
    $view->assing($ex->getMessage());
    $view->display('viewError.php');
}









