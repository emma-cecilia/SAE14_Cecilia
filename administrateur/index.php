<?php
include 'config.php';

$query = $conn->query("SELECT id, nom, email, experience, image, cv_filename FROM cv");
$cvList = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Liste des CV</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<a href="../index.html">Retour à l'accueil</a>
	<center><h2>Liste des CV</h2></center>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Expérience</th>
			<th>Image</th>
			<th>Cv_filename</th>
			<th>Actions</th>
		</tr>

    <?php foreach ($cvList as $cv): ?>
        <tr>
            <td><?= $cv['id'] ?></td>
            <td><?= $cv['nom'] ?></td>
            <td><?= $cv['email'] ?></td>
            <td><?= $cv['experience'] ?></td>
			<td><?= $cv['image'] ?></td>
			<td><?= $cv['cv_filename'] ?></td>
            <td>
				<a href="voir_cv.php?id=<?= $cv['id'] ?>">Voir</a> |
                <a href="modifier_cv.php?id=<?= $cv['id'] ?>">Modifier</a> |
                <a href="supprimer_cv.php?id=<?= $cv['id'] ?>">Supprimer</a> | 
				<a href="telecharger_cv.php?id=<?= $cv['id'] ?>">Télécharger le CV</a> |
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="ajouter_cv.php">Ajouter un CV</a>

</body>
</html>