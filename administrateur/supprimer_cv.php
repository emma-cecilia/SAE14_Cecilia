<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("DELETE FROM cv WHERE id=:id");
    $query->bindParam(':id', $id);

    if ($query->execute()) {
        echo "CV supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression du CV";
    }
}

header("Location: index.php");
exit();
?>