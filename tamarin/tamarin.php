<?php
// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedClass = $_POST["selected_class"];

    // Connect to your database (replace with your credentials)
    $conn = mysqli_connect("localhost", "root", "", "tamarin");

    // Query the database for data related to the selected class
    $sql = "SELECT * FROM classes WHERE class = '$selectedClass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Subject/Lmada</th>
                    <th>Page</th>
                    <th>Exercices</th>
                    <th>Des Notes</th>
                    </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row["subject"] . "</td>
                <td>" . $row["page"] . "</td>
                <td>" . $row["exercices"] . "</td>
                <td>" . $row["notes"] . "</td>
                </tr>";
        }
        echo "</tbody>
        </table>";
    } else {
        echo "<h1> ma 3ndkomch tamarin </h1>";
    }

    mysqli_close($conn);
}
?>