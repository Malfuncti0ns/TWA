<?php
// Here is where your preprocessing code goes
error_reporting(E_ERROR | E_PARSE);
// An example is already given to you for the First Name
// using https://www.w3schools.com/php/func_error_reporting.asp to remove the warning that the data is empty, because it's empty when the page loads and it was annoying me

$fname = $_POST['firstname'];
$emailsr = $_POST['email'];
$addressstr = $_POST['postaddr'];
$sportStr = $_POST['favsport'];
$mailstr = $_POST['emaillist'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Week 9 Exercise 4 Form</title>
  <link rel="stylesheet" href="../css/week9Styles.css">
</head>

<body>
  <h1>Week 9 Exercise 4 PHP form demo</h1>
  <form id="userinfo" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <p>Please fill in the following form. All fields are mandatory.</p>

    <p>
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="firstname">
    </p>

    <p>
      <label for="email">Email Address:</label>
      <input type="text" id="email" name="email">
    </p>

    <p>
      <label for="addr">Postal Address:</label>
      <textarea rows="5" cols="300" id="addr" name="postaddr"></textarea>
    </p>

    <p>
      <label for="sport">Favourite sport: </label>
      <select id="sport" name="favsport[]" size="4" multiple>
        <option value="soccer">Soccer</option>
        <option value="cricket">Cricket</option>
        <option value="squash">Squash</option>
        <option value="golf">Golf</option>
        <option value="tennis">Tennis</option>
        <option value="basketball">Basketball</option>
        <option value="baseball">Baseball</option>
      </select>
    </p>

    <p>
      <label for="list">Add me to the mailing list</label>
      <input type="checkbox" id="list" name="emaillist" value="Yes">
    </p>

    <p><input type="submit" value="submit"></p>
  </form>
  <section id="output">
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <h2>The following information was received from the form:</h2>
    <p><strong>First Name:</strong> <?php echo $fname; ?></p>
    <!--output the other form inputs here -->
    <p><strong>Email Address:</strong> <?php echo $emailsr; ?></p>
    <p><strong>Postal Address:</strong> <?php echo $addressstr; ?></p>
    <?php
    if (!empty($sportStr)) {
      echo "<p><strong>Your favourite sports</strong></p>";
      echo "<ul>";
      foreach ($sportStr as $sport) {
        echo "<li>", $sport, "</li>";
      }
      echo "</ul>";
    } else {
      echo "<p>No Sports selected</p>";
    }
    ?>
    <p><strong>Mailing List: </strong><?php echo $mailstr; ?></p>
    <?php } ?>
  </section>
</body>

</html>