function get_time_by_tour(id)
{
console.log("in function 1");
var x = new XMLHttpRequest();

x.onreadystatechange = function () {
console.log("in function 2");
// everything is working fine
if (this.readyState === 4 && this.status === 200) {
console.log(this.responseText);
document.getElementById("start_time").innerHTML = this.responseText;
}
};

x.open("GET", "get_time_by_tour.php?q=" + id, true);
x.send();
}

function get_class_by_building(id)
{
console.log("in function 1");
var x = new XMLHttpRequest();

x.onreadystatechange = function () {
console.log("in function 2");
// everything is working fine
if (this.readyState === 4 && this.status === 200) {
console.log(this.responseText);
document.getElementById("class").innerHTML = this.responseText;
}
};

x.open("GET", "get_class_by_building.php?q=" + id, true);
x.send();
}

function updateEndTime(start_time) {
    var x = document.getElementById("end_time");
                
    var y = document.getElementById("start_time");
    var z = y.options[y.selectedIndex].text;
                var foo = z.substring(0,2);
                foo = parseInt(foo);
                foo += 1;
                // alert(foo);

                var foo2 = z.substring(2);
                // alert(foo2);
                
                x.innerHTML = foo.toString() + foo2;
}