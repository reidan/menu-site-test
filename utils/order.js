function incrementOrder(mealID, sizeID) {
    "use strict";
    var amtLabel = document.getElementById('amount-' + mealID.toString() + '-' + sizeID.toString());
    var amount = parseInt(amtLabel.innerHTML);
    amount += 1;
    amtLabel.innerHTML = amount.toString();
}

function decrementOrder(mealID, sizeID) {
    "use strict";
    var amtLabel = document.getElementById('amount-' + mealID.toString() + '-' + sizeID.toString());
    var amount = parseInt(amtLabel.innerHTML);
    amount -= 1;
    amtLabel.innerHTML = amount.toString();
}

function clearOrder(mealID, sizeID) {
    "use strict";
    var amtLabel = document.getElementById('amount-' + mealID.toString() + '-' + sizeID.toString());
    var amount = parseInt(amtLabel.innerHTML);
    amount = 0;
    amtLabel.innerHTML = amount.toString();
}

function loadCategory(category_id) {
	var request;
	if (window.XMLHttpRequest)
	{
		//General Browser support
		request = new XMLHttpRequest();
	} else {
		//Stupid old IE support
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	request.onreadystatechange=function()
	{
		if (request.readyState==4 && request.status==200)
		{
			document.getElementById("mealOptions").innerHTML=request.responseText;
		}
	}
	request.open("GET", "mealsByCategory.php?id=" + category_id, true);
	request.send();
}