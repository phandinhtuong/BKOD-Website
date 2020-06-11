<!DOCTYPE html>
<head>
    <script src="static/getHeader.js"></script>
    <script src="Tour.js"></script>
    <link rel=stylesheet href="static/Tour.css" type="text/css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["u"])) {
        header('Location: index.php');
        session_destroy();
    }
    ?>
    <div id="header">
        <p>
        <h1>Tours list</h1>
    </p>
</div>

<script src="static/getNavBar.js"></script>
<div id="main">
    <form>
        <script type="text/javascript">
            displayAllTours();
        </script>
    </form>

</div>
</body>
</html>