function display(id) {
    var x1 = document.getElementById("endtime");
                
    var y = document.getElementById("StartTime");
    var z = y.options[y.selectedIndex].text;
    var foo = z.substring(0,2);
    foo = parseInt(foo);
    foo += 1;
 
    var foo2 = z.substring(2);
                
    x1.innerHTML = foo.toString() + foo2;
}

function buildingfunc(tourid, timeid)
{
    var x = new XMLHttpRequest();

    x.onreadystatechange = function () {
        // everything is working fine
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("building").innerHTML = this.responseText;
            console.log(this.responseText);
            // document.getElementById("input_building").value = this.responseText.getElementById("building").value;
        }
    };

    x.open("GET", "../../controllers/map/get.php?tourid=" + tourid + "&timeid=" + timeid, true);
    x.send();
}

function classroom(tourid, timeid)
{
    var x = new XMLHttpRequest();

    x.onreadystatechange = function () {
        // everything is working fine
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("class").innerHTML = this.responseText;
        }
    };

    x.open("GET", "../../controllers/map/get2.php?tourid=" + tourid + "&timeid=" + timeid, true);
    x.send();
}
