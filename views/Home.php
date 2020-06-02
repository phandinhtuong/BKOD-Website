<!DOCTYPE html>
<script src="static/getHeader.js"></script>

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
} else
$currentUser = $_SESSION["u"];
?>

<body>
    <div id="header">
        <p>
            <h1>Home Page</h1>
        </p>
    </div>

    <script src="static/getNavBar.js"></script>

    <div id="main">
        <h1 align="center">Welcome to BKOD Website</h1>


    </div>
</body>
</html>

<script>
    localStorage.setItem("currentUser", '<?php echo $currentUser;?>');
    document.getElementById("nav-username").textContent = localStorage.getItem("currentUser");
</script>