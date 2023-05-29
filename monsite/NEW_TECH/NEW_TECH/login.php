<?php
$dbhost = 'localhost';
$dbuser = 'guillaume';
$dbpass = 'orange';
$dbname = 'connexion';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
?>
<!--- Vérification des informations d'identification -->
<?php
session_start();

if (isset($_POST['username'])) {
	$_SESSION['username'] = $_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        // Si l'utilisateur a soumis le formulaire et que les informations d'identification sont correctes, stockons son nom d'utilisateur en session
        $_SESSION['username'] = $username;
        // Création d'un jeton d'authentification unique pour l'utilisateur
        $auth_token = bin2hex(random_bytes(16));
        // Stockage du jeton d'authentification dans la base de données
        $query = "UPDATE users SET auth_token='$auth_token' WHERE username='$username'";
        mysqli_query($conn, $query);
        // Stockage du jeton d'authentification dans un cookie pour une durée de 1 heure
        setcookie('auth_token', $auth_token, time()+3600);
    } else {
        // Si les informations d'identification sont incorrectes, affichons un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

if (isset($_SESSION['username'])) {
    // Si l'utilisateur est déjà connecté, affichons un message de bienvenue et un bouton de déconnexion
    echo "Bonjour " . $_SESSION['username'] . ", vous êtes déjà connecté.";
    echo "<br><br><form method='POST' action=''><input type='submit' name='logout' value='Déconnexion'></form>";
    
    // Si l'utilisateur a cliqué sur le bouton de déconnexion, supprimons sa session et son jeton d'authentification, et redirigeons-le vers la page de login
    if (isset($_POST['logout'])) {
        header("Location: logout.php");
    }
    
} else {
    // Sinon, affichons le formulaire de connexion
    ?>
	<!DOCTYPE html>
  <html>
  <head>
    <title>Login Page</title>
	<link rel="stylesheet" href="static/style.css">
  </head>
  <body>
    <h2>Login</h2>
    <form method="POST" action="">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br><br>
      <input type="submit" value="Login">
    </form>
  </body>
  </html>
  <?php
}
?>

