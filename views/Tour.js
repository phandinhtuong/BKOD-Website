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
                li.setAttribute('class', 'tour');
                ul.appendChild(li);
                
                var addBtn = document.createElement("button");
                addBtn.textContent = "Add tour";
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

                //click on one tour to display 
                li.onclick = editOneTour();

                //change cursor when point to the tour
//                li.style.cursor = "pointer";
                //li.setAttribute('onclick',displayOneTour());

                //map image of tour
                var p = document.createElement("img");
                p.setAttribute('width', 70);
                p.setAttribute('height', 70);
//                p.setAttribute('src', 'http://htqt.hust.edu.vn/imgs/maphnen.jpg');
                p.setAttribute('src', xmlDoc.getElementsByTagName("mapImageUrl")[i].childNodes[0].nodeValue);

//                p.onclick = displayOneTour();
                li.appendChild(p);

                //name of tour
                var t = document.createElement("span");
                t.innerHTML = xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue;
                li.appendChild(t);
//                li.addEventListener('click',displayOneTour());
//                p.innerHTML = "e";
//                var ctx = p.getContext("2d");

                //test link of map image
//                var link = document.createElement("li");
//                link.setAttribute('class','tour');
//                ul.appendChild(link);
//                link.innerHTML = xmlDoc.getElementsByTagName("mapImageUrl")[i].childNodes[0].nodeValue;


            }

//            var li = document.createElement("li");
//            li.setAttribute('class','tour');
////            li.setAttribute("id","new");
////            li.setAttribute('class', 'item');
//            ul.appendChild(li);
//            li.innerHTML = "111";
//            li = document.createElement("li");
//            li.setAttribute('class','tour');
////            li.setAttribute("id","new");
////            li.setAttribute('class', 'item');
//            ul.appendChild(li);
//            li.innerHTML = "111";

//            document.getElementById("name").innerHTML =
//                    xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
        }
    }
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q, true);
    xmlHttp.send();
}

function displayOneTour() {
    alert('TODO: Display one tour');
}
function editOneTour() {

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