var url = window.location.href
var regex = /id=(\d*)/;
var id = url.match(regex);

if (id != null) {
	id = id[1];
	var xmlhttp = new XMLHttpRequest();
	var url = "/api/api.php?location=" + id;

	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        // var myArr = this.responseText;
	        var myArr = JSON.parse(this.responseText);
	        console.log(myArr);
	        loadUp(myArr);
	    }
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	function loadUp(posts) {
		var container = document.getElementById("container");

		for (i in posts) {
			var id = posts[i].id;
			var from = posts[i].start;
			var to = posts[i].end;
			var note = posts[i].note;
			var date = posts[i].date;
			post = new Post(id, from, to, note, date);
			container.appendChild(post.node);
			// console.log(post);
		}
	}
}
