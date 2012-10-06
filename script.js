self.addEventListener('message', function(e) {
var data = e.data;

alert("Calling worker");
$('<img style="padding:5px 5px 5px 5px" />').attr("src", data).appendTo("#images");
}, false);