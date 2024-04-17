<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motive Mates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css" />
</head>
<body>

<?php
$eventName = htmlspecialchars($_GET['event'] ?? '', ENT_QUOTES, 'UTF-8');
$date = htmlspecialchars($_GET['date'] ?? '', ENT_QUOTES, 'UTF-8');
$location = htmlspecialchars($_GET['location'] ?? '', ENT_QUOTES, 'UTF-8');
$image = htmlspecialchars($_GET['image'] ?? '', ENT_QUOTES, 'UTF-8');
// Retrieve more parameters as needed
?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="background-color: #4C8787;">
          <a class="navbar-brand nav-title" href="#">Motive Mates</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link nav-text"  aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text"  href="#">Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text"  href="reps.php">Reps</a>
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
        <div class="row py-5">
          <div class="col col-md-4 col-lg-4"></div>
          <img src="Pics/<?php echo $image; ?>" alt="<?php echo $eventName; ?>" class="col col-md-4 col-lg-4">
          <div class="col col-md-4 col-lg-4"></div>
        </div>      
      </div>
      
      <div class="container">
        <div class="row py-3 justify-content-center">
          <div class="col col-md-3 col-lg-3">
            <h1 id="event-name"><?php echo $eventName; ?></h1> 
          </div>
          <div class="col col-md-3 col-lg-3">
          <b><?php echo $date; ?></b><br>
                <?php echo $location; ?> 
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row py-3 justify-content-center">
          <div class="col col-md-3 col-lg-3">

          </div>
          <div class="col col-md-3 col-lg-3">
              <div id="Buy-Ticket-Button">
                <button type="button" class="buy-ticket-button" onclick="loadPaymentScreen()">Buy Tickets</button>
              </div>
          </div>
        </div>
      </div>

      

      <div class="container">
        <div class="row py-5">
          <div class="col col-md-2 col-lg-2"></div>
          <div class="col col-md-8 col-lg-8" id="Event-detail-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<p id="hiddenText">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><span id="dots">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span id="more"></span><span> </span>
            <br>
            <button onclick="myFunction()" id="myBtn">Read more</button></div>
          <div class="col col-md-2 col-lg-2"></div>
        </div>      
      </div>

      

      <div class="container-fluid px-0 bottom-nav" id="bottom-wrapper">

        <footer class="text-center text-lg-start" style="background-color: #4C8787;">
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
      
          <!-- Copyright -->
          <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
          <!-- Copyright -->
        </footer>
        
      </div>







<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>