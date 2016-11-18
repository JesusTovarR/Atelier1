<?php
require_once 'conf/autoload.php';
require_once 'vendor/autoload.php';

session_start();

define("SPORTNET_VIEW_ACCUEIL", 'accueil');
define("SPORTNET_VIEW_EVENTS", 'events');
define("SPORTNET_VIEW_INSCRIPTION", 'inscription');
define("SPORTNET_VIEW_INFOPARTICIPANT", 'infoParticipant');
define("SPORTNET_VIEW_RESULTATS", 'resultats');
define("SPORTNET_VIEW_NEWEVENT", 'newEvent');
define("SPORTNET_VIEW_MYEVENTS", 'myEvents');
define("SPORTNET_VIEW_NEWTAIL", 'newTail');
define("SPORTNET_VIEW_GESTION", 'gestion');
define("SPORTNET_VIEW_LOGIN", 'login');
define("SPORTNET_VIEW_LOGOUT", 'logout');
define("SPORTNET_VIEW_COMPTE", 'compte');

$router = new \sportapp\utils\Router();
$router->addRoute('default',     '\sportapp\control\SportnetController', 'accueil');
$router->addRoute('/sportnet/events/', '\sportapp\control\SportnetController', 'allEvents');
$router->addRoute('/sportnet/inscription/', '\sportapp\control\SportnetController', 'inscriptionEvent');
$router->addRoute('/sportnet/infoParticipant/', '\sportapp\control\SportnetController', 'infoParticipant');
$router->addRoute('/sportnet/resultats/', '\sportapp\control\SportnetController', 'resultats');
$router->addRoute('/admin/newEvent/', '\sportapp\control\SportnetAdminController', 'newEvent');
$router->addRoute('/admin/myEvents/', '\sportapp\control\SportnetAdminController', 'myEvents');
$router->addRoute('/admin/newTail/', '\sportapp\control\SportnetAdminController', 'newTail');
$router->addRoute('/admin/gestion/', '\sportapp\control\SportnetAdminController', 'gestion');
$router->addRoute('/admin/login/', '\sportapp\control\SportnetAdminController', 'loginUser');
$router->addRoute('/admin/singup/', '\sportapp\control\SportnetAdminController', 'checkUser');
$router->addRoute('/admin/logout/', '\sportapp\control\SportnetAdminController', 'logoutUser');
$router->addRoute('/sportnet/create/', '\sportapp\control\SportnetAdminController', 'createUser');
$router->addRoute('/admin/add/', '\sportapp\control\SportnetAdminController', 'addUser');
$router->addRoute('/admin/addEvent/', '\sportapp\control\SportnetAdminController', 'addEvent');
$http_req = new sportapp\utils\HttpRequest();
$router->dispatch($http_req);


