<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    <?php include('static/UserForm.css'); ?>
  </style>
</head>

<body>

  <form onsubmit="event.preventDefault(); handleRegisterBtnClick();">
    <div class="container">
      <h1>BKOD Account Registration</h1>
      <hr>
      <?php
      if (isset($_SESSION["duplicateEntry"])) {
        echo "<h2 align='center'>Username already exists!</h2>";
        unset($_SESSION["duplicateEntry"]);
        session_destroy();
      } else if (isset($_SESSION["mismatchPsw"])) {
        echo "<h2 align='center'>Passwords do not match!</h2>";
        unset($_SESSION["mismatchPsw"]);
        session_destroy();
      } else if (isset($_SESSION["unknownError"])) {
        echo "<h2 align='center'>An unknown error occured! Please try again.</h2>";
        unset($_SESSION["unknownError"]);
        session_destroy();
      }
      ?>
      <h2 align='center' id="res" style="display: none"></h2>

      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>

      <label for="fullName"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="fullName" id="fullName" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
      <hr>

      <button class="registerbtn">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="index.php">Login in</a>.</p>
    </div>
  </form>

</body>

<script>
  async function handleRegisterBtnClick() {
    //let payload = new FormData(document.querySelector('form'))
    let username = document.getElementById("username").value;
    let psw = document.getElementById("psw").value;
    let psw_repeat = document.getElementById("psw-repeat").value;
    let fullName = document.getElementById("fullName").value;
    let errorEl = document.getElementById("res")

    if (psw != psw_repeat) {
      errorEl.style.display = 'block';
      errorEl.textContent = "Passwords do not match!";
    } else {
      let payload = {
        username: username,
        psw: psw,
        psw_repeat: psw_repeat,
        fullName: fullName
      }
      const rawResponse = await fetch('../controllers/RegisterController.php', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });
      let clone = rawResponse.clone();
      await clone.json().then(res => {
        if (["Username already existed!", "An unknown error occured!"].includes(res)) {
          errorEl.style.display = 'block';
          errorEl.textContent = res;
        } else {
          localStorage.setItem('user', JSON.stringify(res));
          localStorage.setItem('regSuccess', true);
          window.location.href = '../views/index.php'
        }
      })
    }

    //window.location.href = '../controllers/RegisterController.php'
    //console.log("pl", payload);

  }
</script>

</html>