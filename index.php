<?php
session_start();
if (!$_SESSION['mdp']) {
    header('Location: connexion.php');
}
echo $_SESSION['pseudo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <a href="deconnexion.php">
        <button>Se déconnecter</button>
    </a>
</body>

</html>