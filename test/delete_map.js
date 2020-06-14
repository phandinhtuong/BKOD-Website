function update(tourid, timeid) {
    var x1 = document.getElementById("end_time");
    var x2 = document.getElementById("building");
    var x3 = document.getElementById("class");
                
    var y = document.getElementById("start_time");
    
    var z = y.options[y.selectedIndex].text;
    var z2 = y.options[y.selectedIndex].value;
    
    var foo = z.substring(0,2);
    foo = parseInt(foo);
    foo += 1;
    var foo2 = z.substring(2);
            
    x1.innerHTML = foo.toString() + foo2;

    var x = new XMLHttpRequest();

    x.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            // document.getElementById("start_time").innerHTML = this.responseText;  

        }
    }

    x.open("GET", "get_building_class_by_time.php?tourid=" + tourid + "&timeid=" + timeid, true);
    x.send();
}