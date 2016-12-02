$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle2").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

document.getElementById("fromdatetimeInput").onchange = function(){
	document.getElementById("quantityInput").disabled = true;

};

document.getElementById("quantityInput").onchange = function(){
	document.getElementById("fromdatetimeInput").disabled = true;
};

document.getElementById("resetFormBtn").onclick = function(){
	document.getElementById("quantityInput").disabled = false;
	document.getElementById("fromdatetimeInput").disabled = false;
};



// document.getElementById("submitFormBtn").onclick = function(){
// 	var from = document.getElementById("fromdatetimeInput").value;
// 	var to = document.getElementById("todatetimeInput").value;
// 	var limit = document.getElementById("quantityInput").value;
// 	if ((!from) && (!to) && (!limit)) {
// 		alert("Δεν περιορίσατε τα αποτελέσματα.");
// 	};

// };