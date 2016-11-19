<?php

namespace sportapp\view;

class SportnetView  extends AbstractView{

    public function __construct($data){
        parent::__construct($data);
    }

    protected function renderMyEvents(){
        $html='<h2 class="row column_5 offset_1 title">Bienvenue '.$_SESSION['user_login'].', voici tous vos événements</h2>
        <table>
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
            </table>';
        return $html;
    }

    protected function renderAccueil(){
        $html= ' <section class="column_4">
                        <h2 class="row column_4 title">Bienvenue</h2>
                        <p>Avec Sportnet, cr&eacute;ez  tous vos &eacute;v&eacute;nements sportifs</p>
                  </section>
                  <section class="row">
                          <div>
                            <img src="'.$this->app_root.'/html/Librairie/images/sport.jpg">
                          </div>
                
                          <div>
                            <img src="'.$this->app_root.'/html/Librairie/images/sport2.jpg">
                          </div>
                
                  </section>';
        return $html;
    }

    protected function renderEvents(){
        $html= '<h2 class="row column_4 title">Bienvenue, voici tous nos événements et leur description</h2>
                 <table border="1px" >
                <thead>
                    <tr>
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
            </table>';
        $html.= '<li><a href="'.$this->script_name.'/sportnet/resultats/">Résultats</a></li>';
        return $html;
    }

    protected function renderInscription(){
        $cont=0;
        $html= '<h2 class="row column_4 title">Bienvenue, vous pouvez vous s&#39;inscrire dans l&#39;événement:</h2>';
            $html.= '<section>
                    <h2>S&#39;inscrire au événement</h2>
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
                  </section>';
        return $html;
    }

    protected function renderDescription(){
        $html= '<h2 class="row column_4 title">Bienvenue, vous pouvez vous s&#39;inscrire dans l&#39;événement suivant:</h2>';
        $html.='<h3>'.$this->data->name.'</h3>';
        $html.='<p>'.$this->data->description.'</p>';
        return $html;
    }

    protected function renderInfoParticipant(){
        $html= '<h2 class="row column_4 title">Voici ton information</h2>
                <pre>Numero de dossard: '.$this->data->id.'
                Nom: '.$this->data->firstname.'
                Prenom: '.$this->data->name.'
                Email: '.$this->data->mail.'
                Date du naissance: '.$this->data->naissance.'</pre>';
        return $html;
    }

    protected function renderResultats(){
        $html= '<h2 class="row column_4 title">Voici les résultats</h2>';
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

    protected function renderNewTrial(){
        $html= '<section class="column_5 offset_1 milieu">
                    <h2 class="row column_4 title">Ajouter une &eacute;preuve</h2>
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
                    </form>';
        return $html;
    }
    protected function renderGestion(){
        $html= '<section class="row">
                        <h2 class="row column_4 title">G&eacute;rer mon &eacute;v&eacute;nement</h2>
                        <form class="column_5 offset_1 milieu" method="post" action="'.$this->script_name.'/admin/editEvent/">
                             <input type ="hidden" name="id_event" value="'.$this->data->id.'"/>
                             <input type ="hidden" name="organiser" value="'.$this->data->id_organiser.'"/>
                            <div class="row">
                              <label for="name">Nom</label><br>
                              <input type="text" name="name"  value="'.$this->data->name.'"/>
                            </div>
                            <div class="row">
                              <label for="place">Lieu</label><br>
                              <input type="text" name="place"  value="'.$this->data->place.'"/>
                            </div>
                            <div class="row">
                              <label for="discipline">Dicipline</label><br>
                              <input type="text" name="discipline"  value="'.$this->data->dicipline.'"/>
                            </div>
                            <div class="row">
                               <label>Description</label><br>
                               <textarea name="descritpion" row="10" cols="50">'.$this->data->description.'</textarea>
                             </div>
                             <div class="row">
                               <label>Date du debut</label><br>
                               <input type="date" name="start_date"  value="'.$this->data->start_date.'"/><br>
                             </div>
                             <div class="row">
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
        
        <header class="row"> ${header}  <nav id="menu" class=""> ${menu} </nav></header>
        
        <section>

            <article class="">  ${main} </article>

        </section>

        <footer class="row foot"> ${footer} </footer>

    </body>
</html>
EOT;

    echo $html;

    }


}


