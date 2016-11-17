<!doctype html>
<html>
  <head>    
    <meta charset="utf-8">
    <title>Inscritption Participant</title> 
    <link rel="stylesheet" type="text/css" href="../Librairie/css/library.css"/>
     <link rel="stylesheet" type="text/css" href="../Librairie/css/theme.css">
    
  </head>

   <body class="grid_float"> 
    <header id="head" class="row">
      <h1 id="logo" class="textAlignleft column_3">Sportnet</h1>
      <ul class="navbar column_4 nav">
        <li><a>Accueil</a></li>
        <li><a>Ev&eacute;nement</a></li>
        <li><a>Contact</a></li>
      </ul>
      <a  class="column_1" href="">Login</a>
    </header>
      
    <article>
      <section class="column_5 offset_1 milieu">
        <h2 class="row column_4 title">S'inscrire à l'événement</h2>
        <form  class="center column_4" method="post" action="">
          <div class="row"><label for="name">Nom</label><input type="text" name="name"/></div>
          <div class="row"><label for="firstname">Prénom</label><input type="text" name="firstname"/></div>
          <label for="email">email</label><input type="email" name="email"/>
           <div class="row"><label for="birthday">Date de naissance</label><input type="date" name="birthday"/></div>
          <div class="row"><label>Tarif</label> <input type="number" id="price" name="price"/>euros</div>
           
          <div class="row offset_2 validate"><input type="submit" value="valider"/></div>
        </form>
      </section>
      <aside>
        <a href="">Retour à la page d"accueil</a>
      </aside>

    </article>

    <footer class="row foot">
        <div class="column_2">Tous droits r&eacute;serv&eacute;s</div>
        <div class="column_2">A propos</div>
        <div class="column_2">Nous contacter</div>
    </footer>
   

   </body>


<html>