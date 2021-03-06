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
        <table class="table column_6 offset_1">
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
                          <input class="column_6 offset_1" type="text" name="firstname" placeholder="Nom..."/>
                       </div>
                       <div class="row">
                          <input class="column_6 offset_1" type="text" name="name" placeholder="Prenom..."/>
                       </div>
                       <div class="row">
                          <input class="column_6 offset_1" type="email" name="email" placeholder="Email..."/>
                       </div>
                       <div class="row">
                          <input class="column_6 offset_1"  type="date" name="naissance" placeholder="Date de naissance..."/>
                       </div>
                       <div class="row">';

                   foreach ($this->data as $value){
                       $cont+=1;
                        $html.='<input class="offset_1"  type="checkbox" name="trial'.$cont.'" value="'.$value->id.'">'.$value->name.'';
                    }

                    $html.='</div>
                        <input type ="hidden" name="cont" value="'.$cont.'"/>
                       <div class="row">
                          <input class="column_3 offset_3 btn" type="submit" value="Valider"/>
                          </div>
                           <div class="row">
                          <input class="column_3 offset_3 btn"  type="reset" value="Annuler"/>
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
                    <form class="column_8" method = "post" action ="'.$this->script_name.'/admin/addEvent/">
                        <div class="row">
                          <input  class="column_6 offset_1" type="text" name="name"  placeholder="Nom..."/>
                        </div>
                        <div class="row">
                          <input class="column_6 offset_1" type="text" name="palce"  placeholder="Lieu..."/>
                        </div>
                        <div class="row">
                          <input  class="column_6 offset_1" type="text" name="discipline"  placeholder="Dicipline..."/>
                        </div>
                        <div class="row">
                          <input  class="column_6 offset_1" type="date" name="star_date"  placeholder="Date du debut..."/>
                        </div>
                        <div class="row">
                          <input  class="column_6 offset_1" type="date" name="end_date" placeholder="Date de fin..."/>
                        </div>
                        <div class="row">
                          <textarea  class="column_6 offset_1" name="descritpion" row="100" cols="50"  placeholder="Description..."></textarea>
                        </div>
                        <div class="row">
                          <input  class="column_3 offset_1 btn" type="submit" name="newEvent" value="Créer"/> 
                          <input  class="column_3 btn" type="reset" name="annuler" value="Annuler"/>
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
                       <select class="column_6 offset_1" name="event">';
       foreach ($this->data as $valeur){
            $html.='<option value="'.$valeur->id.'">'.$valeur->name.'</option>';
       }
        $html.='</select>
                        </div>
                        <div class="row">
                          <input class="column_6 offset_1" type="text" name="name" placeholder="Nom un épreuve..."/>
                        </div>
                        <div class="row">
                               <input class="column_6 offset_1" type="date" name="date" placeholder="Date..."/><br>
                             </div>
                        <div class="row">
                           <input class="column_6 offset_1" type="number" id="price" name="price" placeholder="Euros"/>
                        </div>
                        <div class="row">
                           <textarea class="column_6 offset_1" name="descritpion" row="10" cols="50" placeholder="Description..."></textarea><br>
                        </div>
                        <div class="row">
                          <input class="column_3 offset_1 btn" type="submit" value="creer"/>
                          <input class="column_3 btn " type="reset" value="annuler"/>
                        </div>
                    </form></div></section>';
        return $html;
    }
    protected function renderGestion(){
        $html= '<section class="row">
                        <h2  class="column_8 title textcenter">G&eacute;rer mon &eacute;v&eacute;nement</h2>
                        <div class="row">
                        <form  class="column_6 offset_1" method="post" action="'.$this->script_name.'/admin/editEvent/">';
        if($this->data->status==0){
            $html.='
                                     <div class="row">
                                        <select class="column_7" name="status">
                                         <option value="0">Status</option>
                                         <option value="0">Non Publié</option>
                                         <option value="1">Publié</option>
                                        </select>
                                     </div>';
        }else{
            $html.='
                                         <div class="row">
                                            <select class="column_7" name="status">
                                             <option value="0">Status</option>
                                             <option value="1">Publié</option>
                                             <option value="0">Non Publié</option>
                                            </select>
                                         </div>';
        }
        if($this->data->inscription==0){
            $html.='
                             <div class="row">
                                <select class="column_7" name="inscription">
                                 <option value="0">Inscriptions</option>
                                 <option value="0">Fermées</option>
                                 <option value="1">Ouvertes</option>
                                </select>
                             </div>';
        }else{
            $html.='
                             <div class="row">
                                <select class="column_7" name="inscription">
                                  <option value="0">Inscriptions</option>
                                 <option value="1">Ouvertes</option>
                                 <option value="0">Fermées</option>
                                </select>
                             </div>';
        }
            $html.='<input type ="hidden" name="id_event" value="'.$this->data->id.'"/>
                             <input type ="hidden" name="organiser" value="'.$this->data->id_organiser.'"/>
                            <div class="row">
                              <input  class="column_7" type="text" name="name"  value="'.$this->data->name.'"/>
                            </div>
                            <div class="row">
                              <input class="column_7" type="text" name="place"  value="'.$this->data->place.'"/>
                            </div>
                            <div class="row">
                              <input class="column_7" type="text" name="discipline"  value="'.$this->data->dicipline.'"/>
                            </div>
                             <div class="row">
                               <input class="column_7" type="date" name="start_date"  value="'.$this->data->start_date.'"/><br>
                             </div>
                             <div class="row">
                               <input class="column_7" type="date" name="end_date"  value="'.$this->data->end_date.'"/><br>
                             </div>
                             <div >
                               <textarea class="column_7 margin" name="descritpion" row="10" cols="50">'.$this->data->description.'</textarea>
                             </div> ';
                        $html.='
                             <div class="row">
                              <input class="column_7 btn" type="submit" neme="valider" value="Valider"/> 
                               </div>
                              <div class="row">
                              <input class="column_7 btn" type="reset" name="annuler" value="Annuler"/>
                             </div>
                        </form>
                        </div>
                             
                        <div class="row">
                         
                           <form   class="column_8 offset_1" action="'.$this->script_name.'/admin/addFile/" method="post" enctype="multipart/form-data">
                             Importar Archivo : <input type="file" name="sel_file" size="20">
                             <input  class="column_8" type="submit" name="submit" value="submit">
                           </form>
                        </div>
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
