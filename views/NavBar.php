<ul id="navbar">
  <!--Home page-->
  <li><a href="Home.php">Home</a></li>
  <!--Tours-->
  <li><a href="Tour.php">Tours</a></li>
  <!--News-->
  <li><a href="News.html">News</a></li>
  <!--Message-->
  <li><a href="Message.html">Message</a></li>
  <!--Support-->
  <li><a href="Support.html">Support</a></li>
  <!--private info-->
  <li><a href="User.php"><?php echo $_SESSION["u"]; ?></a></li>

  <!--Log out-->
  <li><a href="index.php">Log out</a></li>
</ul>