<!DOCTYPE html>
<script src="static/getHeader.js"></script> <!-- header part -->
<?php
session_start();
if (!isset($_SESSION["u"])) { //if the username session is not set, direct to index page
    header('Location: index.php');
    session_destroy();
} else {
    $currentUser = $_SESSION["u"]; //set current user = username session
}
?>
<body>
    <div id="header">
        <p><h1>Home Page</h1></p>
</div>

<script src="static/getNavBar.js"></script> <!-- Navigation Bar -->

<div id="main">
    <p align="center" style="font-size:200px">Welcome to BKOD Website</p>
    <script type="text/javascript">
        num = 0;
        function colorfulWelcome() { //change welcome text color continuously
            num++;
            switch (num % 10) { //10 colors
                case 1 :
                    document.getElementById("main").style.color = "red";
                    break;
                case 2 :
                    document.getElementById("main").style.color = "green";
                    break;
                case 3 :
                    document.getElementById("main").style.color = "blue";
                    break;
                case 4 :
                    document.getElementById("main").style.color = "orange";
                    break;
                case 5 :
                    document.getElementById("main").style.color = "gray";
                    break;
                case 6 :
                    document.getElementById("main").style.color = "violet";
                    break;
                case 7 :
                    document.getElementById("main").style.color = "black";
                    break;
                case 8 :
                    document.getElementById("main").style.color = "yellow";
                    break;
                case 9 :
                    document.getElementById("main").style.color = "lime";
                    break;
                case 0 :
                    document.getElementById("main").style.color = "purple";
                    break;

            }
        }
        window.setInterval("colorfulWelcome()", 100); // set interval in milliseconds, 100 = 100 milliseconds for 1 color of welcome text
    </script>
</div>
</body>
</html>

<script>
    localStorage.setItem("currentUser", '<?php echo $currentUser; ?>');
    let currentUser = localStorage.getItem("currentUser");
    document.getElementById("nav-username").textContent = currentUser;
    if (currentUser === "admin")
        document.getElementById("user-management").style.display = "block";
</script>