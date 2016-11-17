<?php
spl_autoload_register('mon_autoload');
function mon_autoload($nom_classe){
	 try {
	$nom_classe = "src/" . $nom_classe. ".php";
	require_once str_replace('\\', '/', $nom_classe);;
	 }catch (\Exception $e){
        echo $e->getMessage();
        echo $e->getTrace();
    }
}