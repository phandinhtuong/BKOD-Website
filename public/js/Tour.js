var xmlHttp; //global XML HTTP object
function displayAllTours() { // display all tours available in database
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp === null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "getAllTours"; // query string
    xmlHttp.onreadystatechange = function () { //readyState property of XML HTTP Request changes
        if (xmlHttp.readyState === 4) { //the operation is complete
            //Response XML
            var xmlDoc = xmlHttp.responseXML;

            // remove old tours list if exists
            var oldLi = document.getElementById('tours-list');
            if (oldLi !== null) {
                document.getElementById('main').removeChild(oldLi);
            }

            //new tours list
            var ul = document.createElement('ul');
            ul.setAttribute('id', 'tours-list');
            document.getElementById('main').appendChild(ul);

            //manage tour by admin : add tour button
            let isAdmin = localStorage.getItem("currentUser") === "admin";
            if (isAdmin) {
                var li = document.createElement("li");
                li.setAttribute('class', 'addButton');
                ul.appendChild(li);

                var addBtn = document.createElement("button"); //add new tour button
                addBtn.setAttribute('class', 'button');
                addBtn.textContent = "Add tour";
                addBtn.onclick = addOneTour; //direct to add tour function
                li.appendChild(addBtn);
            }

            var tourID = []; // tourID array to edit or delete tour
            //display all tours
            for (i = 0; i < xmlDoc.getElementsByTagName("tour").length; i++) {
                if (isAdmin || xmlDoc.getElementsByTagName("state")[i].childNodes[0].nodeValue.localeCompare("0") !== 0) { // if user is admin or state != 0
                    var li = document.createElement("li");
                    li.setAttribute('class', 'tour');
                    ul.appendChild(li);

                    //image of tour
                    var p = document.createElement("img");
                    p.setAttribute('width', 70);
                    p.setAttribute('height', 70);
                    p.setAttribute('src', xmlDoc.getElementsByTagName("imageUrl")[i].childNodes[0].nodeValue);
                    li.appendChild(p);

                    //assign tour ID
                    tourID[i] = xmlDoc.getElementsByTagName("tourID")[i].childNodes[0].nodeValue;

                    //name of tour
                    var tourName = document.createElement("span");
                    tourName.innerHTML = xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue;
                    tourName.setAttribute('class', 'tourName');
                    tourName.setAttribute('onclick', 'displayOneTour(' + tourID[i] + ')'); // click on tour name to display tour
                    li.appendChild(tourName);

                    //manage tour by admin : edit and delete tour buttons
                    if (isAdmin) {
                        var divBtn = document.createElement("div"); //div for buttons
                        divBtn.setAttribute('class', 'divBtn');
                        li.appendChild(divBtn);

                        var editBtn = document.createElement("button"); // edit tour button
                        editBtn.textContent = "Edit tour";
                        editBtn.setAttribute('class', 'button');
                        editBtn.setAttribute('onclick', 'getOneTourToEdit(' + tourID[i] + ')'); //click button to edit tour
                        divBtn.appendChild(editBtn);

                        var deleteButton = document.createElement("button"); //delete tour button
                        deleteButton.setAttribute('class', 'button');
                        deleteButton.textContent = "Delete tour";
//                    deleteButton.onclick = deleteOneTour;
                        deleteButton.setAttribute('onclick', 'deleteOneTour(' + tourID[i] + ')'); //click button to delete tour
                        divBtn.appendChild(deleteButton);
                    }
                }
            }
        }
    };
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q, true); // initialize XML HTTP Request
    xmlHttp.send(); // send request
}
function addOneTour() { // add new tour - just display to input properties of tour
    // remove old tours list
    var oldLi = document.getElementById('tours-list');
    document.getElementById('main').removeChild(oldLi);

    //new tours list - acctually 1 new tour
    var ul = document.createElement('ul');
    ul.setAttribute('id', 'tours-list');
    document.getElementById('main').appendChild(ul);

    var li = document.createElement("li");
    li.setAttribute('class', 'tour');
    ul.appendChild(li);

    //"name" text
    var spanName = document.createElement("span");
    spanName.innerHTML = '<br>Name: ';
    li.appendChild(spanName);

    //input name
    var inputName = document.createElement("input");
    inputName.setAttribute('id', 'name');
    inputName.setAttribute('size', '75');
    li.appendChild(inputName);

    //"state" text
    var spanState = document.createElement("span");
    spanState.innerHTML = '<br>State: ';
    li.appendChild(spanState);

    //input state
    var inputState = document.createElement("input");
    inputState.setAttribute('id', 'state');
    inputState.setAttribute('size', '75');
    li.appendChild(inputState);

    //"Image URL" text
    var spanImageUrl = document.createElement("span");
    spanImageUrl.innerHTML = '<br>Image URL: ';
    li.appendChild(spanImageUrl);

    //input Image URL
    var inputImageUrl = document.createElement("input");
    inputImageUrl.setAttribute('id', 'imageurl');
    inputImageUrl.setAttribute('size', '75');
    li.appendChild(inputImageUrl);

    //"Date" text
    var spanDate = document.createElement("span");
    spanDate.innerHTML = '<br>Date: ';
    li.appendChild(spanDate);

    //input date
    var inputDate = document.createElement("input");
    inputDate.setAttribute('id', 'date');
    inputDate.setAttribute('size', '75');
    li.appendChild(inputDate);

    //just new line
    var spanNewLine = document.createElement("span");
    spanNewLine.innerHTML = '<br>';
    li.appendChild(spanNewLine);

    // add button
    var addBtn = document.createElement("button");
    addBtn.textContent = "Add tour";
    addBtn.setAttribute('class', 'button');
    addBtn.setAttribute('onclick', 'insertTour()'); // direct to insert tour function
    li.appendChild(addBtn);

    //back button
    var backBtn = document.createElement("button");
    backBtn.textContent = "Back";
    backBtn.setAttribute('class', 'button');
    backBtn.setAttribute('onclick', 'displayAllTours()'); //back to display all tours
    li.appendChild(backBtn);
}
function displayOneTour(tourID) { // display one tour 
    // console.log("WHY?");
    // alert('TODO: Display one tour');
    var $tourID = tourID;
//    alert($tourID);
    window.location.href = "map/display.php?tourID=" + $tourID + " ";
    // alert("after redirection");
}

