var posts = document.getElementsByClassName("post-wrapper");
for (var i = 0; i < posts.length; i++) {
	posts[i].toggleClass = function() {this.classList.toggle("expand")};
	posts[i].addEventListener('click', posts[i].toggleClass);
}