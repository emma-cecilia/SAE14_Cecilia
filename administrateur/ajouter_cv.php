<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
	$image      = $_FILES["image"]["name"];
    $imagePath          = '../images/'. basename($image);
    $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);

    // Gestion du téléchargement du CV
    $cv_Filename = $_FILES['cv_Filename']['name'];
    $cvTempName = $_FILES['cv_Filename']['tmp_name'];
    $cvFilePath = 'docs/' . $cv_Filename; 
	

    move_uploaded_file($cvTempName, $cvFilePath);

    $query = $conn->prepare("INSERT INTO cv (nom, email, experience, image, cv_Filename) VALUES (:nom, :email, :experience, :image, :cv_Filename)");

    $query->bindParam(':nom', $nom);
    $query->bindParam(':email', $email);
    $query->bindParam(':experience', $experience);
	$query->bindParam(':image', $image);
    $query->bindParam(':cv_Filename', $cv_Filename);

    if ($query->execute()) {
        echo "CV ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout du CV";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un CV</title>
</head>
<body>

<h2>Ajouter un CV</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="experience">Expérience :</label>
    <textarea id="experience" name="experience" rows="4" required></textarea><br>
	
	<label for="image">Image :</label>
    <input type="file" id="image" name="image" required><br>
	
    <label for="cv_Filename">CV (PDF, Word, etc.) :</label>
    <input type="file" id="cv" name="cv_Filename" accept=".pdf, .doc, .docx" required><br>

    <input type="submit" value="Ajouter">
</form>

<br>
<a href="index.php">Retour à la liste des CV</a>

</body>
</html>