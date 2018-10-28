function deletePost(id, pw, cb, form) {
	var xmlhttp = new XMLHttpRequest();
	var url = "/api/api.php";

	response = xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        response = this.responseText;
	        console.log(response);
	       	cb(response, form);
	    }
	};
	xmlhttp.open("DELETE", url, true);
	var toSend = id+":"+pw;
	// console.log(toSend);
	xmlhttp.send(toSend);}

class Post{
	constructor(id, from, to, note) {
	    // Always call super first in constructor
	    // super();
	    this.id = id;
		this.from = from;
		this.to = to;
		this.note = note;

		// From
		var node_from = document.createElement("div");
		node_from.classList.add("from");
		var text_node_from = document.createTextNode(this.from.substring(0,5));
		node_from.appendChild(text_node_from);

		// To
		var node_to = document.createElement("div");
		node_to.classList.add("to");
		var text_node_to = document.createTextNode(this.to.substring(0,5));
		node_to.appendChild(text_node_to);

		// Time box
		var node_time_box = document.createElement("div");
		node_time_box.classList.add("time-box");
		node_time_box.appendChild(node_from);
		node_time_box.appendChild(node_to);

		// Notebox
		var node_note_box = document.createElement("div");
		node_note_box.classList.add("notebox");
		var text_node_note_box = document.createTextNode(this.note);
		node_note_box.appendChild(text_node_note_box);

		// Post-wrapper
		var node_post_wrapper = document.createElement("div");
		node_post_wrapper.classList.add("post-wrapper");
		node_post_wrapper.appendChild(node_time_box);
		node_post_wrapper.appendChild(node_note_box);
		node_post_wrapper.expand = function() {this.classList.toggle("expand")};
		node_post_wrapper.addEventListener("click", node_post_wrapper.expand);

		// Password input
		var node_input_password = document.createElement("input");
		node_input_password.setAttribute("type", "password");
		node_input_password.setAttribute("name", "pw");
		node_input_password.classList.add("input-password");
		node_input_password.classList.add("input");

		// Information
		var node_information = document.createElement("div");
		node_information.classList.add("information");

		// Delete button
		var node_delete_button = document.createElement("button");
		node_delete_button.setAttribute("id", this.id);
		node_delete_button.classList.add("post-delete-button");
		node_delete_button.classList.add("button");
		var text_node_delete_button = document.createTextNode("Törlés");
		node_delete_button.appendChild(text_node_delete_button);

		// Form
		var node_form = document.createElement("form");
		node_form.response = function(response, form) {
			// console.log(response);
			// console.log(form);
			var child_nodes = form.childNodes;
			if (response == "Ok") {
				location.reload();
			} else {
				var text_node_information = document.createTextNode(response);
				var info_box = child_nodes[1];
				if (info_box.childNodes.length > 0) {
					info_box.removeChild(info_box.childNodes[0]);
				}
				info_box.appendChild(text_node_information);
			}
		}
		node_form.submit = function() {
			// console.log(this);
			var child_nodes = this.childNodes;
			var input = child_nodes[0];
			var button = child_nodes[2];
			var pw = input.value;
			var id = button.id;
			// this.response("asd");
			deletePost(id, pw, this.response, this);
		};
		node_form.addEventListener("submit", node_form.submit);
		node_form.appendChild(node_input_password);
		node_form.appendChild(node_information);
		node_form.appendChild(node_delete_button);
		node_form.setAttribute("action", "");
		node_form.setAttribute("onsubmit", "return false");

		// Details
		var node_details = document.createElement("div");
		node_details.classList.add("details");
		node_details.appendChild(node_form);

		// Post container
		var node_post_container = document.createElement("div");
		node_post_container.classList.add("post-container");
		node_post_container.id = "post-" + this.id;
		node_post_container.appendChild(node_post_wrapper);
		node_post_container.appendChild(node_details);

		this.node = node_post_container;
  	}

  	get getNode() {
  		return this.node;
  	}
}
