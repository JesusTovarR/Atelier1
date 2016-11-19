<?php

namespace sportapp\view;

class SportnetView  extends AbstractView{

    public function __construct($data){
        parent::__construct($data);
    }

    protected function renderMyEvents(){
        $html='<section class="row">
        <h2  class="column_8 title textcenter">Bienvenue voici tous vos événements</h2>
        <div>
        <table class="table column_6 offset_1 title">
             <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Description</td>
                        <td>Lieu</td>
                        <td>Date du debut</td>
                        <td>Date du fin</td>
                        <td>Status</td>
                        <td>Inscriptions</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>';
        foreach ($this->data as $valeur){
            $html.="<tr>
                    <td>$valeur->name</td>
                    <td>$valeur->description</td>
                    <td>$valeur->place</td>
                    <td>$valeur->start_date</td>
                    <td>$valeur->end_date</td>";
                    if($valeur->status==0){
                   $html.="<td>Non publié</td>";
                    }else{
                    $html.="<td>Publié</td>";
                    }
                    if($valeur->inscription==0){
                        $html.="<td>Fermées</td>";
                    }else{
                        $html.="<td>Ouvertes</td>";
                    }
            $html.="<td><a href='$this->script_name/admin/gestion/?id=$valeur->id'><button>Gérer</button></a></td>
                    <td><a  href='$this->script_name/admin/supprimerEvent/?id=$valeur->id'><button>Supprimer</button></a></td>
                </tr>";
                }

        $html.='</tbody>
            </table>
            </div>
            </section>';
        return $html;
    }

    protected function renderAccueil(){
        $html= ' <section class="row">
                        <h2  class="column_8 title textcenter">Bienvenue</h2>
                        <div>
                        <p class="textjustifie column_6 offset_1 ">Avec Sportnet, cr&eacute;ez  tous vos &eacute;v&eacute;nements sportifs.Lorsque l’on souhaite obtenir les 
                        autorisations en mairie ou le financement de l’événement sportif par une entreprise, cela nécessite automatiquement 
                        un argumentaire solide. Vos partenaires potentiels ont besoin également de voir un intérêt, pour eux-mêmes, à soutenir 
                        votre événement.</p>
                        </div>
                        <div>
                        <p class="textjustifie column_6 offset_1 ">N’hésitez pas à vous renseigner auprès des associations de la ville si vous voulez un avis sur votre projet. 
                        Les demandes d’autorisations se font à la mairie, mais il faudra les convaincre en insistant sur la mise en valeur de 
                        l’activité de la ville, les retombées économiques possibles sur la ville, etc. La municipalité peut vous fournir un 
                        site et des équipements.</p>
                        </div>
                        <div>
                        <p class="textjustifie column_6 offset_1  ">Si vous désirez obtenir un financement par des entreprises, mettez en avant l’image de l’entreprise qui sera 
                        amplifiée par cet événement.</p>
                        </div>
                        <div>
                        <p class="textjustifie column_6 offset_1  ">Si vous êtes dans une association caritative, vous pouvez obtenir également un soutien financier des habitants de la ville concernée.</p>
                        </div>
                        <div>
                        <p class="textjustifie column_6 offset_1  ">Pensez à aller voir votre assureur pour couvrir les risques liés àvotre événement. Il est indispensable de s\'assurer, 
                        au risque d’être considéré comme responsable personnellement, lors d’un accident ou d’une avarie.Il est également possible 
                        de prendre contact avec des animateurs sportifs (dûment habilités) pour vous épauler dans votre projet.</p>
                       </div>
                        <div>
                        <p class="textjustifie column_6 offset_1 ">N’oubliez pas de faire remplir des autorisations parentales pour les enfants mineurs et des attestation d\'assurance 
                        responsabilité civile pour les participants, afin de vous justifier auprès de votre compagnie d’assurance. </p>
                        </div>
                        
                  </section>
                  <section class="row">
                           <div class="column_6 offset_1">
                          <div  class="btn column_2 offset_1 img">
                            <img src="'.$this->app_root.'/html/Librairie/images/sport.jpg">
                          </div>
                
                          <div class="btn column_2 offset_1 img">
                            <img src="'.$this->app_root.'/html/Librairie/images/sport.jpg">
                          </div>
                          </div>
                
                  </section>';
        return $html;
    }

