<!DOCTYPE html>
<head>
    <script src="static/getHeader.js"></script> <!-- header part -->
    <script src="../public/js/Tour.js"></script> <!-- javascript file for managing tour-->
    <link rel=stylesheet href="../public/css/Tour.css" type="text/css"> <!-- Tour style sheet -->
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["u"])) { //if the username session is not set, direct to index page
        header('Location: index.php');
        session_destroy();
    }
    ?>
    <div id="header">
        <p><h1>Tours list</h1></p>
</div>

<script src="static/getNavBar.js"></script> <!-- Navigation Bar -->
<div id="main"> <!-- main part to display everything -->
    <form>
        <script type="text/javascript">
            displayAllTours(); //display all tours
        </script>
    </form>
</div>
</body>
</html>