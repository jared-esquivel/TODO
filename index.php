<?php
session_start(); // Start the session to store the name
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Save Name</title>
</head>

<body>
  <div class="center">
    <!-- Form for entering the name -->
    <form method="POST">
      <label for="name">Enter your name:</label>
      <input type="text" name="name" id="name" required>
      <button type="submit">Save Name</button>
    </form>
  </div>
  <?php
  // Check if form is submitted and save the name in session
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name'])) {
    // Save the name in session
    $_SESSION['name'] = $_POST['name'];
  }
  ?>

  <!-- Display the saved name after refresh -->
  <?php if (isset($_SESSION['name'])): ?>
    <h2>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
  <?php endif; ?>

</body>

</html>





<!DOCTYPE html>


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
  <!DOCTYPE html>
  <html lang="en">

  </html>
</body>
<!---------------->



</html>