    protected function renderEvents(){
        $html= '<section class="row">
                <h2 class="column_8 title textcenter">Bienvenue, voici tous nos événements et leur description</h2>
                 <div>
                 <table class="table column_6 offset_1" >
                <thead>
                    <tr  class="table">
                        <td>Nom</td>
                        <td>Lieu</td>
                        <td>Dicipline</td>
                        <td>Date du debut</td>
                        <td>Date du fin</td>
                        <td>Description</td>
                        <td>Inscriptions</td>
                    </tr>
                </thead>
                <tbody>';
        foreach ($this->data as $valeur){
            if($valeur->status==1) {
                $html .= "<tr>
                    <td>$valeur->name</td>
                    <td>$valeur->place</td>
                    <td>$valeur->dicipline</td>
                    <td>$valeur->start_date</td>
                    <td>$valeur->end_date</td>
                    <td><a href='$this->script_name/sportnet/descriptionEvent/?id=$valeur->id'><button>Détaillée</button></a></td>";
                if($valeur->inscription==1){
                    $html.="<td><a href='$this->script_name/sportnet/inscription/?id=$valeur->id'><button>S&#39;inscrire</button></a></td>
                </tr>";
                }else{
                    $html.="<td><button disable>S&#39;inscrire</button></td>
                </tr>";
                }
            }
        }

        $html.='</tbody>
            </table></div></section>';
        $html.= '<li><a href="'.$this->script_name.'/sportnet/resultats/">Résultats</a></li>';
        return $html;
    }

    protected function renderInscription(){
        $cont=0;
            $html= '<section class="row">
                    <h2 class="column_8 title textcenter">S&#39;inscrire au événement</h2>
                    <div>
                    <form method = "post" action ="'.$this->script_name.'/sportnet/addParticipant/">
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
                          <input type="email" name="email"/>
                       </div>
                       <div class="row">
                          <label for="naissance">Date de naissance</label><br>
                          <input type="date" name="naissance"/>
                       </div>
                       <div class="row">
                       <div class="row">
                         <label for="naissance">Épuvres</label><br>';

                   foreach ($this->data as $value){
                       $cont+=1;
                        $html.='<input type="checkbox" name="trial'.$cont.'" value="'.$value->id.'">'.$value->name.'';
                    }

                    $html.='</div>
                        <input type ="hidden" name="cont" value="'.$cont.'"/>
                       <div class="row">
                          <input type="submit" value="Valider"/>
                          <input type="reset" value="Annuler"/>
                       </div>
                    </form>
                    </div>
                  </section>';
        return $html;
    }

    protected function renderDescription(){
        $html= '<section class="row"><h2 class="column_8 title textcenter">Bienvenue, vous pouvez vous s&#39;inscrire dans l&#39;événement suivant:</h2>';
        $html.='<h3>'.$this->data->name.'</h3>';
        $html.='<p>'.$this->data->description.'</p></section>';
        return $html;
    }

    protected function renderInfoParticipant(){
        $html= '<section class="row"><h2  class="column_8 title textcenter">Voici ton information</h2>
                <pre>Numero de dossard: '.$this->data->id.'
                Nom: '.$this->data->firstname.'
                Prenom: '.$this->data->name.'
                Email: '.$this->data->mail.'
                Date du naissance: '.$this->data->naissance.'</pre></section>';
        return $html;
    }

    protected function renderResultats(){
        $html= '<section class="row"><h2 class="column_8 title textcenter">Voici les résultats</h2></section>';
        return $html;
    }

    protected function renderNewEvent(){
        $html= '<section class="row">
                    <h2  class="column_8 title textcenter">Cr&eacute;er un &eacute;v&eacute;nement</h2>
                    <div>
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
                          <input class="column_8" type="text" name="discipline"/>
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
                      </div>
                     </section>';
        return $html;
    }

