var ajax = new XMLHttpRequest();
ajax.open("GET", "static/NavBar.html", false);
ajax.send();
document.body.innerHTML += ajax.responseText;
document.getElementById("nav-username").textContent = localStorage.getItem("currentUser");
if (localStorage.getItem("currentUser") === "admin")
        document.getElementById("user-management").style.display = "block";