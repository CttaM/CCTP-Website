<?php
session_start(); 
$loggedIn = isset($_SESSION['userName']); 
$userID = isset($_SESSION['userID']);
include 'codes.php';
include 'tickets.php';
include 'events.php';
$eventName = isset($_GET['event']) ? $_GET['event'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./styles2.css" />

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let params = new URLSearchParams(location.search);
        let eventName = params.get('event');
        let eventPrice = params.get('price');

        //document.getElementById('eventName').textContent = eventName;
        document.getElementById('eventPrice').textContent = eventPrice;

        // Set the value of the hidden input field to the event name
        document.getElementById('eventNameInput').value = eventName;
    });
    </script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['userName']; // Assuming the username is stored in the session
    $ticketQuantity = $_POST['ticketQuantity'];
    addTicket($username, $eventName, $ticketQuantity);
    addNewCode($username, getTicketCount($username));
    
  }
?>

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
                <a class="nav-link nav-text"  aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text"  href="#">Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text"  href="reps.php">Reps</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-text" href="login.php">Log In</a>
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
        <form method="post">
        <h1 class="pb-5 pt-3">Ticket purchase</h1>
        <h2 class="pb-5 pt-3" id="eventName"> <?php echo $eventName; ?> </h2>
        <div class="row justify-content-center">
            <div class="col-sm-4 col-lg-4"></div>
                <div class="col-sm-4 col-lg-4">
                    <div class="mb-5">
                        <input type="hidden" name="eventName" id="eventNameInput" value="">
                        <input type="hidden" name="userName" id="userNameInput" value="<?php echo $loggedIn; ?>">
                        <!-- <input type="hidden" id="userID" name="userID" value="<?php $_SESSION['userID']; ?>"> -->
                        <!-- Rest of your form fields... -->
                        <p>Event price: £<strong><span id="ticketPrice"><?php echo getEventPrice($eventName); ?></span></strong></p>
                        <label>Booking fee: £
                          <span id="bookingFee">
                            <?php   
                             if (getCodeCount($_SESSION['userName']) > 0){
                              echo "0.00";
                             } else{
                              echo "1.00";
                             }
                            ?>
                          </span>
                        </label>
                        
                        <div class="justify-content-center">
                        <label for="ticketQuantity" class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control text-center" name="ticketQuantity" id="ticketQuantity" min="0" style="width: 25%; display: inline">
                        <button onclick="addition()" class="justify-content-center" type="button" id="addButton" style="display: inline;"><i class="fa-solid fa-plus"></i></button>
                        <button onclick="subtraction()" class="justify-content-center" type="button" style="display: inline;"><i class="fa-solid fa-minus"></i></button>
                      </div>
                    </div>
                    <p id="total"></p>
                </div>    
            <div class="col-sm-4 col-lg-4"></div>
          </div>
        
            <div class="row">
                <div class="col-sm-4 col-lg-4"></div>
                <div class="col-sm-4 col-lg-4">
                        <label for="NameOnCard">Name on card</label>
                        <input type="text" name="NameOnCard">
                        <label for="CardNumber">Card number</label>
                        <input type="text" name="CardNumber">
                        <label for="CardExpiry">Card expiry date</label>
                        <input type="text" name="CardExpiry" placeholder="MM/YY" style="width: 75%; text-align: center;">
                        <label for="CardSecurityCode">Security Code</label>
                        <input type="number" name="CardSecurityCode" placeholder="CVV" style="width: 75%; text-align: center;">
                        <label for="PostCode">Post code</label>
                        <input type="text" name="PostCode" style="width: 75%; text-align: center;"><br>
                        <label for="userCode">Discount code</label>
                        <input type="text" name="userCode" style="width: 75%; text-align: center;"><br>
                        
                        <button type="submit" value="Submit" id="completePurchaseButton">Complete payment</button>
                        </div>
            
                <div class="col-sm-4 col-lg-4"></div>
            </div>
        </form>
    </div>



<!-- <script>
  let params = new URLSearchParams(location.search);
  let eventName = params.get('event');
  let eventPrice = params.get('price');

  document.getElementById('eventName').textContent = eventName;
  document.getElementById('eventPrice').textContent = eventPrice;

  document.getElementById('eventNameInput').value = eventName;
  console.log(document.getElementById('eventNameInput').value);
</script> -->
<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>