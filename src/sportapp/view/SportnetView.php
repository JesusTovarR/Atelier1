<?php

namespace sportapp\view;


use Michelf\Markdown;

class SportnetView  extends AbstractView{

    public function __construct($data){
        parent::__construct($data);
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

    protected function renderAccueil(){
        $html= ' <section>
                        <h2 class="row column_4 title">Bienvenue</h2>
                        <p>Cr&eacute;ez vos &eacute;v&eacute;nements sportifs grâce à Sportnet...</p>
                      </section>
                      <section>
                          <div>
                            <img src="">
                          </div>
                
                          <div>
                            <img src="">
                          </div>
                
                      </section>';
        return $html;
    }

    protected function renderEvents(){
        $html= '<h2 class="row column_4 title">Bienvenues, voici tous nos événements et sa description</h2>
                 <table border="1px" >
                <thead>
                    <tr>
                        Événement
                    </tr>
                </thead>
                <tbody>';
        foreach ($this->data as $valeur){
          //  $html.='<form method = "post" action ="'.$this->script_name.'/sportnet/inscription/?id='.$valeur->id.'">
            $html.="<tr>
                    <td>$valeur->name</td>
                    <td><a href='$this->script_name/sportnet/inscription/?id=$valeur->id'><button>Description</button></a></td>
                </tr>";
            //<input type="submit" name="inscription" value="Description"/>
           //</form>';
        }

        $html.='</tbody>
            </table>';
        $html.= '<li><a href="'.$this->script_name.'/sportnet/resultats/">Résultats</a></li>';
        return $html;
    }

    protected function renderInscription(){
        $html= '<h2 class="row column_4 title">Bienvenues, vous pouvez vous s&#39;inscrire dans l&#39;événement suivant:</h2>';
        $html.='<h2>'.$this->data->name.'</h2>';
        $html.='<p>'.$this->data->place.'</p>';
        $html.='<p>'.$this->data->dicipline.'</p>';
        $html.='<p>'.$this->data->start_date.'</p>';
        $html.='<p>'.$this->data->end_date.'</p>';
        $html.='<p>'.$this->data->description.'</p>';
        $html.= ' <a href="'.$this->script_name.'/sportnet/infoParticipant/"><button type="sumit" name="" >S&#39;inscrire</button></a>';
        return $html;
    }

    protected function renderInfoParticipant(){
        $html= '<h2>Voici l&#39;information du participant</h2>';
        return $html;
    }

    protected function renderResultats(){
        $html= '<h1>Voici les résultats</h1>';
        return $html;
    }

    protected function renderNewEvent(){
        $html= '<section class="column_5 offset_1 milieu">
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
                     </section>';
        return $html;
    }

    protected function renderNewTail(){
        $html= '<section class="column_5 offset_1 milieu">
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
                    </form>';
        return $html;
    }
    protected function renderGestion(){
        $html= '<section class="column_5 offset_1 milieu">
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
                      </section>';
        return $html;
    }

    public function render($selector){


        switch($selector){
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

        // $style_file = $this->app_root.'/html/style.css';
        //<link rel="stylesheet" href="${style_file}">
        $style_file2 = $this->app_root.'/html/Librairie/css/library.css';
        $style_file3 = $this->app_root.'/html/Librairie/css/theme.css';

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
        <title>Sportnet</title>
        <link rel="stylesheet" href="${style_file2}"> 
        <link rel="stylesheet" href="${style_file3}"> 
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


