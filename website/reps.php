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
                <a class="nav-link nav-text" href="ticketsPage.php">Tickets</a>
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



      <div class="container">
        <div class="row">
          <div class="col col-md-4 col-lg-4"></div>
          <h1 class="col col-md-4 col-lg-4 px-3 pt-3">Your Reputation</h1>
          <div class="col col-md-4 col-lg-4"></div>
        </div>
      </div>

      <div class="row">
        <div class="col col-md-4 col-lg-4"></div>        
        <div class="col col-md-4 col-lg-4 progress m-3">
          <!-- Progress bar code here -->
        <?php
            // Load the XML file
            $xml = simplexml_load_file('users.xml');

            // Find the user's node
            $userNode = $xml->xpath("//user[username='{$_SESSION['userName']}']")[0];

            // Get the number of tickets bought by the user
            $ticketsBought = isset($userNode->ticketsBought) ? (int)$userNode->ticketsBought : 0;

            // Set the maximum value for the progress bar
            $maxValue = 6; // Change this to your desired maximum value

            if ($ticketsBought > $maxValue) {

              // Generate a unique code
              $uniqueCode = bin2hex(random_bytes(5)); // Change the number to adjust the length of the code

              // Save the unique code to the user's node
              $userNode->uniqueCode = $uniqueCode;

              $ticketsBought = 0;
              $userNode->ticketsBought = 0;
              $dom = new DOMDocument('1.0');
              $dom->preserveWhiteSpace = false;
              $dom->formatOutput = true;
              $dom->loadXML($xml->asXML());
              $dom->save('users.xml');
          }

            // Calculate the percentage
            $percentage = ($ticketsBought / $maxValue) * 100;
        ?>         
          <div class="progress-bar" role="progressbar" id="progressBar" style="width: <?php echo $percentage; ?>%;" id="progressBar" aria-valuenow="<?php echo $ticketsBought; ?>" aria-valuemin="0" aria-valuemax="<?php $maxValue; ?>"></div>
        </div>
        <div class="col col-md-4 col-lg-4"></div>
      </div> 
       

       
        <h1 class="px-3 pt-3">What is reps?</h1>
        
        

        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Your discounts
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <Div class="row">
                  <div class="col" id="discount-codes">
                    <?php
                      if (!empty($uniqueCode)) {
                        echo "<p>Your discount code: $uniqueCode</p>";
                    }
                    ?>
                  </div>
                  <div class="col">
                    
                  </div>
                </Div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What is Repuation?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <h3 class="px-2">Gain discounts on your favourite events and artists</h3>
                <p class="pt-3 px-3">Each time you buy a ticket, you'll gain repuatation points. With enough reputation points you'll be able to get discounts including: for tickets, drinks and Uber's. Plus, you'll be able to share these with your friends, so everyone can join in the fun.</p>

              </div>
            </div>
          </div>
        </div>

        

          <!-- <footer class="fixed-bottom text-center text-lg-start" style="background-color: #4C8787;">
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
            </div> -->
        
            <!-- Copyright
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
             Copyright -->
          <!-- </footer>  -->
          
        

    <script src="scripts.js"></script>
    <script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>