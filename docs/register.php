<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    
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
                <a class="nav-link nav-text"  href="reps.html">Reps</a>
              </li>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
</nav>

      

      <div class="container" style="position: relative" id="register-login-container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-lg-4"></div>
                <div class="col-sm-4 col-lg-4 form-box" id="form-box">
                    <h1>Register</h1>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" placeholder="Name" name="userName">
                            </div>

                            <div class="input-field">
                                <input type="email" placeholder="Email" name="userEmail">
                            </div>

                            <div class="input-field">
                                <input type="password" placeholder="Password" name="password1">
                            </div>
                            <div class="input-field">
                                <input type="password" placeholder="Confirm Password" id="password2" name="password2">
                            </div>
                        </div>
                        <button type="submit" value="submit">Register</button>
                    </form>
                    <p>Already have an account? Login in <a href="login.php">here</a></p>
                </div>
                <div class="col-sm-4 col-lg-4"></div>
            </div>
        </div>
      </div>

    <?php 
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        // Get the username and password from the form, and generate a unique user ID
        $userID = uniqid();
        $userName = $_POST['userName'];
        $email = $_POST['userEmail'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $password;       

        // Check if the passwords match
        if($password1 == $password2){
          $password = $password1;
          // Add the user to the database
          $data = array($userName, $email, $password, $userID);
          // Open the CSV file
          $file = fopen('usersDataBase2.csv', 'a');
          // Write the data to the CSV file
          fputcsv($file, $data, '|');

          fclose($file);
          // Convert the CSV file to an XML file
          $file = fopen('usersDataBase2.csv', 'r');
          // Create a new instance of the SimpleXMLElement class
          $xml = new SimpleXMLElement('<root/>');

          // Loop through each line in the CSV file
          while (($line = fgetcsv($file, 0, '|')) !== FALSE) {
            if ($line === array(null) || $line === array('')) continue;

              // Create a new child element in the XML data
              $user = $xml->addChild('user');

              // Set the text content of the child element to the data from the CSV file
              $user->addChild('username', $line[0]);
              $user->addChild('password', $line[1]);
              $user->addChild('email', $line[2]);
              $user->addChild('userID', $line[3]);
          }

          // Save the XML data to a file
          $xml->asXML('users.xml');

          // Close the CSV file
          fclose($file);
          // Load the XML file
          $dom = new DOMDocument('1.0');
          $dom->preserveWhiteSpace = false;
          $dom->formatOutput = true;
          $dom->loadXML($xml->asXML());
          $dom->save('users.xml');


          echo "Registration Successful";
          //header("Location: " . $_SERVER['PHP_SELF']);
        } else{
          echo "Passwords do not match";
        }
         
         
      }
    ?>

<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>