    protected function renderNewTrial(){
        $html= '<section class="row">
                    <h2 class="column_8 title textcenter">Ajouter une &eacute;preuve</h2>
                    <div>
                    <form method="post" action="'.$this->script_name.'/admin/addTrial/">
                      <div class="row">
                       <select name="event">';
       foreach ($this->data as $valeur){
            $html.='<option value="'.$valeur->id.'">'.$valeur->name.'</option>';
       }
        $html.='</select>
                        </div>
                        <div class="row">
                          <label for="name">Nom de l\'&eacute;preuve</label><br>
                          <input type="text" name="name"/>
                        </div>
                        <div class="row">
                               <label>Date</label><br>
                               <input type="date" name="date"/><br>
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
                    </form></div></section>';
        return $html;
    }
    protected function renderGestion(){
        $html= '<section class="row">
                        <h2  class="column_8 title textcenter">G&eacute;rer mon &eacute;v&eacute;nement</h2>
                        <div>
                        <form class="column_8" class="column_5 offset_1 milieu" method="post" action="'.$this->script_name.'/admin/editEvent/">
                             <input type ="hidden" name="id_event" value="'.$this->data->id.'"/>
                             <input type ="hidden" name="organiser" value="'.$this->data->id_organiser.'"/>
                            <div >
                              <label for="name">Nom</label><br>
                              <input type="text" name="name"  value="'.$this->data->name.'"/>
                            </div>
                            <div>
                              <label for="place">Lieu</label><br>
                              <input type="text" name="place"  value="'.$this->data->place.'"/>
                            </div>
                            <div >
                              <label for="discipline">Dicipline</label><br>
                              <input type="text" name="discipline"  value="'.$this->data->dicipline.'"/>
                            </div>
                            <div >
                               <label>Description</label><br>
                               <textarea name="descritpion" row="10" cols="50">'.$this->data->description.'</textarea>
                             </div>
                             <div >
                               <label>Date du debut</label><br>
                               <input type="date" name="start_date"  value="'.$this->data->start_date.'"/><br>
                             </div>
                             <div>
                               <label>Date du fin</label><br>
                               <input type="date" name="end_date"  value="'.$this->data->end_date.'"/><br>
                             </div>';
                        if($this->data->status==0){
                            $html.='
                                     <div class="row">
                                        <label>Status:</label><br>
                                        <select name="status">
                                         <option value="0">Non Publié</option>
                                         <option value="1">Publié</option>
                                        </select>
                                     </div>';
                        }else{
                            $html.='
                                         <div class="row">
                                            <label>Status:</label><br>
                                            <select name="status">
                                             <option value="1">Publié</option>
                                             <option value="0">Non Publié</option>
                                            </select>
                                         </div>';
                        }
                        if($this->data->inscription==0){
                            $html.='
                             <div class="row">
                                <label>Inscription:</label><br>
                                <select name="inscription">
                                 <option value="0">Fermées</option>
                                 <option value="1">Ouvertes</option>
                                </select>
                             </div>';
                        }else{
                            $html.='
                             <div class="row">
                                <label>Inscriptions</label><br>
                                <select name="inscription">
                                 <option value="1">Ouvertes</option>
                                 <option value="0">Fermées</option>
                                </select>
                             </div>';
                        }
                        $html.='
                             <div class="row">
                              <input type="submit" neme="valider" value="Valider"/> 
                              <input type="reset" name="annuler" value="Annuler"/>
                             </div>
                        </form>
                        </div>
                             
                        <aside id="menu" class="column_2">
                           <p>Liste des participants</p>  
                           <form action="'.$this->script_name.'/admin/addFile/" method="post" enctype="multipart/form-data">
                             Importar Archivo : <input type="file" name="sel_file" size="20">
                             <input type="submit" name="submit" value="submit">
                           </form>
                           <p>Nombre de participants par épuvre</p>
                          <form action="'.$this->script_name.'/admin/addFile/" method="post" enctype="multipart/form-data">
                                 <select name="inscription">
                                     <option value="1">Ouvertes</option>
                                     <option value="0">Fermées</option>
                                  </select>
                             <input type="submit" name="submit" value="submit">
                           </form>
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

        case 'description':
            $main = $this->renderDescription();
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

        case 'newTrial':
            $main = $this->renderNewTrial();
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
        $style_file4 = $this->app_root.'/html/Librairie/css/style.css';

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

//<footer class="row foot"> ${footer} </footer>
