<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;', 'laurent', 'h9xt2ya1');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp) VALUES (?, ?)');
        $insertUser->execute(array($pseudo, $mdp));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if ($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            
        }
        header('Location: index.php');

    } else {
        echo "Veuillez compléter tous les champs...";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br />
        <input type="password" name="mdp" autocomplete="off">
        <br /><br />
        <input type="submit" name="envoi">
    </form>
</body>

</html>