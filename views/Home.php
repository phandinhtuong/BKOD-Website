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
    <p align="center" style="font-size:200px">Welcome to BKOD Website</p>
    <script type="text/javascript">
        num = 0;
        function myFunc() {
            num++;
//            document.getElementById("main").innerHTML = "Called " + num % 10 + " times.";
//         document.getElementById("red").style.color = "red";
            switch (num % 10) {
                case 1 : document.getElementById("main").style.color = "red"; break;
                case 2 : document.getElementById("main").style.color = "green"; break;
                case 3 : document.getElementById("main").style.color = "blue"; break;
                case 4 : document.getElementById("main").style.color = "orange"; break;
                case 5 : document.getElementById("main").style.color = "gray"; break;
                case 6 : document.getElementById("main").style.color = "violet"; break;
                case 7 : document.getElementById("main").style.color = "black"; break;
                case 8 : document.getElementById("main").style.color = "yellow"; break;
                case 9 : document.getElementById("main").style.color = "lime"; break;
                case 0 : document.getElementById("main").style.color = "purple"; break;
                
            }
//            if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 10 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 2 == 0) {
//                document.getElementById("main").style.color = "red";
//            } else if (num % 2 == 0) {
//                document.getElementById("main").style.color = "red";
//            }
//            document.getElementById("main").innerHTML = "Called " + num + " times.";
//            document.myForm.outputField.value = "Called " + num + " times.";
        }
        window.setInterval("myFunc()", 100);
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