var pBtn = document.getElementById("plus-button");
pBtn.open = function() {
	var panel = document.getElementById("panel");
	panel.classList.add("open");
}
pBtn.addEventListener("click", pBtn.open);

var panel = document.getElementById("panel");
panel.close = function(e) {
	if (e.target !== this)
    	return;
	this.classList.remove("open");
}
panel.addEventListener("click", panel.close);