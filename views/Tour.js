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
//               document.getElementById("main").innerHTML = 1;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            //Response Text
//                document.getElementById("main").innerHTML = xmlHttp.responseText;
            //Response XML
            xmlDoc = xmlHttp.responseXML;
            
            document.getElementById("name").innerHTML =
                    xmlDoc.getElementsByTagName("tour").length;
            document.getElementById("main").innerHTML =
                    xmlDoc.getElementsByTagName("tourID")[0].childNodes[0].nodeValue;
//            document.getElementById("name").innerHTML =
//                    xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
        }
    }
    xmlHttp.open("GET", "../controllers/tourController.php?q=" + $q, true);
    xmlHttp.send();
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