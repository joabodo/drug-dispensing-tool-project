<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drug</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <div class="wrapper">
        <form id="add-drug-form" class="input-group" action="save_drug.php" method="POST" enctype="multipart/form-data">
            <h1>Add Drug</h1>

            <div class="input-field">
                <label for="generic_name">Generic Name:</label>
                <input type="text" id="generic_name" name="generic_name" required>
            </div>

            <div class="input-field">
                <label for="brand_name">Brand Name:</label>
                <input type="text" id="brand_name" name="brand_name" required>
            </div>

            <div class="input-field">
                <label for="dosage_form">Dosage Form:</label>
                <input type="text" id="dosage_form" name="dosage_form" required>
            </div>

            <div class="input-field">
                <label for="route_of_administration">Route Of Administration:</label>
                <input type="text" id="route_of_administration" name="route_of_administration" required>
            </div>

            <div class="input-field">
                <label for="side_effects">Side Effects:</label>
                <input type="text" id="side_effects" name="side_effects" required>
            </div>

            <div class="input-field">
                <label for="expiry_date">Expiry Date:</label>
                <input type="date" id="expiry_date" name="expiry_date" required>
            </div>

            <div class="input-field">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
            </div>

            <div class="input-field">
                <label for="drug_image">Drug Image:</label>
                <input type="file" id="drug_image" name="drug_image" accept="image/*" required>
            </div>

            <input class="submit-btn" type="submit" value="Add Drug">
        </form>
    </div>
</body>

</html>
