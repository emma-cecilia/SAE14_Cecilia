<?php

session_start();

//require('database.php');// .class.php pour bien identifier les class


// Vérification des données
if(isset($_POST['submit'])){
    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);

    // Vérification du nom d'utilisateur et du mot de passe
    if ($login == "admin_emma" && $password == "adminpass_emma") {
        // Informations correctes, rediriger vers la page d'administration
        header("Location: administrateur/index.php");
        exit();
    } else {
        // Informations incorrectes, rediriger vers la page de connexion avec un message d'erreur
        header("Location: connexion.php?error=1");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="f">
    <head>
        <title>CV de Cécilia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap-icons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style2.css">
		<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	
    </head>
    <body>
			<br><br><br><br>
			<p><a href="index.html" class="text-light fs-6">Retour Accueil</a></p>
			<center>
			<!-- Début du formulaire de connexion -->
				<div class="form-bg">
					<div class="container">
						<div class="row">
							<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
								<div class="form-container">
									<form class="form-horizontal" action="connexion.php" method="post">
										<h3 class="title">Formulaire de connexion</h3>
										<div class="form-group">
											<span class="input-icon"><i class="fa fa-user"></i></span>
											<input class="form-control" type="login" name="login" placeholder="Nom_admin">
										</div>
										<div class="form-group">
											<span class="input-icon"><i class="fa fa-lock"></i></span>
											<input class="form-control" type="password" name="password" placeholder="Mdp_admin">
										</div>
										<button type="submit" class="btn btn-danger" name="submit">Connexion</button>									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin du formulaire de connexion -->
			</center>
    </body>
</html>