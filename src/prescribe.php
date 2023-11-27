<?php
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe Page</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <?php

    $user = [];
    $feedbackMessage = ""; // Initialize an empty feedback message

    if (isset($_GET['drug_id'])  && isset($_GET['patient_id'])) {

        $patient_sql = "SELECT * FROM patient WHERE patient_id = " . $_GET['patient_id'];
        $patient_result = mysqli_query($conn, $patient_sql);
        $drug_sql = "SELECT * FROM drug WHERE drug_id = " . $_GET['drug_id'];
        $drug_result = mysqli_query($conn, $drug_sql);

        if (isset($patient_result) && isset($drug_result)) {
            // Check if any rows were returned
            if ((mysqli_num_rows($patient_result) > 0) && (mysqli_num_rows($drug_result) > 0)) {
                // Get through the rows and do something with the data
                $patient_row = mysqli_fetch_assoc($patient_result);
                $drug_row = mysqli_fetch_assoc($drug_result);

    ?>
                <div class="wrapper">
                    <form method="POST">
                        <h1>Prescribe Drug Here</h1>
                        <p class="input-field">
                            <label for="patient_id">Patient ID </label>
                            <input type="text" name="patient_id" id="patient_id" value="<?php echo $patient_row['patient_id']; ?>" readonly>
                        </p>
                        <p class="input-field">
                            <label for="username">Username </label>
                            <input type="text" name="username" id="username" value="<?php echo $patient_row['username']; ?>" readonly>
                        </p>
                        <p class="input-field">
                            <label for="drug_id">Drug ID</label>
                            <input type="text" name="drug_id" id="drug_id" value="<?php echo $drug_row['drug_id']; ?>" readonly>
                        </p>
                        <p class="input-field">
                            <label for="phone number">Drug Name</label>
                            <input type="text" name="phone" id="phone" value="<?php echo $drug_row['generic_name']; ?>" readonly>
                        </p>
                        <p class="input-field">
                            <label for="dosage_amount_gms">Amount in Grams </label>
                            <input type="text" name="dosage_amount_gms" id="id">
                        </p>

                        <p class="input-field">
                            <label for="price">Price </label>
                            <input type="text" name="price" id="price">
                        </p>

                        <p>
                            <input class="submit-btn" type="submit" name="submit" id="submit" value="Prescribe Drug">
                        </p>
                    </form>
                </div>
    <?php

                if (isset($_POST["submit"])) {
                    print_r($_POST);
                    $prescribe_sql = "INSERT INTO prescriptions (patient_id, drug_id, dosage_amount_gms, price) VALUES (" . $_POST['patient_id'] . ", " . $_POST['drug_id'] . ", " . $_POST['dosage_amount_gms'] . ", " . $_POST['price'] . ")";

                    $res = mysqli_query($conn, $prescribe_sql);

                    if ($res) {
                        $feedbackMessage = "Records Added Successfully";
                        header('Location: doctor.php?success_message=' . urlencode($feedbackMessage));
                    } else {
                        $feedbackMessage = "Error adding records. Please try again.";
                    }
                }
            } else {
                $feedbackMessage = "No record found with the specified ID.";
            }
        } else {
            $feedbackMessage = "Query execution failed: " . mysqli_error($conn);
        }

        mysqli_free_result($patient_result); // Free the result set
        mysqli_free_result($drug_result);
    } else {
        $feedbackMessage = "No IDs specified.";
    }

    echo "<script>alert('" . $feedbackMessage . "');</script>"; // Display the feedback message
    mysqli_close($conn); // Close the database connection
    ?>
</body>

</html>
