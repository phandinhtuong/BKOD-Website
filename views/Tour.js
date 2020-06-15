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
                addBtn.onclick = addOneTour;
                li.appendChild(addBtn);
            }
            var tourID = [];
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
                    tourID[i] = xmlDoc.getElementsByTagName("tourID")[i].childNodes[0].nodeValue;
                    var editBtn = document.createElement("button");
                    editBtn.textContent = "Edit tour";
                    editBtn.setAttribute('class', 'button');
                    editBtn.setAttribute('onclick', 'editOneTour(' + tourID[i] + ')');
                    li.appendChild(editBtn);

                    var deleteButton = document.createElement("button");
                    deleteButton.setAttribute('class', 'button');
                    deleteButton.textContent = "Delete tour";
                    deleteButton.onclick = deleteOneTour;
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
function addOneTour() {
    alert('TODO: Add one tour ');
}
function displayOneTour() {
    // console.log("WHY?");
    // alert('TODO: Display one tour');
    window.location.href = "../test/display_map.php";
    // alert("after redirection");
}

function editOneTour(tourID) {
    //input: tour id to edit
    //this function is used to edit one tour
//    alert('TODO: Edit one tour ' + tourID);
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "editTour";
    $tourID = tourID;

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

            // remove old tours list
            var oldLi = document.getElementById('tours-list');
            document.getElementById('main').removeChild(oldLi);


            var ul = document.createElement('ul');
            ul.setAttribute('id', 'tours-list');
//            ul.setAttribute('id','tours-list')

            document.getElementById('main').appendChild(ul);

//            let isAdmin = localStorage.getItem("currentUser") == "admin";
//            if (isAdmin) {
//                var li = document.createElement("li");
//                li.setAttribute('class', 'addButton');
//                ul.appendChild(li);
//
//                var addBtn = document.createElement("button");
//                addBtn.setAttribute('class', 'button');
//                addBtn.textContent = "Add tour";
//                addBtn.onclick = addOneTour;
//                li.appendChild(addBtn);
//            }
            //display all tours
            //
//            i = 0;
//            for (i = 0; i < xmlDoc.getElementsByTagName("tour").length; i++) {
//                var li = document.createElement("li");
            var li = document.createElement("li");
            li.setAttribute('class', 'tour');
//            li.setAttribute("id","new");
//            li.setAttribute('class', 'item');
            ul.appendChild(li);
//            li.innerHTML = "111";
//                li.innerHTML = xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue;
//            var tourName = ;

            //"tour ID" part
            var spanTourID = document.createElement("span");
            spanTourID.innerHTML = 'Tour ID: ' + xmlDoc.getElementsByTagName("tourID")[0].childNodes[0].nodeValue;
            li.appendChild(spanTourID);


            //"name" text
            var spanName = document.createElement("span");
            spanName.innerHTML = '<br>Name: ';
            li.appendChild(spanName);

            //input name
            var inputName = document.createElement("input");
            inputName.setAttribute('id', 'name');
            inputName.setAttribute('size', '75');
            inputName.setAttribute('value', xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue);
            li.appendChild(inputName);


            //"state" text
            var spanState = document.createElement("span");
            spanState.innerHTML = '<br>State: ';
            li.appendChild(spanState);

            //input state
            var inputState = document.createElement("input");
            inputState.setAttribute('id', 'state');
            inputState.setAttribute('size', '75');
            inputState.setAttribute('value', xmlDoc.getElementsByTagName("state")[0].childNodes[0].nodeValue);
            li.appendChild(inputState);

            //"Image URL" text
            var spanImageUrl = document.createElement("span");
            spanImageUrl.innerHTML = '<br>Image URL: ';
            li.appendChild(spanImageUrl);

            //input Image URL
            var inputImageUrl = document.createElement("input");
            inputImageUrl.setAttribute('id', 'imageurl');
            inputImageUrl.setAttribute('size', '75');
            inputImageUrl.setAttribute('value', xmlDoc.getElementsByTagName("imageUrl")[0].childNodes[0].nodeValue);
            li.appendChild(inputImageUrl);

            //"Date" text
            var spanDate = document.createElement("span");
            spanDate.innerHTML = '<br>Date: ';
            li.appendChild(spanDate);

            //input date
            var inputDate = document.createElement("input");
            inputDate.setAttribute('id', 'date');
            inputDate.setAttribute('size', '75');
            inputDate.setAttribute('value', xmlDoc.getElementsByTagName("date")[0].childNodes[0].nodeValue);
            li.appendChild(inputDate);

            //"Map Image URL" text
            var spanMapImageURL = document.createElement("span");
            spanMapImageURL.innerHTML = '<br>Map Image URL: ';
            li.appendChild(spanMapImageURL);

            //input map image URL
            var inputMapImageURL = document.createElement("input");
            inputMapImageURL.setAttribute('id', 'mapimageurl');
            inputMapImageURL.setAttribute('size', '75');
            inputMapImageURL.setAttribute('value', xmlDoc.getElementsByTagName("mapImageUrl")[0].childNodes[0].nodeValue);
            li.appendChild(inputMapImageURL);
            
            
            //new line
            var spanNewLine = document.createElement("span");
            spanNewLine.innerHTML = '<br>';
            li.appendChild(spanNewLine);
            
            
            var UpdateBtn = document.createElement("button");
            UpdateBtn.textContent = "Update tour";
            UpdateBtn.setAttribute('class', 'button');
//            UpdateBtn.setAttribute('onclick', 'updateTour(' + tourID +','+document.getElementById('inputName')+','+document.getElementById('inputState')+
//                    ','+document.getElementById('inputImageUrl')+','+document.getElementById('inputDate')+','+document.getElementById('inputMapImageURL')+')');
            UpdateBtn.setAttribute('onclick','updateTour()');
            li.appendChild(UpdateBtn);

        }
    }
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q + "&tourID=" + $tourID, true);
    xmlHttp.send();

}
//function updateTour(tourID, name, state, imageUrl, date, mapImageUrl){
//    alert(tourID +" "+ name +" "+ state +" "+ imageUrl +" "+ date+" " + mapImageUrl);
//}
function updateTour(){
//    var li = document.getElementsByTagName("input");
    alert(document.getElementById('tours-list').getElementsByTagName('input')[0].value);
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