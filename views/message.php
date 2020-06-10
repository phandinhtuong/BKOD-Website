<!DOCTYPE html>
<script src="static/getHeader.js"></script>
<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript">
    function submitChat() {
        if (form1.receiverId.value == '' || form1.message.value == '') {
            alert('ALL FIELDS ARE MANDATORY!!');
            return;
        }
        var receiverId = form1.receiverId.value;
        var message = form1.message.value;
        var xmlhttp2 = new XMLHttpRequest();

        xmlhttp2.onreadystatechange = function () {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById('chatlogs').innerHTML = xmlhttp2.responseText;
            }
        }
        xmlhttp2.open('POST', "../controllers/sendMessage.php?receiverId=" + receiverId + '&message=' + message + '&username=' + localStorage.getItem("currentUser"))
        xmlhttp2.send();
    }

    function doRefresh() {
        $("#chatlogs").load("../controllers/getMessages.php?username=" + localStorage.getItem('currentUser'));
    }
    $(function () {
        setInterval(doRefresh, 1000);
    });
</script>

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
    var xmlhttp1 = new XMLHttpRequest();
    xmlhttp1.open("GET", "../controllers/getMessengerUsers.php", true);
    xmlhttp1.send();
    xmlhttp1.onreadystatechange = function () {
        if (xmlhttp1.readyState == 4) {
            document.getElementById("leftcol").innerHTML = xmlhttp1.responseText;
        }
    }
        </script>
    </div>
    <div id="chatlogs">Message Section
        <script type="text/javascript">
            // show all messages
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "../controllers/getMessages.php?username=" + localStorage.getItem("currentUser"));
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;
                }
            }
        </script>
    </div>
    <div id="footer" align="center">Sending messages

        <form name=form1>
            <input type="text" name="receiverId" size="20" value="Enter your recipient ID.">
            <input type="text" name="message" size="150" value="Enter your message here.">
            <a href="#" onclick="submitChat()"> Send</a> <br>
        </form>

    </div>



</body>
</html>