var btn = document.getElementById('submit');
btn.addEventListener("click", function() {
	var arr = {};
	arr.start = document.getElementById("from").value;
	arr.end = document.getElementById("to").value;
	arr.date = document.getElementById("date").value;
	arr.nk = document.getElementById("nk").value;
	arr.password = document.getElementById("pw").value;
	arr.note = document.getElementById("note").value;

	var url = window.location.href
	var regex = /id=(\d*)/;
	var id = url.match(regex)[1];
	arr.location = id;

	toSend = JSON.stringify(arr);
	
	var xmlhttp = new XMLHttpRequest();
	var url = "/api/api.php";

	response = xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        response = this.responseText;
	        console.log(response);
	    }
	};
	xmlhttp.open("PUT", url, true);
	xmlhttp.send(toSend);
	console.log(toSend);

});