<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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
                    <h1>Please Log In</h1>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" placeholder="Name" name="userName">
                            </div>
                            <div class="input-field">
                                <input type="password" placeholder="Password" name="password1">
                            </div>
                        </div>
                        <button type="submit" value="submit">Log In</button>
                    </form>
                    <p>Don't have an account? Register <a href="register.php">here</a></p>
                </div>
                <div class="col-sm-4 col-lg-4"></div>
            </div>
        </div>
      </div>

    <?php 
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        // Get the username and password from the form
        $userName = $_POST['userName'];
        $password1 = $_POST['password1'];
        // Check if the username and password are empty
        if (empty($userName) || empty($password1)) {
            echo "Username and password are required!";
          } else {
            // Open the users database file
            $file = fopen('usersDataBase2.csv', 'r');
        
            if($file === false) {
              die("Unable to open file");
            }
            // Check if the username and password match the records in the file
            $loggedIn = false;
                while (($data = fgetcsv($file, 1000, "|")) !== FALSE) {
                  if ($data[0] == $userName && $data[2] == $password1) {
                      // Set the session variable and redirect to the index page
                      $loggedIn = true;
                      $_SESSION['userName'] = $data[0];
                      header("Location: index.php");
                      break;
                  }
                }
                fclose($file);

            }
                    
        
      }
    ?>

<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/60d3c4e47b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>