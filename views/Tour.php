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
}
?>

<body>
    <div id="header">
        <p>
        <h1>Tours list</h1>
    </p>
</div>

<script src="static/getNavBar.js"></script>
<div id="main">
    <script type="text/javascript">
//           function showTours(){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../controllers/getAllTours.php", true);
        xmlhttp.send();
//               document.getElementById("main").innerHTML = 1;
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                document.getElementById("main").innerHTML = xmlhttp.responseText;
            }
        }

//               xmlhttp.onreadystatechange = function(){
//                   if (xmlhttp.readyState == 4){
//                       
//                   }
//               }
//           }
//           showTour();
    </script>
    

</div>
</body>
</html>