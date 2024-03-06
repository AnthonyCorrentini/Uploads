<!DOCTYPE html>
<html>
<head>
    <title>Lista Libri PDF</title>
</head>
<body>
    <h2>Lista dei Libri PDF Caricati</h2>
    <table>
        <tr>
            <th>Nome File</th>
            <th>Azioni</th>
        </tr>
        <?php
        $files = scandir("/Uploads"); // Cartella dove verranno caricati i file
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo "<tr><td>$file</td><td><a href='Uploads/$file'download>Download</a></td></tr>";
            }
        }
        ?>
    </table>
    <br>
    <a href="Upload_form.php">Carica un altro file</a>
</body>
</html>

<?php
$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);
$uploadOk = 1;
$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifica se il file è un vero PDF
if(isset($_POST["submit"])) {
    if($pdfFileType != "pdf") {
        echo "Siamo spiacenti, solo file PDF sono consentiti.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Il tuo file non è stato caricato.";
} else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
        echo "Il file ". htmlspecialchars( basename( $_FILES["pdfFile"]["name"])). " è stato caricato.";
    } else {
        echo "Siamo spiacenti, si è verificato un errore durante il caricamento del file.";
    }
}
?>