function getOneTourToEdit(tourID) { // edit one tour - just display to edit properties of tour
    //input: tour id to edit
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp === null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "getOneTourToEdit";
    var $tourID = tourID;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4) {
            var xmlDoc = xmlHttp.responseXML;
            // remove old tours list
            var oldLi = document.getElementById('tours-list');
            document.getElementById('main').removeChild(oldLi);

            var ul = document.createElement('ul');
            ul.setAttribute('id', 'tours-list');
            document.getElementById('main').appendChild(ul);

            var li = document.createElement("li");
            li.setAttribute('class', 'tour');
            ul.appendChild(li);

            //"tour ID" part
            var spanTourID = document.createElement("span");
            spanTourID.innerHTML = 'Tour ID: ' + $tourID;
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

            //just new line
            var spanNewLine = document.createElement("span");
            spanNewLine.innerHTML = '<br>';
            li.appendChild(spanNewLine);

            var addJourney = document.createElement("button");
            addJourney.setAttribute('class', 'button');
            addJourney.textContent = "Add Journey";
            addJourney.setAttribute('onclick', 'window.open("map/add.php?tourID='+$tourID+'", "myWindow","width="+screen.availWidth+",height="+screen.availHeight)');
            li.appendChild(addJourney);

            var updateJourney = document.createElement("button");
            updateJourney.setAttribute('class', 'button');
            updateJourney.textContent = "Update Journey";
            updateJourney.setAttribute('onclick', 'window.open("map/update.php?tourID='+$tourID+'", "myWindow","width="+screen.availWidth+",height="+screen.availHeight)');
            li.appendChild(updateJourney);

            var deleteJourney = document.createElement("button");
            deleteJourney.setAttribute('class', 'button');
            deleteJourney.textContent = "Delete Journey";
            deleteJourney.setAttribute('onclick', 'window.open("map/delete.php?tourID='+$tourID+'", "myWindow","width="+screen.availWidth+",height="+screen.availHeight)');
            li.appendChild(deleteJourney);

//          
            //just new line
            var spanNewLine = document.createElement("span");
            spanNewLine.innerHTML = '<br>';
            li.appendChild(spanNewLine);

            //update button
            var updateBtn = document.createElement("button");
            updateBtn.textContent = "Update tour";
            updateBtn.setAttribute('class', 'button');
            updateBtn.setAttribute('onclick', 'updateTour(' + $tourID + ')'); // direct to update tour function
            li.appendChild(updateBtn);

            //back button
            var backBtn = document.createElement("button");
            backBtn.textContent = "Back";
            backBtn.setAttribute('class', 'button');
            backBtn.setAttribute('onclick', 'displayAllTours()'); //back to display all tours
            li.appendChild(backBtn);
        }
    };
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q + "&tourID=" + $tourID, true);
    xmlHttp.send();
}
function insertTour() { //insert tour to database 
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp === null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "insertTour";

    // get tour properties from input text fields
    $name = document.getElementById('tours-list').getElementsByTagName('input')[0].value;
    $state = document.getElementById('tours-list').getElementsByTagName('input')[1].value;
    $imageURL = document.getElementById('tours-list').getElementsByTagName('input')[2].value;
    $date = document.getElementById('tours-list').getElementsByTagName('input')[3].value;

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4) {
            var xmlDoc = xmlHttp.responseXML;
            var result = xmlDoc.getElementsByTagName("result")[0].childNodes[0].nodeValue;
            displayAllTours();
            alert(result); //alert result of adding new tour
        }
    };
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q + "&name=" + $name
            + "&state=" + $state + "&imageURL=" + $imageURL + "&date=" + $date, true);
    xmlHttp.send();
}
function updateTour(tourID) { //update tour to database
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp === null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    $q = "updateTour";
    $tourID = tourID;

    // get tour properties from input text fields
    $name = document.getElementById('tours-list').getElementsByTagName('input')[0].value;
    $state = document.getElementById('tours-list').getElementsByTagName('input')[1].value;
    $imageURL = document.getElementById('tours-list').getElementsByTagName('input')[2].value;
    $date = document.getElementById('tours-list').getElementsByTagName('input')[3].value;

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4) {
            var xmlDoc = xmlHttp.responseXML;
            var result = xmlDoc.getElementsByTagName("result")[0].childNodes[0].nodeValue;
            alert(result); //alert result of updating tour
            editOneTour($tourID);
        }
    };
    xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q + "&tourID=" + $tourID + "&name=" + $name
            + "&state=" + $state + "&imageURL=" + $imageURL + "&date=" + $date, true);
    xmlHttp.send();
}
function deleteOneTour(tourID) { // delete tour
    //input: tour ID used to delete
    if (confirm('Delete tour with tourID = ' + tourID + '?')) { //confirm delete tour dialog
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp === null)
        {
            alert("Browser does not support HTTP Request");
            return;
        }
        $q = "deleteTour";
        $tourID = tourID;
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4) {
                var xmlDoc = xmlHttp.responseXML;
                var result = xmlDoc.getElementsByTagName("result")[0].childNodes[0].nodeValue;
                alert(result); //alert result of deleting tour
                displayAllTours();
            }
        };
        xmlHttp.open("GET", "../controllers/TourController/tourController.php?q=" + $q + "&tourID=" + $tourID, true);
        xmlHttp.send();

    }
}
function GetXmlHttpObject() //get XML HTTP object by XML HTTP Request or Active X object
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