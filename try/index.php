<?php 

require_once '../vendor/autoload.php';

$router= new App\Entity\Router();

$router
    ->register('/home',[App\Entity\Home::class, 'index'])
    ->register('/home/invoices',[App\Entity\Invoice::class, 'index'])
    ->register('/home/invoices1',[App\Entity\Invoice::class, 'index1'])
    ->register('/home/invoices/create',[App\Entity\Invoice::class, 'create']);
echo $router->resolve($_SERVER['REQUEST_URI']);
