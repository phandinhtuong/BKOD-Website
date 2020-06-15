<?php
session_start(); //start session from the beginning
$username = null;
$password = null;
$registerSuccess = false;
if (isset($_SESSION["registerSuccess"])) { //if user just registered
    $username = $_SESSION["registerSuccess"]["username"]; //set username and password corresponding to what user registered
    $password = $_SESSION["registerSuccess"]["psw"];
    $registerSuccess = true;
} else {
    $username = "a@a.a"; // default username and password
    $password = "a";
}
?>
<html>
    <script src="static/getHeader.js"></script> <!-- header part -->
    <body>
        <form action="../controllers/loginController.php" method="post">
            <div id="header">
                <p>
                <h1>Log in to BKOD</h1>
                </p>
            </div>
            <?php
            if (isset($_SESSION["w"])) { //wrong username or password
                echo "<h2 align='center'>Wrong username or password.</h2>";
                unset($_SESSION["w"]);
                session_destroy();
            } else if (isset($_SESSION["u"])) { //unset username from the beginning
                unset($_SESSION["u"]);
                session_destroy();
            } else if ($registerSuccess) { //user just registered successfully
                echo "<h2 align='center'>Registered successfully!</h2>";
                unset($_SESSION["registerSuccess"]);
                session_destroy();
            }
            ?>
            <h2 align='center' id="regSuccess" style="display: none">Registered successfully!</h2>
            <div id="main">
                <input type="hidden" value="login" name="message">
                <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>
                <input type="password" name="password" id="psw" value="<?php echo $password ?>"><br>
                <input onchange="handleCheckboxChange(this)" type="checkbox" id="admin-login" name="admin-login" value="admin" style="height: unset;">
                <label for="admin-login"> Login as admin</label><br>
                <input type="submit" value="Log in">
                <br />
                <div style="font-size: 14px">Does not have an account? Click <a href="Register.html">here</a> to register.</div>
            </div>
        </form>
    </body>
</html>

<script>
    window.onload = () => {
        if (localStorage.getItem('regSuccess')) {
            let retrievedUser = localStorage.getItem('user');
            if (retrievedUser) {
                let user = JSON.parse(retrievedUser)
                document.getElementById("username").value = user.username;
                document.getElementById("psw").value = user.psw;
                document.getElementById("regSuccess").style.display = "block";
            }
            localStorage.removeItem("regSuccess");
        }
        localStorage.removeItem("currentUser");
    }

    let handleCheckboxChange = ele => {
        let usernameEle = document.getElementById("username")
        if (ele.checked) {
            usernameEle.value = "admin";
            usernameEle.setAttribute("readonly", true);
        } else {
            usernameEle.value = "a@a.a";
            usernameEle.removeAttribute("readonly");
        }
    }
</script>