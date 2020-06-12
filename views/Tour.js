/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var xmlHttp;
function displayAllTours() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "getAllTours";

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            //Response Text
//                document.getElementById("main").innerHTML = xmlHttp.responseText;
            //Response XML
            var xmlDoc = xmlHttp.responseXML;

//            document.getElementById("name").innerHTML =
//                    xmlDoc.getElementsByTagName("tour").length;
//            document.getElementById("main").innerHTML =
//                    xmlDoc.getElementsByTagName("tourID")[0].childNodes[0].nodeValue;
            var ul = document.createElement('ul');
            ul.setAttribute('id', 'tours-list');
//            ul.setAttribute('id','tours-list')
            document.getElementById('main').appendChild(ul);

            let isAdmin = localStorage.getItem("currentUser") == "admin";
            if (isAdmin) {
                var li = document.createElement("li");
                li.setAttribute('class', 'addButton');
                ul.appendChild(li);

                var addBtn = document.createElement("button");
                addBtn.setAttribute('class', 'button');
                addBtn.textContent = "Add tour";
                addBtn.onclick=addOneTour;
                li.appendChild(addBtn);
            }
            //display all tours
            for (i = 0; i < xmlDoc.getElementsByTagName("tour").length; i++) {
//                var li = document.createElement("li");
                var li = document.createElement("li");
                li.setAttribute('class', 'tour');
//            li.setAttribute("id","new");
//            li.setAttribute('class', 'item');
                ul.appendChild(li);
//            li.innerHTML = "111";
//                li.innerHTML = xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue;


                //map image of tour
                var p = document.createElement("img");
                p.setAttribute('width', 70);
                p.setAttribute('height', 70);
//                p.setAttribute('src', 'http://htqt.hust.edu.vn/imgs/maphnen.jpg');
                p.setAttribute('src', xmlDoc.getElementsByTagName("mapImageUrl")[i].childNodes[0].nodeValue);

            //    p.onclick = displayOneTour();
                li.appendChild(p);

                //name of tour
                var tourName = document.createElement("span");
                tourName.innerHTML = xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue;
                tourName.setAttribute('class', 'tourName');
                //click on one tour to display 
                tourName.onclick = displayOneTour;

                li.appendChild(tourName);

                if (isAdmin) {
                    var editBtn = document.createElement("button");
                    editBtn.textContent = "Edit tour";
                    editBtn.setAttribute('class', 'button');
                    editBtn.onclick = editOneTour;
                    li.appendChild(editBtn);

                    var deleteButton = document.createElement("button");
                    deleteButton.setAttribute('class', 'button');
                    deleteButton.textContent = "Delete tour";
                    deleteButton.onclick=deleteOneTour;
                    li.appendChild(deleteButton);
                }
                //test link of map image
//                var link = document.createElement("li");
//                link.setAttribute('class','tour');
//                ul.appendChild(link);
//                link.innerHTML = xmlDoc.getElementsByTagName("mapImageUrl")[i].childNodes[0].nodeValue;

            }
        }
    }
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q, true);
    xmlHttp.send();
}
function addOneTour(){
    alert('TODO: Add one tour');
}
function displayOneTour() {
    // console.log("WHY?");
    // alert('TODO: Display one tour');
    window.location.href = "../test/display_map.php";
    // alert("after redirection");
}

function editOneTour() {
    alert('TODO: Edit one tour');
}
function deleteOneTour() {
    alert('TODO: Delete one tour');
}
function GetXmlHttpObject()
{
    var objXMLHttp = null;
    if (window.XMLHttpRequest)
    {
        objXMLHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject)
    {
        objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return objXMLHttp;
}