<?php

namespace sportapp\view;

class SportnetAdminView  extends AbstractView{

    /* Constructeur
    *
    * On appelle le constructeur de la classe parent
    *
    */
    public function __construct(){
        parent::__construct(null);
    }

    protected function renderLogin(){
        $html= '<section class="row">
                    <h2  class="column_8 title textcenter">Se connecter</h2>
                     <form  method = "post" action ="'.$this->script_name.'/admin/singup/" name="formulaire">
                       <div class="row">
                           <input class="column_4 offset_2" type ="text" name="login"  placeholder="Email..."/>
                       </div>
                       <div class="row">
                           <input class="column_4 offset_2" type="password" name="pass" placeholder="Mot de pass..."/>
                       </div>
                       <div class="row">
                           <input class="column_4 offset_2 btn" type="submit" value="Se connecter"/>
                       </div>
                    </form>
                  </section>';
        return $html;
    }

    protected function renderCreateUser(){
        $html= '<section class="row">
                    <h2  class="column_8 title textcenter">S&#39;inscrire en tant qu&#39;Organisateur</h2>
                    <div>
                    <form  method = "post" action ="'.$this->script_name.'/admin/add/">
                        <div class="row">
                          <input class="column_4 offset_2" type="text" name="firstname" placeholder="Nom..."/>
                       </div>
                       <div class="row">
                          <input class="column_4 offset_2" type="text" name="name" placeholder="Prenom..."/>
                       </div>
                       <div class="row">
                          <input class="column_4 offset_2" type="email" name="login" placeholder="Email..."/>
                       </div>
                       <div class="row">
                          <input class="column_4 offset_2" type="date" name="naissance" placeholder="Date de naissance..."/>
                       </div>
                       <div class="row">
                          <input class="column_4 offset_2" type="password" name="pass" placeholder="Password..."/>
                       </div>
                       <div class="row">
                          <input class="column_2 offset_3 btn" type="submit" value="Valider"/>
                       </div>
                       <div class="row">
                          <input class="column_2 offset_3 btn" type="reset" value="Annuler"/>
                       </div>
                    </form></div>
                  </section>';
        return $html;
    }

    public function render($selector){


        switch($selector){
        case 'login':
            $main = $this->renderLogin();
            break;

        case 'compte':
            $main = $this->renderCreateUser();
            break;

        default:
            $main = $this->renderAll();
            break;
        }

       // $style_file = $this->app_root.'/html/style.css';
        //<link rel="stylesheet" href="${style_file}">
        $style_file2 = $this->app_root.'/html/Librairie/css/library.css';
        $style_file3 = $this->app_root.'/html/Librairie/css/theme.css';

        $header = $this->renderHeader();
        $menu   = $this->renderMenu();
        $footer = $this->renderFooter();


/*
 * Utilisation de la syntaxe HEREDOC pour ecrire la chaine de caractère de
 * la page entière. Voir la documentation ici:
 *
 * http://php.net/manual/fr/language.types.string.php#language.types.string.syntax.heredoc
 *
 * Noter bien l'utilisation des variable dans la chaine de caractère
 *
 */
        $html = <<<EOT
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Sportnet</title>
        <link rel="stylesheet" href="${style_file2}"> 
        <link rel="stylesheet" href="${style_file3}"> 
    </head>

    <body class="grid_float">
        
        <header id="head" class="row"> ${menu} </header>
        
        <article>
            ${main}
        </article>

        

    </body>
</html>
EOT;

    echo $html;

    }


}
/*
<aside>

                <nav id="menu" class="theme-backcolor1"> ${menu} </nav>

            </aside>

<footer class="row foot"> ${footer} </footer>*/
