<?php
require_once 'conf/autoload.php';
require_once 'vendor/autoload.php';

session_start();

define("SPORTNET_VIEW_ACCUEIL", 'accueil');
define("SPORTNET_VIEW_EVENTS", 'events');
define("SPORTNET_VIEW_INSCRIPTION", 'inscription');
define("SPORTNET_VIEW_DESCRIPTION", 'description');
define("SPORTNET_VIEW_INFOPARTICIPANT", 'infoParticipant');
define("SPORTNET_VIEW_RESULTATS", 'resultats');
define("SPORTNET_VIEW_NEWEVENT", 'newEvent');
define("SPORTNET_VIEW_MYEVENTS", 'myEvents');
define("SPORTNET_VIEW_NEWTRIAL", 'newTrial');
define("SPORTNET_VIEW_GESTION", 'gestion');
define("SPORTNET_VIEW_LOGIN", 'login');
define("SPORTNET_VIEW_LOGOUT", 'logout');
define("SPORTNET_VIEW_COMPTE", 'compte');

$router = new \sportapp\utils\Router();
$router->addRoute('default',     '\sportapp\control\SportnetController', 'accueil');
$router->addRoute('/sportnet/events/', '\sportapp\control\SportnetController', 'allEvents');
$router->addRoute('/sportnet/inscription/', '\sportapp\control\SportnetController', 'inscriptionEvent');
$router->addRoute('/sportnet/descriptionEvent/', '\sportapp\control\SportnetController', 'descriptionEvent');
$router->addRoute('/sportnet/infoParticipant/', '\sportapp\control\SportnetController', 'infoParticipant');
$router->addRoute('/sportnet/addParticipant/', '\sportapp\control\SportnetController', 'addParticipant');
$router->addRoute('/sportnet/resultats/', '\sportapp\control\SportnetController', 'resultats');
$router->addRoute('/admin/newEvent/', '\sportapp\control\SportnetAdminController', 'newEvent');
$router->addRoute('/admin/myEvents/', '\sportapp\control\SportnetAdminController', 'myEvents');
$router->addRoute('/admin/newTrial/', '\sportapp\control\SportnetAdminController', 'newTrial');
$router->addRoute('/admin/gestion/', '\sportapp\control\SportnetAdminController', 'gestion');
$router->addRoute('/admin/login/', '\sportapp\control\SportnetAdminController', 'loginUser');
$router->addRoute('/admin/singup/', '\sportapp\control\SportnetAdminController', 'checkUser');
$router->addRoute('/admin/logout/', '\sportapp\control\SportnetAdminController', 'logoutUser');
$router->addRoute('/sportnet/create/', '\sportapp\control\SportnetAdminController', 'createUser');
$router->addRoute('/admin/add/', '\sportapp\control\SportnetAdminController', 'addUser');
$router->addRoute('/admin/addEvent/', '\sportapp\control\SportnetAdminController', 'addEvent');
$router->addRoute('/admin/addTrial/', '\sportapp\control\SportnetAdminController', 'addTrial');
$router->addRoute('/admin/editEvent/', '\sportapp\control\SportnetAdminController', 'editEvent');
$router->addRoute('/admin/supprimerEvent/', '\sportapp\control\SportnetAdminController', 'supprimerEvent');
$router->addRoute('/admin/addFile/', '\sportapp\control\SportnetAdminController', 'addFile');
$http_req = new sportapp\utils\HttpRequest();
$router->dispatch($http_req);


