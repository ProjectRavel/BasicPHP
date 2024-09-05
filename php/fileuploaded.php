<?php

if (isset($_POST['submit'])) {
    $allowed_ext = array('png', 'jpg', 'jpeg', 'gif', 'svg');
    if (!empty($_FILES['upload']['name'])) {
        $filename = $_FILES['upload']['name'];
        $filesize = $_FILES['upload']['size'];
        $filetmp = $_FILES['upload']['tmp_name'];

        // Perbaiki path untuk menggunakan __DIR__ yang mengacu pada direktori script saat ini
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($filename);
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Pastikan direktori uploads ada, jika tidak maka buat
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (in_array($file_ext, $allowed_ext)) {
            if ($filesize <= 20000000) {
                if (move_uploaded_file($filetmp, $target_file)) {
                    $message = '<p style="color:lime;">File uploaded successfully.</p>';
                } else {
                    $message = '<p style="color:red;">Failed to move uploaded file.</p>';
                }
            } else {
                $message = '<p style="color:red;">File is too large.</p>';
            }
        } else {
            $message = '<p style="color:red;">Invalid file type.</p>';
        }
    } else {
        $message = '<p style="color:red;">Please choose a file to upload.</p>';
    }
} else {
    $message = '<p>Test</p>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <?php
    if (isset($_FILES['upload']['name'])) {
        echo $message;
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="upload">
        <br />
        <input type="submit" name="submit">
    </form>
</body>

</html>