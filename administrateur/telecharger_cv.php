<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("SELECT cv_Filename FROM cv WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $cv = $query->fetch(PDO::FETCH_ASSOC);
	
	$cv_Filename = $_FILES['cv_Filename']['name'];
    $cvFilePath = 'docs/' . $cv_Filename;

    if (file_exists($cvFilePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($cvFilePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($cvFilePath));
        readfile($cvFilePath);
        exit;
    } else {
        echo "Le fichier CV n'existe pas.";
    }
} else {
    // Rediriger vers la liste des CV si l'ID n'est pas spécifié
    header("Location: index.php");
    exit();
}