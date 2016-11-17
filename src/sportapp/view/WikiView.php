<?php

namespace sportapp\view;


use Michelf\Markdown;

class WikiView  extends AbstractView{

    public function __construct($data){
        parent::__construct($data);
    }

    protected function renderAll(){
        $html = "<ul>";
        foreach ($this->data as $valeur){
                $html.="<li><a href='$this->script_name/sportnet/view/?title=$valeur->title'>$valeur->title</a></li>";
        }
        $html.="</ul>";
        return $html;
    }

    protected function renderView(){
        $html = Markdown::defaultTransform($this->data->text);
        return $html;
    }

    protected function renderSpacePerso(){
        $html = "<ul>";
        foreach ($this->data as $valeur){
            $html.="<li><a href='$this->script_name/sportnet/view/?title=$valeur->title'>$valeur->title</a></li>";
        }
        $html.="</ul>";
        $html.= "<ul>";
        foreach ($this->data as $valeur){
            $html.="<li><a href='$this->script_name/sportnet/edit/?title=$valeur->title'>Modifier</a></li>";
        }
        $html.="</ul>";
        return $html;
    }

    protected function renderMyEvents(){
        $html = "<ul>";
        foreach ($this->data as $valeur){
            $html.="<li><a href='$this->script_name/sportnet/view/?name=$valeur->name'>$valeur->name</a></li>";
        }
        $html.="</ul>";
     /*   $html.= "<ul>";
        foreach ($this->data as $valeur){
            $html.="<li><a href='$this->script_name/sportnet/edit/?name=$valeur->name'>Modifier</a></li>";
        }
        $html.="</ul>";*/
        return $html;
    }

    protected function renderNewPage(){
        $html= '<article>
                 <section>
                    <form class= "login" method = "post" action ="'.$this->script_name.'/sportnet/save/" name="formulaireArticle">
                        <div class="login_text">
                            <label>Titre</label><br>
                            <input type ="text" name="title"/>
                        </div>
                        <div class="pass_text">
                            <textarea name="article" rows="10" cols="40"></textarea>
                        </div>
                        <div class="login_button">
                        <button class="btn" type="sumit" name="logup" >Enregistrer</button>
                        </div>
                    </form>
                 </section>
                </article>';
        return $html;
    }

    protected function renderAccueil(){
        $html= ' <article>
                      <section>
                        <h2>Bienvenue</h2>
                        <p>Cr&eacute;ez vos &eacute;v&eacute;nements sportifs grâce à Sportnet...</p>
                      </section>
                      <section>
                          <div>
                            <img src="">
                          </div>
                
                          <div>
                            <img src="">
                          </div>
                
                      </section>
                </article>';
        return $html;
    }

    protected function renderEvents(){
        $html= '<h1>Bienvenues, voici tous nos événements et sa description</h1>';
        $html.= '<li><a href="'.$this->script_name.'/sportnet/inscription/">S&#39;inscrire</a></li>';
        $html.= '<li><a href="'.$this->script_name.'/sportnet/resultats/">Résultats</a></li>';
        return $html;
    }

    protected function renderInscription(){
        $html= '<h1>Bienvenues, vous pouvez vous s&#39;inscrire ici</h1>';
        $html.= ' <a href="'.$this->script_name.'/sportnet/infoParticipant/"><button type="sumit" name="" >S&#39;inscrire</button></a>';
        return $html;
    }

    protected function renderInfoParticipant(){
        $html= '<h1>Voici l&#39;information du participant</h1>';
        return $html;
    }

    protected function renderResultats(){
        $html= '<h1>Voici les résultats</h1>';
        return $html;
    }

    protected function renderNewEvent(){
        $html= '<article>
                  <section class="column_5 offset_1 milieu">
                    <h2 class="row column_4 title">Cr&eacute;er un &eacute;v&eacute;nement</h2>
                    <form method = "post" action ="'.$this->script_name.'/admin/addEvent/">
                        <div class="row">
                          <label for="name">Nom</label><br>
                          <input type="text" name="name"/>
                        </div>
                        <div class="row">
                          <label for="place">Lieu</label><br>
                          <input type="text" name="palce"/>
                        </div>
                        <div class="row">
                          <label for="discipline">Dicipline</label><br>
                          <input type="text" name="discipline"/>
                        </div>
                        <div class="row">
                          <label>Date de début</label><br>
                          <input type="date" name="star_date"/>
                        </div>
                        <div class="row">
                          <label>Date de fin</label><br>
                          <input type="date" name="end_date"/>
                        </div>
                        <div class="row">
                          <label>Description</label><br>
                          <textarea name="descritpion" row="10" cols="50"></textarea>
                        </div>
                        <div class="row">
                          <input type="submit" name="newEvent" value="Créer"/> 
                          <input type="reset" name="annuler" value="Annuler"/>
                        </div>
                    </form>   
                     </section>
               </article>';
        return $html;
    }

