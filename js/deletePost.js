function deletePost(id, pw) {
	var xmlhttp = new XMLHttpRequest();
	var url = "/api/api.php?location=" + id;

	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        // var myArr = this.responseText;
	        var myArr = JSON.parse(this.responseText);
	        console.log(myArr);
	        // loadUp(myArr);
	    }
	};
	xmlhttp.open("DELETE", url, true);
	xmlhttp.send(id+":"+pw);
	
}