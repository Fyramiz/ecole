<?php


if ($_SERVER["REQUEST_METHOD"] != "POST") {
  // Connect to your database (replace with your credentials)
  $conn = mysqli_connect("localhost", "root", "", "tamarin");

  // Check for connection errors
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare a statement to prevent SQL injection
  $stmt = mysqli_prepare($conn, "SELECT * FROM classes WHERE class = ?");
  mysqli_stmt_bind_param($stmt, "s", $selectedClass);

  // Execute the statement and check for errors
  if (!mysqli_stmt_execute($stmt)) {
    die("Error retrieving data: " . mysqli_error($conn));
  }

  $result = mysqli_stmt_get_result($stmt);

  // Include the HTML template (replace with the actual path)
  include("notamarin.html");
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $selectedClass = $_POST["selected_class"];

  // Connect to your database (replace with your credentials)
  $conn = mysqli_connect("localhost", "root", "", "tamarin");

  // Check for connection errors
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare a statement to prevent SQL injection
  $stmt = mysqli_prepare($conn, "SELECT * FROM classes WHERE class = ?");
  mysqli_stmt_bind_param($stmt, "s", $selectedClass);

  // Execute the statement and check for errors
  if (!mysqli_stmt_execute($stmt)) {
    die("Error retrieving data: " . mysqli_error($conn));
  }

  $result = mysqli_stmt_get_result($stmt);

  // Include the HTML template (replace with the actual path)
  include("tamarin.html");
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>