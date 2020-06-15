function display() {
    var x = document.getElementById("endtime");
                
    var y = document.getElementById("StartTime");
    var z = y.options[y.selectedIndex].text;
    var foo = z.substring(0,2);
    foo = parseInt(foo);
    foo += 1;
 
    var foo2 = z.substring(2);
                
    x.innerHTML = foo.toString() + foo2;
}