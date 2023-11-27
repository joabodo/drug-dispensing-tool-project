<?php
require_once("connect.php");

$generic_name = $_POST['generic_name'];
$brand_name = $_POST['brand_name'];
$dosage_form = $_POST['dosage_form'];
$route_of_administration = $_POST['route_of_administration'];
$side_effects = $_POST['side_effects'];
$expiry_date = $_POST['expiry_date'];
$category = $_POST['category'];

// Handling image upload
$targetDirectory = "uploads/"; // Create a folder named 'uploads' to store the images
$targetFile = $targetDirectory . basename($_FILES["drug_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the image file is a real image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["drug_image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["drug_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["drug_image"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["drug_image"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Insert drug details into the database, storing the image path in the 'Image' field
$sql = "INSERT INTO drug (generic_name, brand_name, dosage_form, route_of_administration, side_effects, expiry_date, category, Image) 
        VALUES ('$generic_name', '$brand_name', '$dosage_form', '$route_of_administration', '$side_effects', '$expiry_date', '$category', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: display_drugs.php?success_message=Drug added successfully');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
