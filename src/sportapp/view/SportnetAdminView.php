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
        $html= '<section  class="column_4 offset_1 connexion">
                    <h2 class="row column_4 title">Se connecter</h2>
                    <form class= "login space" method = "post" action ="'.$this->script_name.'/admin/singup/" name="formulaire">
                       <div class="login_text">
                           <label for="email">Email</label><br>
                           <input type ="text" name="login"/>
                       </div>
                       <div class="login_text">
                           <label for="pass">Mot de passe</label><br>
                           <input type="password" name="pass"/>
                       </div>
                       <div class="login_button">
                           <input type="submit" value="Se connecter"/>
                       </div>
                    </form>
                  </section>';
        return $html;
    }

    protected function renderCreateUser(){
        $html= '<section>
                    <h2 class="row column_4 title">S&#39;inscrire en tant qu&#39;Organisateur</h2>
                    <form class="center column_4" method = "post" action ="'.$this->script_name.'/admin/add/">
                        <div class="row">
                          <label for="firstname">Nom</label><br>
                          <input type="text" name="firstname"/>
                       </div>
                       <div class="row">
                          <label for="name">Prénom</label><br>
                          <input type="text" name="name"/>
                       </div>
                       <div class="row">
                          <label for="email">email</label><br>
                          <input type="email" name="login"/>
                       </div>
                       <div class="row">
                          <label for="naissance">Date de naissance</label><br>
                          <input type="date" name="naissance"/>
                       </div>
                       <div class="row">
                          <label for="pass">Mot de passe</label><br>
                          <input type="password" name="pass"/>
                       </div>
                       <div class="row">
                          <label for="pass">Confirmation de mot de passe</label><br>
                          <input type="password" name="pass_verifycation"/>
                       </div>
                       <div class="row">
                          <input type="submit" value="Valider"/>
                          <input type="reset" value="Annuler"/>
                       </div>
                    </form>
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

      //  $header = $this->renderHeader();
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
        
        <header id="head" class="row"><nav id="menu" class=""> ${menu} </nav> </header>
        
        <section>
        

            <article class="theme-backcolor2">  ${main} </article>

        </section>

        <footer class="row foot"> ${footer} </footer>

    </body>
</html>
EOT;

    echo $html;

    }


}
/*
<aside>

                <nav id="menu" class="theme-backcolor1"> ${menu} </nav>

            </aside>*/