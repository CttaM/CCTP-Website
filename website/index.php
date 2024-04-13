<?php
session_start(); 
$loggedIn = isset($_SESSION['userName']); 
?>
<!DOCTYPE html>
<html>
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid" style="background-color: #4C8787;">
          <a class="navbar-brand nav-title" href="#" >Motive Mates</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link nav-text" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="#">Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="reps.html">Reps</a>
              </li>
              <li class="nav-item">
                <?php if (!$loggedIn): ?>
                  <a class="nav-link nav-text" href="login.php">Log In</a>
                <?php endif; ?>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="logout.php">Log Out</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container" id="welcome-text">
        <div class="row justify-content-center">
          <div class="col col-md-4 col-lg-4"></div>
          <div class="col col-md-4 col-lg-4 pt-5 text-center">
              <?php if ($loggedIn): ?>
                <h2>Welcome, <?php echo $_SESSION['userName']; ?></h2>
              <?php endif; ?>
          </div>
          <div class="col col-md-4 col-lg-4"></div>
        </div>
      </div>
          <p>Check out the latest below:</p>

          
       

      <div class="container">
          <div class="row" id="event_row">
              
          </div>
      </div>

      <!--  
      <div class="container-fluid px-0">

        <footer class="fixed-bottom text-center text-lg-start" style="background-color: #4C8787;">
          <div class="container d-flex justify-content-center py-5">
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
              <i class="fab fa-youtube"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
              <i class="fab fa-instagram"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
              <i class="fab fa-twitter"></i>
            </button>
          </div>
      
           Copyright 
          <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
           Copyright 
        </footer>-->
        
      </div>
      
<script>
  // Fetch the XML file
fetch('events.xml')
    .then(response => response.text())
    .then(str => {
        // Parse the XML string into a DOM tree
        let parser = new DOMParser();
        let xmlDoc = parser.parseFromString(str, "text/xml");

        // Select the event elements
        let events = xmlDoc.querySelectorAll('Event');

        // Loop through the events
        for (let i = 1; i < events.length; i++)  {
            let event = events[i];
            // Get the event details
            let eventName = event.querySelector('Event_name').textContent;
            let date = event.querySelector('Date').textContent;
            let location = event.querySelector('Location').textContent;
            let tickets = event.querySelector('Tickets').textContent;
            let tags = event.querySelector('Tags').textContent;

            // Create a div for the event
            let div = document.createElement('div');
            div.className = 'event-thumbnail col col-md-3 col-lg-3 ';
            div.id = 'eventThumbnail';

            // Add the event details to the div
                div.innerHTML = `
                <h2>${eventName}</h2>
                <p>${date}</p>
                <p>${tags}</p>
            `;

            // Add the div to the page
            document.getElementById("event_row").appendChild(div);
        };
    });
</script>


<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>