    protected function renderNewTail(){
        $html= '<article>
                  <section class="column_5 offset_1 milieu">
                    <h2 class="row column_4 title">Ajouter une &eacute;preuve</h2>
                    <form method="post" action="">
                        <div class="row">
                          <label for="name">Nom de l\'&eacute;preuve</label><br>
                          <input type="text" name="name"/>
                        </div>
                        <div class="row">
                          <label for="place">Lieu</label><br>
                          <input type="text" name="place"/>
                        </div>
                        <div class="row">
                           <label>description</label><br>
                           <textarea name="descritpion" row="10" cols="50"></textarea><br>
                        </div>
                        <div class="row">
                           <label>Tarif</label><br>
                           <input type="number" id="price" name="price"/>euros
                        </div>
                        <div class="row">
                          <input type="submit" value="creer"/>
                          <input type="reset" value="annuler"/>
                        </div>
                    </form>
                </article>';
        return $html;
    }
    protected function renderGestion(){
        $html= ' <article>
                      <section class="column_5 offset_1 milieu">
                        <h2 class="row column_4 title">G&eacute;rer mon &eacute;v&eacute;nement</h2>
                        <form method="post" action="">
                            <div class="row">
                              <label for="name">Nom</label><br>
                              <input type="text" name="name"/>
                            </div>
                            <div class="row">
                              <label for="place">Lieu</label><br>
                              <input type="text" name="place"/>
                            </div>
                            <div class="row">
                              <label for="discipline">email</label><br>
                              <input type="text" name="discipline"/>
                            </div>
                            <div class="row">
                               <label>Description</label><br>
                               <textarea name="descritpion" row="10" cols="50"></textarea>
                             </div>
                             <div class="row">
                               <label>Date</label><br>
                               <input type="date" name="date"/><br>
                             </div>
                             <div class="row">
                              <input type="submit" neme="valider" value="Valider"/> 
                              <input type="reset" name="annuler" value="Annuler"/>
                             </div>
                        </form>
                             
                        <aside id="menu">
                           <p>Liste des participants</p>
                           <button type="sumbit" value="open">Ovrir Inscription</button>
                           <button type="sumbit" value="close"/>Clos Inscription</button>
                           <button type="sumbit" value="publish"/>Publier Événement</button>
                           <button type="sumbit" value="upload"/>Deposer Résultats</button>
                        </aside>
                      </section>
                </article>';
        return $html;
    }

    protected function renderEditPage(){
        $html= '<form class= "login" method = "post" action ="'.$this->script_name.'/sportnet/save/" name="formulaireEdition">
                        <div class="login_text">
                            <label>"'.$this->data->title.'"</label><br>
                            <input type ="hidden" name="id" value="'.$this->data->id.'"/>
                            <input type ="hidden" name="title" value="'.$this->data->title.'"/>
                        </div>
                        <div class="pass_text">
                            <textarea name="article" rows="10" cols="40" value="">'.$this->data->text.'</textarea>
                        </div>
                        <div class="login_button">
                        <button type="sumit" name="logup" >Enregistrer</button>
                        </div>
                    </form>';
        return $html;
    }

    public function render($selector){


        switch($selector){
        case 'view':
            $main = $this->renderView();
            break;

        case 'all':
            $main = $this->renderAll();
            break;

        case 'singup':
            $main = $this->renderSpacePerso();
            break;

        case 'newPage':
            $main = $this->renderNewPage();
            break;

        case 'editPage':
            $main = $this->renderEditPage();
            break;

        case 'accueil':
            $main = $this->renderAccueil();
            break;

        case 'events':
            $main = $this->renderEvents();
            break;

        case 'inscription':
            $main = $this->renderInscription();
            break;

        case 'infoParticipant':
            $main = $this->renderInfoParticipant();
            break;

        case 'resultats':
            $main = $this->renderResultats();
            break;

        case 'newEvent':
            $main = $this->renderNewEvent();
            break;

        case 'newTail':
            $main = $this->renderNewTail();
            break;

        case 'gestion':
            $main = $this->renderGestion();
            break;

        case 'myEvents':
            $main = $this->renderMyEvents();
            break;

        default:
            $main = $this->renderAccueil();
            break;
        }

        $style_file = $this->app_root.'/html/style.css';

        $header = $this->renderHeader();
      //$header.= $this->renderMenu();
        if(isset($_SESSION['user_login'])){
            $menu   = $this->renderMenu2();
        }else{
            $menu   = $this->renderMenu();
        }
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
        <title>SportNet</title>
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
