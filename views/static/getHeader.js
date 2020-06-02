var ajax = new XMLHttpRequest();
ajax.open("GET", "static/header.html", false);
ajax.send();
var header = document.getElementsByTagName('head')[0]
header.innerHTML += ajax.responseText;