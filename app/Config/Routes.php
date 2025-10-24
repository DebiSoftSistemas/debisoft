<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

//  VIEW'S COVER
//  HOME
$routes->get('/',                           'Cover\Home::cover');
$routes->get('/cover',                      'Cover\Home::cover');
$routes->get('/contactanos',                'Cover\Home::contactanos');
$routes->get('/debifact',                   'Cover\Home::debifact');
$routes->get('/debiconta',                  'Cover\Home::debiconta');
$routes->get('/masproductos',               'Cover\Home::masProductos');
$routes->get('/debisicte',                  'Cover\Home::debisicte');
$routes->get('/debisijap',                  'Cover\Home::debisijap');
$routes->get('/politicas',                  'Cover\Home::terminos');
$routes->get('/proteccion',                 'Cover\Home::proteccionDatos');
$routes->post('/idioma',                    'Cover\Home::idioma');
//  solucitud firma
$routes->get('/solicitarFirma',            'Cover\Home::solicitarFirma');




if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
