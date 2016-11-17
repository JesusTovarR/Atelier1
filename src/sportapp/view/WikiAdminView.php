<?php

namespace sportapp\view;


use Michelf\Markdown;

class WikiAdminView  extends AbstractView{

    /* Constructeur
    *
    * On appelle le constructeur de la classe parent
    *
    */
    public function __construct(){
        parent::__construct(null);
    }

    protected function renderLogin(){
        $html= '<article>
                  <section>
                    <h2>Bienvenue</h2>
                    <form class= "login" method = "post" action ="'.$this->script_name.'/admin/singup/" name="formulaire">
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
                  </section>
                </article>';
        return $html;
    }

    protected function renderCreateUser(){
        $html= '<article>
                  <section>
                    <h2>S&#39;inscrire en tant qu&#39;Organisateur</h2>
                    <form method = "post" action ="'.$this->script_name.'/admin/add/">
                        <div>
                          <label for="firstname">Nom</label><br>
                          <input type="text" name="firstname"/>
                       </div>
                       <div>
                          <label for="name">Prénom</label><br>
                          <input type="text" name="name"/>
                       </div>
                       <div>
                          <label for="email">email</label><br>
                          <input type="email" name="login"/>
                       </div>
                       <div>
                          <label for="naissance">Date de naissance</label><br>
                          <input type="date" name="naissance"/>
                       </div>
                       <div>
                          <label for="pass">Mot de passe</label><br>
                          <input type="password" name="pass"/>
                       </div>
                       <div>
                          <label for="pass">Confirmation de mot de passe</label><br>
                          <input type="password" name="pass_verifycation"/>
                       </div>
                       <div>
                          <input type="submit" value="Valider"/>
                          <input type="reset" value="Annuler"/>
                       </div>
                    </form>
                  </section>
                </article>';
        return $html;
    }

    protected function renderView(){
        $html = Markdown::defaultTransform($this->data->text);
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

        $style_file = $this->app_root.'/html/style.css';

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
        <title>MiniWiki</title>
        <link rel="stylesheet" href="${style_file}"> 
    </head>

    <body>
        
        <header class="theme-backcolor1"> ${header}  </header>
        
        <section>
        <aside>    

                <nav id="menu" class="theme-backcolor1"> ${menu} </nav>

            </aside>

            <article class="theme-backcolor2">  ${main} </article>

        </section>

        <footer class="theme-backcolor1"> ${footer} </footer>

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