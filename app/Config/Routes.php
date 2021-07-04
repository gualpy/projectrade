<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Front\Home');

$routes->setDefaultMethod('index');

//Pagina principal


$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Front\Home::index');
$routes->get('register','Front\Home::register',['as'=>'register']);

//access/dashboardHome_view

$routes->group('Auth',['namespace'=>'App\Controllers\Auth'],function($routes){
    $routes->post('check','Login::signin',['as'=>'signin']);//revisa si el usuario esta registrado
    $routes->post('store','Register::store',['as'=>'store']);
    $routes->add('exit','Login::logout',['as'=>'logout']);
});

//Dashboard - ,'filter'=>'auth:Cliente,Admin'
$routes->group('access',['namespace'=>'App\Controllers\Dashboard','filter'=>'auth:Cliente,Admin'],function($routes){
    $routes->get('dashboard','Home::index',['as'=>'panel']);// LOS DATOS DE PRESENTACIÓN EN LA PAG. PRINCIPAL DEL DASHBOARD
    //CONTROLADOR DEPOSITO
    $routes->get('deposito','Deposito::index',['as'=>'deposito']);
    $routes->post('depositar','Deposito::store',['as'=>'hacerDeposito']);
    //CONTROLADOR RETIROS
    $routes->get('retiro','Retiro::index',['as'=>'retiro']);
    //$routes->post('store','Retiro::store',['as'=>'hacerRetiro']);
    //CONTROLADOR MOVIMIENTOS
    $routes->get('movimiento','Movimiento::index');
    // Configuracion
    $routes->get('config','Config::index',['as'=>'config']);
    $routes->post('actualizaCliente','Config::store',['as'=>'actualizaCliente']);
    $routes->get('cambiaPassword','Cambiapassword::index',['as'=>'cpassword']);
    $routes->post('actualizaPassword','Cambiapassword::update',['as'=>'actualizaPassword']);
    //$routes->post('store','Cuenta::store',['as'=>'register']);
});
$routes->group('admin',['namespace'=>'App\Controllers\Admin','filter'=>'auth:Admin'],function($routes){
    $routes->get('dashboard','Admin::index',['as'=>'panelAdmin']);
    $routes->get('detalleCuentas/(:num)','Admin::detalleCuentas/$1',['as'=>'detalle_Cuentas']);
    
});
// $routes->group('access',['namespace'=>'App\Controllers\Dashboard','filter'=>'auth:Admin'],function($routes){
//     $routes->get('dashboard','Home::index',['as'=>'pael']);// LOS DATOS DE PRESENTACIÓN EN LA PAG. PRINCIPAL DEL DASHBOARD


// });

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('access/', 'Login::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}