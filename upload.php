<?php
$uploadDir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_pic'])) {
        $fileName = $_FILES['profile_pic']['name'];
        $fileTmp = $_FILES['profile_pic']['tmp_name'];
        $targetFile = $uploadDir . basename($fileName);

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "File uploaded: <a href='$targetFile'>$fileName</a>";
            } else {
                echo "Error";
            }
        } else {
            echo "Error Extension";
        }
    } else {
        echo "No File was uploaded.";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .form-container input[type="file"] {
            margin-bottom: 15px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Upload Profile Picture</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="profile_pic">Choose a profile picture:</label><br>
            <input type="file" name="profile_pic" id="profile_pic" required><br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
