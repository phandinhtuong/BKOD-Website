<!DOCTYPE html>
<script src="static/getHeader.js"></script>

<html>
    <head>
        <title>MY Chat view</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            <!--
            body {
                margin: 0px;
                padding: 0px;
            }
            #leftcol {
                background: #f00;
                float: left;
                width: 20%;
                height: 500px;
            }
            #rightcol {
                background: #f00;
                float: right;
                width: 20%;
                height: 500px;
            }
            #content {
                background: #fff;
                float: left;
                width: 59%;
                height: 500px;
            }
            #footer {
                background: #0f0;
                float: right;
                clear: both;
                width: 100%;
                height: 100px;
            }
            -->
        </style>

    </head>
    <body>
        <div id="header">
            <p><h1>Messages</h1></p>
    </div>
    <script src="static/getNavBar.js"></script>
    <div id="leftcol">User
        <script type="text/javascript">
            // show all messages
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "../controllers/getAllUsers.php", true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    document.getElementById("leftcol").innerHTML = xmlhttp.responseText;
                }
            }
        </script>
    </div>
    <div id="content">Message Section
        <script type="text/javascript">
            // show all messages
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "../controllers/getAllMessages.php", true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    document.getElementById("content").innerHTML = xmlhttp.responseText;
                }
            }
        </script>
    </div>
    <div id="footer" align="center">Sending messages
        <form action="/test.php" method="POST">
            <input type="text" name="message" size="150" value="Enter your message here.">
                <input type="submit" value="Send">
        </form>

    </div>



</body>
</html>