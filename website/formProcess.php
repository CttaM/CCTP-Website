<?php

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstRelease = $_POST["firstReleaseTickets"];
    $secondRelease = $_POST["secondReleaseTickets"];
    $thirdRelease = $_POST["thirdReleaseTickets"];
    $name = $_POST['NameOnCard'];
    
    // Open or create the CSV file
    $file = fopen("purchases.csv", "a");

    // Write form data to the CSV file
    fputcsv($file, array($name, $email));

    // Close the file
    fclose($file);

    // Redirect back to the form with a success message
    header("Location: index.html?success=true");
    exit();
} else {
    // If the form is not submitted, redirect back to the form
    header("Location: index.html");
    exit();
}
?>

