function show_menu(val)
{
	if(val == 1)
	{
		document.getElementById('btn-menu').removeAttribute('onclick');
		document.getElementById('btn-menu').setAttribute('onclick','show_menu(2)');
		document.getElementById('menu2').style.display = "inline-block";
	}
	else
	{
		document.getElementById('btn-menu').removeAttribute('onclick');
		document.getElementById('btn-menu').setAttribute('onclick','show_menu(1)');
		document.getElementById('menu2').style.display = "none";
	}
}