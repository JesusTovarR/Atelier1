<?php
require_once 'conf/autoload.php';
require_once 'vendor/autoload.php';

session_start();

define("ACCESS_LEVEL_NONE",  -100);
define("ACCESS_LEVEL_USER",   100);
define("ACCESS_LEVEL_ADMIN",  500);
define("SPORTNET_VIEW_ACCUEIL", 'accueil');
define("SPORTNET_VIEW_EVENTS", 'events');
define("SPORTNET_VIEW_INSCRIPTION", 'inscription');
define("SPORTNET_VIEW_INFOPARTICIPANT", 'infoParticipant');
define("SPORTNET_VIEW_RESULTATS", 'resultats');
define("SPORTNET_VIEW_NEWEVENT", 'newEvent');
define("SPORTNET_VIEW_MYEVENTS", 'myEvents');
define("SPORTNET_VIEW_NEWTAIL", 'newTail');
define("SPORTNET_VIEW_GESTION", 'gestion');
define("SPORTNET_VIEW_ALL", 'all');
define("SPORTNET_VIEW_PAGE", 'view');
define("SPORTNET_VIEW_LOGIN", 'login');
define("SPORTNET_VIEW_SINGUP", 'singup');
define("SPORTNET_VIEW_LOGOUT", 'logout');
define("SPORTNET_VIEW_NEW", 'newPage');
define("SPORTNET_VIEW_COMPTE", 'compte');
define("SPORTNET_VIEW_EDIT", 'editPage');

$router = new \sportapp\utils\Router();
$router->addRoute('/sportnet/all/', '\sportapp\control\WikiController', 'listAll',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/view/', '\sportapp\control\WikiController', 'viewPage', ACCESS_LEVEL_NONE);
$router->addRoute('default',     '\sportapp\control\WikiController', 'accueil',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/events/', '\sportapp\control\WikiController', 'allEvents', ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/inscription/', '\sportapp\control\WikiController', 'inscriptionEvent', ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/infoParticipant/', '\sportapp\control\WikiController', 'infoParticipant', ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/resultats/', '\sportapp\control\WikiController', 'resultats', ACCESS_LEVEL_NONE);
$router->addRoute('/admin/newEvent/', '\sportapp\control\WikiAdminController', 'newEvent', ACCESS_LEVEL_NONE);
$router->addRoute('/admin/myEvents/', '\sportapp\control\WikiAdminController', 'myEvents', ACCESS_LEVEL_NONE);
$router->addRoute('/admin/newTail/', '\sportapp\control\WikiAdminController', 'newTail', ACCESS_LEVEL_NONE);
$router->addRoute('/admin/gestion/', '\sportapp\control\WikiAdminController', 'gestion', ACCESS_LEVEL_NONE);
$router->addRoute('/admin/login/', '\sportapp\control\WikiAdminController', 'loginUser',  ACCESS_LEVEL_NONE);
$router->addRoute('/admin/singup/', '\sportapp\control\WikiAdminController', 'checkUser',  ACCESS_LEVEL_NONE);
$router->addRoute('/admin/perso/', '\sportapp\control\WikiAdminController', 'userSpace',  ACCESS_LEVEL_NONE);
$router->addRoute('/admin/logout/', '\sportapp\control\WikiAdminController', 'logoutUser',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/new/', '\sportapp\control\WikiController', 'newPage',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/save/', '\sportapp\control\WikiController', 'savePage',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/create/', '\sportapp\control\WikiAdminController', 'createUser',  ACCESS_LEVEL_NONE);
$router->addRoute('/admin/add/', '\sportapp\control\WikiAdminController', 'addUser',  ACCESS_LEVEL_NONE);
$router->addRoute('/admin/addEvent/', '\sportapp\control\WikiAdminController', 'addEvent',  ACCESS_LEVEL_NONE);
$router->addRoute('/sportnet/edit/', '\sportapp\control\WikiController', 'editPage',  ACCESS_LEVEL_NONE);
$http_req = new sportapp\utils\HttpRequest();
$router->dispatch($http_req);


