<?php

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" ) 
{
    // Get form data
    $firstRelease = $_POST["firstReleaseTickets"];
    $secondRelease = $_POST["secondReleaseTickets"];
    $thirdRelease = $_POST["thirdReleaseTickets"];
    $name = $_POST['NameOnCard'];
    print_r("code running");
     // Write form data to the CSV file
    $data = array($firstRelease, $secondRelease, $thirdRelease, $name);
    print_r($data);
    // Open or create the CSV file
    $file = fopen('purchases.csv', 'a');

    fputcsv($file, $data);
    //$result = fputcsv($file, $data);

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

