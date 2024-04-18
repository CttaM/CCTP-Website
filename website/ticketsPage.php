<?php
session_start(); 
$loggedIn = isset($_SESSION['userName']); 
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
                <a class="nav-link nav-text" href="#">Reps</a>
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
             // Load the XML files
              $usersXml = simplexml_load_file('users.xml');
              $eventsXml = simplexml_load_file('events.xml');

              // Find the user node that matches the logged-in username
              $userNodes = $usersXml->xpath("//user[username='{$_SESSION['userName']}']");

              // If a matching user node is found, loop through the 'event' children
              if (count($userNodes) > 0) {
                  foreach ($userNodes[0]->ticketTracker as $userEvent) {
                      // Find the event node that matches the event name
                      $eventNodes = $eventsXml->xpath("//event[eventName='{$userEvent->eventName}']");

                      // If a matching event node is found, display the event name
                      if (count($eventNodes) > 0) {
                          echo "<p>{$eventNodes[0]->eventName}</p>";
                      }
                  }
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