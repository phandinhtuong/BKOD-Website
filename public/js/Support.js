function load() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("selectMessage").value = document.getElementById("chatSelection").value;
            document.getElementById("chatlogs").innerHTML = xhttp.responseText;
            document.getElementById("receiver").value = document.getElementById("user").value;
        }
    };
    xhttp.open("POST", "../controllers/MessageController/getMessages.php?username=" + localStorage.getItem("currentUser") + "&selectedUserId=" + document.getElementById("user").value);
    xhttp.send();
}
setInterval(load, 1000);

function refreshSelection() {
//        document.getElementById("selectMessage").value = document.getElementById("chatSelection").value;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById('rightcol').innerHTML = request.responseText;
        }
    }
    request.open('POST', "../controllers/MessageController/getMessageInfo.php?messageId=" + document.getElementById("chatSelection").value);
    request.send();
}

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
    xmlhttp2.open('POST', "../controllers/MessageController/sendMessage.php?receiverId=" + receiverId + '&message=' + message + '&username=' + localStorage.getItem("currentUser"))
    xmlhttp2.send();
}

var xmlhttp1 = new XMLHttpRequest();
xmlhttp1.open("GET", "../controllers/MessageController/getAdmin.php", true);
xmlhttp1.send();
xmlhttp1.onreadystatechange = function () {
    if (xmlhttp1.readyState == 4) {
        document.getElementById("leftcol").innerHTML = xmlhttp1.responseText;
    }
}

