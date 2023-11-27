<!DOCTYPE html>
<html>

<head>
    <title>Display Drugs</title>
    <link rel="stylesheet" href="../styles/tables.css">
</head>

<body>
    <div class="wrapper">
        <!-- Feedback message container -->
        <div id="feedback-message" class="feedback-message"></div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Drug ID</th>
                    <th>Generic Name</th>
                    <th>Brand Name</th>
                    <th>Dosage Form</th>
                    <th>Route Of Administration</th>
                    <th>Side Effects</th>
                    <th>Expiry Date</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            // Retrieve user details from the database
            require_once("connect.php");

            // Pagination configuration
            $itemsPerPage = 10; // Number of items to display per page
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

            $offset = ($currentPage - 1) * $itemsPerPage; // Calculate the offset

            $query = "SELECT * FROM drug LIMIT $offset, $itemsPerPage";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['drug_id'] . "</td>";
                    echo "<td>" . $row['generic_name'] . "</td>";
                    echo "<td>" . $row['brand_name'] . "</td>";
                    echo "<td>" . $row['dosage_form'] . "</td>";
                    echo "<td>" . $row['route_of_administration'] . "</td>";
                    echo "<td>" . $row['side_effects'] . "</td>";
                    echo "<td>" . $row['expiry_date'] . "</td>";
                    echo "<td>" . $row['Category'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['drug_id'] . "'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=" . $row['drug_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No drugs found.</td></tr>";
            }
            ?>
        </table>

        <?php
        // Check if a success message is set and display it as a feedback message
        if (isset($_GET['success_message'])) {
            echo "<script>showFeedbackMessage('" . $_GET['success_message'] . "');</script>";
        }

        // Pagination links
        $query = "SELECT COUNT(*) AS total FROM drug";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $totalItems = $row['total']; // Total number of items from db.

        $totalPages = ceil($totalItems / $itemsPerPage); // Calculating total number of pages

        echo "<div style='margin-top: 10px;'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        echo "</div>";
        mysqli_close($conn);
        ?>

        <p>
            <a href="./add_drug.php">Add drug</a>
        </p>
    </div>

    <script>
        // Function to show feedback message
        function showFeedbackMessage(message) {
            const feedbackMessage = document.getElementById('feedback-message');
            feedbackMessage.textContent = message;
            feedbackMessage.style.display = 'block';

            // Hide the message after 3 seconds (adjust as needed)
            setTimeout(function () {
                feedbackMessage.style.display = 'none';
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    </script>
</body>

</html>
