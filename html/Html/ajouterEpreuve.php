<!doctype html>
<html>
  <head>    
    <meta charset="utf-8">
    <title>Ajouter &eacute;preuve</title> 
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
        <h2 class="row column_4 title">Ajouter une &eacute;preuve</h2>
        <form  method="post" action="">
         <div class="row"><label for="name">Nom de l'&eacute;preuve</label><input type="text" name="name"/></div>
          <div class="row"><label for="place">Lieu</label><input type="text" name="place"/></div>
          <div class="row"><label>description</label> <textarea name="descritpion" row="10" cols="50"></textarea></div>
           <div class="row"><label>Tarif</label> <input type="number" id="price" name="price"/>euros</div>
         <div class="row"><input type="submit" value="créer" name="creer"/> <input type="reset" value="annuler" name="annuler"/></div>
        </form>
             
      </section>
         

    </article>
   <footer class="row foot">
        <div class="column_2">Tous droits r&eacute;serv&eacute;s</div>
        <div class="column_2">A propos</div>
        <div class="column_2">Nous contacter</div>
    </footer>
   

   </body>


<html>