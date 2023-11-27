<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../styles/homes.css">
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <h2><?php
                if (isset($_GET['name'])) {
                    echo "Welcome " . $_GET['name'];
                }
                ?>
            </h2>
            <ul>
                <li><a href="display_doctors.php">Doctors</a></li>
                <li><a href="display_users.php?user_type=admin">Patients</a></li>
                <li><a href="display_pharmacists.php">Pharmacists</a></li>
                <li><a href="display_drugs.php?user_type=admin">Drugs</a></li>
                <!-- Add a Logout link -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>MANAGE THIS SYSTEM</h1>
            <p><span>Note:</span> This page is for authorized users only!</p>

            <div>
                <button type="button"><span></span><a href="register.php?user_type=patient">ADD USER</a></button>
                <button type="button"><span></span><a href="add_drug.php">ADD DRUG</a></button>
            </div>
        </div>
    </div>

</body>

</html>
