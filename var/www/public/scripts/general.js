function checkLogout()
{
        if(confirm("Are you sure you want to logout?"))
              	return true;
       	else
       	        return false;
}

function isHovered(e)
{
        return e.parentNode.querySelector(":hover") === e;
}

function redirectTo(loc)
{
	window.location.replace(loc);
}

/*function malert(var message)
{
	var box = document.getElementById("alertbox");
	
	box.classList.add('active');
	
	var h = document.createElement("H1");
	var t = document.createTextNode(message);
	h.appendChild(t);
	box.appendChild(h);
}*/
