function get_class_by_building(id)
{
    var x = new XMLHttpRequest();

    x.onreadystatechange = function () {
        // everything is working fine
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("class").innerHTML = this.responseText;
        }
    };

    x.open("GET", "get_class_by_building.php?q=" + id, true);
    x.send();
}

function displayEndTime() {
    var x = document.getElementById("endtime");
                
    var y = document.getElementById("StartTime");
    var z = y.options[y.selectedIndex].text;
                var foo = z.substring(0,2);
                foo = parseInt(foo);
                foo += 1;
                // alert(foo);

                var foo2 = z.substring(2);
                // alert(foo2);
                
                x.innerHTML = foo.toString() + foo2;
}