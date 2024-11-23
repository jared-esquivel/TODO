<?php
// Initiates a PHP session, enabling us to store data.
session_start();

if (!isset($_SESSION["tasks"])) {
  $_SESSION["tasks"] = [];
}

if (!empty($_POST['name'])) {

  $_SESSION["tasks"][] = $_POST["name"];
  redirect_and_suspend();
}

if (!empty($_POST['user-name'])) {

  $_SESSION["user-name"] = $_POST["user-name"];
  redirect_and_suspend();
}

if (isset($_POST["delete_id"])) {

  $delete_id = $_POST['delete_id'];
  unset($_SESSION['tasks'][$delete_id]);

  $_SESSION["tasks"] = array_values(array: $_SESSION["tasks"]);

  redirect_and_suspend();
}

function render_new_task($task, $id)
{
  echo "<div class=\"task\" id=\"task-$id\">";
  echo "  <span>$task</span>";
  // The form contains a hidden label with the id of the task for deletion and
  // the delete button itself to remove a task from the list.
  echo "  <form method=\"post\" style=\"display:inline;\">";
  echo "    <input type=\"hidden\" name=\"delete_id\" value=\"$id\">";
  echo "    <button type=\"submit\" class=\"mx-2 btn btn-link text-danger p-0\">clear</button>";
  echo "  </form>";
  echo " <hr/> ";
  echo "</div>";
}

function redirect_and_suspend()
{
  // Redirect to self.
  header("Location: " . $_SERVER['PHP_SELF']);
  // Ensures that the redirect happens by terminating the script.
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Save Name</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/stylesheet.css">
</head>

<body>
  <div class="center">
    <!-- Form for entering the name -->
    <form method="POST">
      <label for="name">Enter your name:</label>
      <input type="text" name="user-name" id="user-name">
      <button type="submit">Save Name</button>
    </form>
  </div>
  <div
    class="alert alert-info alert-dismissible fade show text-center"
    role="alert"
    id="donation-banner">
    "Unlock exclusive features and enhance your experience with our premium plan—get all the benefits for a limited-time low price!"

    <button
      type="button"
      class="close"
      data-dismiss="alert"
      aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php
  if (isset($_SESSION["user-name"])) {
    $user_name = $_SESSION["user-name"];
    echo "<h1>Welcome, $user_name</h1>";
  }
  ?>

  <div id="New-task-bar">
    <form method="post">
      <label for="taskName">New Task:</label>
      <input type="text" id="taskName" name="name" placeholder="Enter task name" required>
      <button class="btn btn-secondary" type="submit">Add Task</button>
    </form>
  </div>

  <?php
  if (empty($_SESSION["tasks"])) {
    echo "There is NOTHING HERE";
  }

  for ($i = 0; $i < count($_SESSION["tasks"]); $i++) {
    render_new_task($_SESSION["tasks"][$i], $i);
  }
  ?>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
</body>

</html>