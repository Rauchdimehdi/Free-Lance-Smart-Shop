<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Tableau de bord</a>
              <a href="infoproduct" class="breadcrumb">Produits</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container">
     <div class="row">
       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/add.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="addproduct">Ajouter des produits sur le site</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/stats.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="stats"> Statistiques</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/edit.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="editproduct">Commandes</a>
           </div>
         </div>
       </div>
     </div>
   </div>


 <?php require 'includes/footer.php'; ?>
