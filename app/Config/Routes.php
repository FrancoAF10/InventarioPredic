<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta que contiene un / es la principal => www.miweb.com

//Las rutas que se acceden por GET son las que se utilizan como URL
//Cuando se tratan de POST son por FORMULARIO



// ===================================================================
// ===========       RUTAS DEL CONTROLADOR            ================
// ===================================================================

$routes->get('/', 'home::index');
$routes->get('/prediccion', 'PrediccionController::index');
$routes->get('/productos', 'ProductoController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/api/getdatamovimientos', 'DashboardController::getDataInformeMovimiento');

$routes->get('/stock', 'StockController::index');

$routes->get('/movimiento', 'MovimientosController::index');
$routes->get('/movimiento/crear', 'MovimientosController::crear');
$routes->post('/movimiento/guardar', 'MovimientosController::guardar');

$routes->get('/Producto/crear', 'ProductoController::crear');
$routes->post('/producto/guardar', 'ProductoController::guardar');

$routes->post('movimiento/importar', 'MovimientosController::importar');

$routes->post('/prediccion/predecir', 'PrediccionController::predecir');



