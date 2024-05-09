<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("SELECT nom, email, experience, image, cv_Filename FROM cv WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $cv = $query->fetch(PDO::FETCH_ASSOC);
} else {
    // Rediriger vers la liste des CV si l'ID n'est pas spécifié
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser un CV</title>
</head>
<body>

<h2>CV de <?= $cv['nom'] ?></h2>

<p><strong>Email :</strong> <?= $cv['email'] ?></p>
<p><strong>Expérience :</strong></p>
<p><?= nl2br($cv['experience']) ?></p>
<p><strong>Image :</strong> <?= $cv['image'] ?></p>
    
<br>

<?php if ($cv['cv_Filename']): ?>
    <a href="telecharger_cv.php?id=<?= $id ?>">Télécharger le CV</a><br>
<?php else: ?>
    <p>Aucun CV disponible pour le téléchargement.</p>
<?php endif; ?>

<br>
<a href="index.php">Retour à la liste des CV</a>

</body>
</html>