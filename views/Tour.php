<!DOCTYPE html>
<script src="static/getHeader.js"></script>
<script src="Tour.js"></script>
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
<span id="name"> 1s</span>
<div id="main">
    <form>
    <script type="text/javascript">
        displayAllTours();
//           showTour();
    </script>
<!--        <select name="users" onchange="displayAllTours()">
            <option value="1">Peter Griffin</option>
            <option value="2">Lois Griffin</option>
            <option value="3">Glenn Quagmire</option>
            <option value="4">Joseph Swanson</option>
        </select>-->
    </form>

</div>
</body>
</html>