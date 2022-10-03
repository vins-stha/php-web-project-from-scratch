<?php
if (isset($_POST['email'])) {
  echo "posted";
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
          integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
          crossorigin="anonymous" referrerpolicy="no-referrer">

  </script>

</head>
<body>
<div class="container">
  <header>
    <h1>Email Registration System </h1>
  </header>
  <section>
    <div id="container_demo">

      <div id="wrapper">

        <form name="login" method="post" action="index.php">
          <h1>Register your email </h1>
          <p>
            <label for="email" class="uname"> Your Email </label>
            <input id="email" type="email" class="input-box" name="email"/>

          </p>
          <p class="login button">
            <input type="submit" name="welcome" value="Logout"/>
          </p>

        </form>

      </div>
    </div>
  </section>
</div>
</body>
</html>

<script>
  function handleSubmit() {
    // alert();

  }

  $(document).ready(function () {
    $("form").submit(function (event) {

      event.preventDefault();

      let formData = {
        email: $("#email").val()
      };
      console.log('email=>', formData)
      $.ajax({
        type: "POST",
        url: "index.php",
        data: formData,
        dataType: "json",
        encode: true
      })
          .done(function (data) {
            console.log('DAta=', data)
          });
    })

  });
</script>
