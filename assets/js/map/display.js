/** open a popup window and show user respective map with building and classroom */
function showMap(classroom, building, buildingID) {
    var myWindow = window.open("", "myWindow","width="+screen.availWidth+",height="+screen.availHeight);
    myWindow.document.write("<p>classroom: <b>" + classroom + "</b> of building: <b>" + building + "</b></p>");
    myWindow.document.write("<img src=../../assets/img/building" + buildingID + ".gif>");
    
    // myWindow.opener.document.write("<p>This is the source window!</p>");
}

/** toggle tour timeline */
function toggleDiv(tourid) {    
    var x = document.getElementById("myDIV" + tourid);
    // alert("myDiv" + tourid);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
    x.style.display = "none";
    }
}