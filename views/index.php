<?php
require "../Controller/FormController.php";
//require_once "";
$error = false;
$formSubmitted=false;
if (isset($_POST['submit']) && isset($_POST['email'])) {
  $formSubmitted=true;
  $formHandler = new FormController();

  $result = $formHandler->addNewEmail($_POST);

  if (array_key_exists('message', $result)) {
  } else {
    $error = true;
  }

}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8"/>
  <title>Email registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login and Registration Form with HTML5 and CSS3"/>
  <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class"/>
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" type="text/css" href="../resources/styles/styles.css"/>

</head>
<body>
<div class="container">
  <header>
    <h1>PHP Web project</h1>
  </header>
  <section>
    <div id="container_demo">

      <div id="wrapper">
        <div class="form-container">
          <form name="regiser" method="post" action="index.php">
            <h1>Register your email </h1>
            <p>
              <label for="email" class="label"> Your Email </label>
              <input id="email" type="email" class="input-box" name="email" required/>

            </p>
            <p class="button">
              <input type="submit" name="submit" value="Register" class="submit-button"/>
            </p>
            <?php if($formSubmitted):?>
            <?php if ($error) : ?>
              <span class="error"><?= $result['error']; ?></span>
            <?php else: ?>
              <span class="success"><?= $result['message']; ?></span>
            <?php endif; ?>
            <?php endif; ?>
          </form>
        </div>

      </div>
    </div>
  </section>
</div>
</body>
</html>