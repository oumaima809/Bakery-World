
<?php

$host = 'localhost';
$dbname = 'bakery';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      
        // Récupérer les données du formulaire
        $email = $_POST['email'];
        $password =$_POST['password']; // Crypter le mot de passe avec MD5
       
        // Vérifier que l'adresse email et le mot de passe ne sont pas vides
        if (!empty($email) && !empty($password)) {
            // Vérifier l'existence du client dans la base de données
            $statement = $pdo->prepare("SELECT * FROM client WHERE email = ?");
            $statement->execute([$email]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if($user){
              
              if(password_verify($password,$user['password'])){
               session_start();
              $_SESSION['email'] = $email; // Enregistrer l'adresse email dans la session
              $_SESSION['nom'] = $user['nom'];
              $_SESSION['prenom'] = $user['prenom'] ;
              $_SESSION['phone'] = $user['phone'] ;
              $_SESSION['id'] = $user['id'] ;


                header("Location: ../Accueil/Accueil.php");
                exit;
              }
              else{
                echo '<p class="erreurCon"> Identifiants invalides. </p>';
              }
            }
            else {
            echo '<p class="erreurCon"> Veuillez remplir tous les champs du formulaire.</p>';
        }
    }
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../Inscription/Css/styleInscri.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="stylesheet" href="../Navbar/navbar.css" />
    <link rel="stylesheet" href="../Footer/footer.css" />
    <link rel="stylesheet" href="Css/styleConnexion.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />

    <title>Document</title>
  </head>
  <body>
    <?php include '../Navbar/navbar.php'?>
    <div class="premiere-section">
      <div class="conteneur">
        <div class="contenu-form">
          <h3>Backery World</h3>
          <br />
          <p>
            Backery World est une pâtisserie passionnée par l'art de la
            pâtisserie. Nous sommes fiers de créer des produits de qualité
            supérieure, avec les meilleurs ingrédients pour garantir une
            expérience de dégustation inoubliable.
          </p>
          <a href="../A propos/propos.pho">savoir plus</a>
        </div>
        <div class="login">
          <h2>Connexion</h2>
          <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <span class="obligatoire">*</span>
            <input
              required
              pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})"
              type="email"
              name="email"
              id=""
              autocomplete="off"
              placeholder="exemple@exemple.com"
            />
            <span class="obligatoire">*</span>
            <input
              type="password"
              name="password"
              id=""
              placeholder="Mot de passe"
              autocomplete="off"
              required
            />
            <input class="btn-submit" type="submit" value="Se connecter" />
          
            <a href="../Inscription/inscription.php">Pas de compte ? créer un compte</a>
          </form>
        </div>
      </div>
    </div>


  

 









   <?php include '../Footer/footer.php' ?>
  </body>
</html>
