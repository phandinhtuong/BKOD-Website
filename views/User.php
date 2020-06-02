<!DOCTYPE html>
<script src="static/getHeader.js"></script>
<style>
  @import url("static/UserForm.css");
</style>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION["u"])) {
  header('Location: index.php');
  session_destroy();
}

include("../controllers/UserInfoController.php");
$user = getUsersInfo();
?>

<body>
  <div id="header">
    <p>
      <h1>User's Information</h1>
    </p>
  </div>

  <script src="static/getNavBar.js"></script>

  <?php if (isset($_SESSION["updateUserInfoSuccess"])) {
    echo "<h2 align='center'>Updated successfully!</h2>";
    unset($_SESSION["updateUserInfoSuccess"]);
  } ?>

  <form action="../controllers/UserInfoController.php" method="POST">
    <div class="container">

      <label for="fullName"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="fullName" id="fullName" value="<?php echo $user[3] ?>" required>

      <label for="school"><b>School</b></label>
      <input type="text" placeholder="Enter School" name="school" id="school" value="<?php echo $user[6] ?>">

      <label for="class"><b>Class</b></label>
      <input type="text" placeholder="Enter Class" name="class" id="class" value="<?php echo $user[7] ?>">

      <label for="phone"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" value="<?php echo $user[8] ?>">

      <label for="birthday"><b>Birthday</b></label><br>
      <input type="date" id="birthday" name="birthday" value="<?php echo $user[4] ?>"><br /> <br>

      <label for="gender"><b>Gender</b></label><br />
      <input type="radio" id="male" name="gender" value="1" <?php if ($user[5] == 1) echo "checked" ?>>
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="2" <?php if ($user[5] == 2) echo "checked" ?>>
      <label for="female">Female</label>
      <input type="radio" id="other" name="gender" value="3" <?php if ($user[5] == 3) echo "checked" ?>>
      <label for="other">Other</label>
      <input type="radio" id="unrevealed" name="gender" value="0" <?php if ($user[5] == 0) echo "checked" ?>>
      <label for="unrevealed">Unrevealed</label><br><br>

      <div class="button-holder"><button type="submit" class="save-btn">Save</button></div>

    </div>
  </form>
</body>
</html>

<script>
</script>