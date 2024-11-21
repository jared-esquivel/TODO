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

if (isset($_POST['name'])) {
  $_SESSION['name'] = htmlspecialchars($_POST['name']);
}
if (isset($_SESSION['name'])) {
  echo "<h2>Welcome back, " . $_SESSION['name'] . "!</h2>";
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Save Name</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="styles/stylesheet.css" />
</head>


<!-- TODO: #4 Create a form with a text input element and a button element. This form
             will be resposible for submitting new tasks to be completed.
       (hint: add the method="post" attribute to the form element. For the input element,
              make sure to add the name="name" attribute since this is the name of the
              task to be completed. Also add the type="text" attribute since this is a 
              text input field.)
       (hint: for the button, make sure to add the type="submit" attribute.)
  -->


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

<body>
  <div class="center">
    <!-- Form for entering the name -->
    <form method="POST">
      <label for="name">Enter your name:</label>
      <input type="text" name="name" id="name" required>
      <button type="submit">Save Name</button>
    </form>
  </div>


  <div id="New-task-bar">

    <form method="post">
      <label for="taskName">New Task:</label>
      <input type="text" id="taskName" name="name" placeholder="Enter task name" required>
      <button class="btn btn-secondary type=" submit">Add Task</button>
    </form>
  </div>


  <!-- TODO: #5 We want to iterate through each of our tasks and render them. If there are
             no tasks to be rendered, then we display a message to notify the user.
       (hint: use a foreach loop over the tasks array $_SESSION['tasks'], calling the
              `render_new_task` function at each iteration. Use the index of the task
              as the $id when calling the `render_new_task` function.)
       (hint: use the `empty` function on the $_SESSION['tasks'] to check if there are any
              tasks in the array. If there are no tasks, then display a message to notify
              the user.)
  -->

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