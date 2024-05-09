<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
	
	
    $query = $conn->prepare("UPDATE cv SET nom=:nom, email=:email, experience=:experience WHERE id=:id");

    $query->bindParam(':id', $id);
    $query->bindParam(':nom', $nom);
    $query->bindParam(':email', $email);
    $query->bindParam(':experience', $experience);

    if ($query->execute()) {
        echo "CV modifié avec succès";
    } else {
        echo "Erreur lors de la modification du CV";
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("SELECT id, nom, email, experience, cv_Filename FROM cv WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $cv = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un CV</title>
</head>
<body>

<h2>Modifier un CV</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $cv['id'];; ?>">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo $cv['nom'];; ?>" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?php echo $cv['email']; ?>" required><br>

    <label for="experience">Expérience :</label>
    <textarea id="experience" name="experience" rows="4" required><?php echo $cv['experience']; ?></textarea><br>

	<label for="email">Cv_filename :</label>
    <input type="file" id="cv_filename" name="cv_filename" value="<?php echo $cv['cv_Filename']; ?>" required><br>

    <input type="submit" value="Modifier">
</form>

<br>
<a href="index.php">Retour à la liste des CV</a>

</body>
</html>