<?php

require_once __DIR__ . '/vendor/autoload.php';

use Facade\OrderFacade;

// Crear el objeto de la fachada
$orderFacade = new OrderFacade();

// Realizar el pedido utilizando la fachada
$orderFacade->placeOrder();
