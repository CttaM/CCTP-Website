<?php
session_start(); 
// Check if the user is logged in
$loggedIn = isset($_SESSION['userName']); 
// Include the PHP files
include 'tickets.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motive Mates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="background-color: #4C8787;">
          <a class="navbar-brand nav-title" href="#">Motive Mates</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link nav-text" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="#">Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="reps.php">Reps</a>
              </li>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col col-md-4 col-lg-4">
          <?php if ($loggedIn): ?>
                <h4>Welcome, <?php echo $_SESSION['userName']; ?>, here are your tickets</h4>
              <?php endif; ?>
          </div>
          <div class="col col-md-4 col-lg-4 pt-5 text-center">
          </div>
          <div class="col col-md-4 col-lg-4"></div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col col-md-4 col-lg-4"></div>
          <div class="col col-md-4 col-lg-4 pt-5 text-center" id="show-tickets">
          <?php
            // Check if the user is logged in
            if ($loggedIn) {
              // Get the tickets for the user
              $tickets = getTickets($_SESSION['userName']);
              $count = getTicketCount($_SESSION['userName']);
              // Display the tickets
              echo "<h4>Your Tickets {$count}</h4>";
              echo "<table>";
              echo "<tr>";
              echo "<th>Event Name</th>";
              echo "<th>Quantity</th>";
              echo "</tr>";
              // Loop through the tickets
              for ($i = 0; $i < count($tickets); $i++) {
                echo "<tr>";
                echo "<td>{$tickets[$i][0]}</td>";
                echo "<td>{$tickets[$i][1]}</td>";
                echo "</tr>";  
                }
              echo "</table>"; 
              }else {
                echo "<h4>Please log in to see your tickets</h4>";
              } 

          ?>
          </div>
          <div class="col col-md-4 col-lg-4"></div>
        </div>
      </div>

    <script src="scripts.js"></script>
    <script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>