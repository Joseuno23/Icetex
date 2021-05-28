<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['Home'] = 'C_Panel'; 
$route['Logout'] = 'C_Main/Logout'; 

//usuarios
$route['User'] = 'Parameters/User/C_User'; 
$route['User/Edit/(:num)'] = 'Parameters/User/C_User/InfoUser/$1';
$route['Permissions'] = 'Parameters/Security/C_Security/Permissions';
$route['Buttons'] = 'Parameters/Security/C_Security/Buttons';

//maestro
$route['Roles'] = 'Parameters/Roles/C_Roles'; 
$route['TipoRadicado'] = 'Parameters/Tipo_Radicado/C_Tipo_Radicado'; 
$route['TipoDocumento'] = 'Parameters/Tipo_Documento/C_Tipo_Documento'; 
$route['Canal'] = 'Parameters/Canal/C_Canal'; 
$route['Dependencias'] = 'Parameters/Dependencia/C_Dependencia'; 

$route['Radicados'] = 'Radicado/C_Radicado/GetList';
$route['Radicados/Edit/(:num)'] = 'Radicado/C_Radicado/Edit/$1';
$route['Radicados/New'] = 'Radicado/C_Radicado/NewP';

