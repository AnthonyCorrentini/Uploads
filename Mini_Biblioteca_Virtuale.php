<!DOCTYPE html>
<html>
    <head>
        <h1>Mini Biblioteca Virtuale</h1>
        <body>
            <form action = "Uploads.php" method = "post" enctype = "multipart/form*data">
                Seleziona file PDF:
                <input type = "file" name = "filePDF" id = "filePDF">
                <input type = "submit" value = "CARICA" name = "submit">
            </form>
            <?php
                $uploadDir = __DIR__. '\Uploads';

                foreach ($_FILES as files) {
                    if (UPLOAD_ERR_OK === $file['error']){
                        $fileName = basename($file['name']);
                        move_uploaded_file(
                            $file['tmp_name'],
                            $uploadDir.DIRECTORY_SEPARATOR.$fileName
                        );
                    }
                }
            ?>
        </body>
    </head>
</html>
