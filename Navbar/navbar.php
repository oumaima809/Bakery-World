<?php 
   session_start();
  

   $authenticated = false;
   if(isset($_SESSION['email'])){
    $authenticated=true;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <div class="div-compte" id="compte">
          <span class="first-span">Besoin d'aide ? </span>
          <span class="second-span"> Appeler 72313478</span>
          <?php 
            if(!$authenticated){
            echo '
                <a class="inscription" href="../Inscription/inscription.php">
                    <span>Inscription</span>
                </a>
                <a class="connexion" href="../Connexion/connexion.php">
                  <span>Connexion</span>
                </a>
              ';
            }
            else {
               echo '
               <div class="user" id="userDropdown">
                  <span><p class="client">'.$_SESSION["prenom"].'</p></span>
                  <span><i class="fa-solid fa-caret-down"></i></span>
               </div>
               <div class="dropdown" id="dropdownContent"> 
                     
                     <p class="profile"><i class="fa-solid fa-user"></i>Profile</p>
                     <a class="logout" href="../Logout/logout.php">
                       <span><i class="fa-solid fa-right-from-bracket"></i>Logout</span>
                    </a>
                    
                </div>
               
            ';
            }
           
            

          
          
          
          
          ?>
          
          
        </div>
        <nav>
          <div class="logo">
            <p>Bakery World</p>
          </div>
          <ul>
            <li><a href="../Accueil/Accueil.php">Accueil</a></li>
            <li>
              <a href="" class="service">Catégories</a>
              <ul>
                  <li><a href="../Categorie/categorieDetail.php?nom=macaron">Macarons</a></li>
                  <li><a href="../Categorie/categorieDetail.php?nom=cupcake">Cupcakes</a></li>
                  <li><a href="../Categorie/categorieDetail.php?nom=croissant">Croissants</a></li>
                  <li><a href="../Categorie/categorieDetail.php?nom=chocolat">Chocolats</a></li>
              </ul>
            </li>
            <li><a href="../A propos/propos.php">A propos</a></li>

            <li>
              <a href="../Favoris/favoris.php"
                ><i class="fas fa-heart"></i
              ></a>
            </li>
            <li class="cart">
              <a href="../Panier/panier.php"
                ><i class="fas fa-shopping-cart"></i><span>0</span>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <script src="../Navbar/navbar.js"></script>
</body>

</html>