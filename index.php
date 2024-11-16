<?php

session_start();

if (isset($_POST['name'])) {
  $_SESSION['name'] = htmlspecialchars($_POST['name']);
}
if (isset($_SESSION['name'])) {
  echo "<h2>Welcome back, " . $_SESSION['name'] . "!</h2>";
}
?>

<!DOCTYPE html>
< lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Project</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/stylesheet.css" />
  </head>

  <body>
    <h1 class="m-2 p-1">
      <?php echo $message; ?>
    </h1>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous">
    </script>
  </body>
  <!---------------->

  </div>
  <!---- welcome name and date  -->
  <div class="btn-group">
    <button>
      <label for="name">Welcome:</label>
    </button>
    <button>
      <?php
      $d = mktime(17, 20, 54, 11, 15, 2024);
      echo "The Time is  " . date("Y-m-d h:i:sa", $d);
      ?>
    </button>
  </div>

  <!---- task buttons -->
  <div class="btn-group">
    <button>
      <h1> Task:###### </h1>
    </button>
    <button>
      <H1> New Task</H1>
    </button>


  </div>

  </html>