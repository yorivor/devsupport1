/*var deleteLog = false;
$(document).ready(function() {
	$('#pagepiling').pagepiling({
		menu: '#menu',
		anchors: ['home', 'about'],
		navigation: {
			'position': 'right',
			'tooltips': ['Home', 'About Us']
		},
	    loopTop: true,
	    loopBottom: true
	});
});
*/

$('#hm').click(function() {
    var clickedele = $(this).attr("href");
    var desti = $(clickedele).offset().top;
   $('html, body').animate({ scrollTop: desti-15}, 'slow');
    return false;
});

$('#abt').click(function() {
    var clickedele = $(this).attr("href");
    var desti = $(clickedele).offset().top;
   $('html, body').animate({ scrollTop: desti-15}, 'slow');
    return false;
});

$(".nano").nanoScroller();

/**				Outages			**/
function outage(val) {
	if(val == 2){
		document.getElementById('outage-box').style.display = "block";
	}
	else if(val == 1)
	{
		document.getElementById('outage-box').style.display = "none";
	}
}

/**				About			**/
function about(val) {
	if(val == 1){
		document.getElementById("btnwe").className = "abt-btnwe-active";
		document.getElementById("btnva").className = "abt-btnva";
		document.getElementById("btnbr").className = "abt-btnbr";
		document.getElementById("btnmi").className = "abt-btnmi";
		document.getElementById("btnvi").className = "abt-btnvi";
		document.getElementById('whoweare').style.display = "block";
		document.getElementById('whatwevalues').style.display = "none";
		document.getElementById('ourbrand').style.display = "none";
		document.getElementById('ourmission').style.display = "none";
		document.getElementById('ourvision').style.display = "none";
	}
	else if(val == 2)
	{
		document.getElementById("btnwe").className = "abt-btnwe";
		document.getElementById("btnva").className = "abt-btnva-active";
		document.getElementById("btnbr").className = "abt-btnbr";
		document.getElementById("btnmi").className = "abt-btnmi";
		document.getElementById("btnvi").className = "abt-btnvi";
		document.getElementById('whoweare').style.display = "none";
		document.getElementById('whatwevalues').style.display = "block";
		document.getElementById('ourbrand').style.display = "none";
		document.getElementById('ourmission').style.display = "none";
		document.getElementById('ourvision').style.display = "none";
	}
	else if(val == 3)
	{
		document.getElementById("btnwe").className = "abt-btnwe";
		document.getElementById("btnva").className = "abt-btnva";
		document.getElementById("btnbr").className = "abt-btnbr-active";
		document.getElementById("btnmi").className = "abt-btnmi";
		document.getElementById("btnvi").className = "abt-btnvi";
		document.getElementById('whoweare').style.display = "none";
		document.getElementById('whatwevalues').style.display = "none";
		document.getElementById('ourbrand').style.display = "block";
		document.getElementById('ourmission').style.display = "none";
		document.getElementById('ourvision').style.display = "none";
	}
	else if(val == 4)
	{
		document.getElementById("btnwe").className = "abt-btnwe";
		document.getElementById("btnva").className = "abt-btnva";
		document.getElementById("btnbr").className = "abt-btnbr";
		document.getElementById("btnmi").className = "abt-btnmi-active";
		document.getElementById("btnvi").className = "abt-btnvi";
		document.getElementById('whoweare').style.display = "none";
		document.getElementById('whatwevalues').style.display = "none";
		document.getElementById('ourbrand').style.display = "none";
		document.getElementById('ourmission').style.display = "block";
		document.getElementById('ourvision').style.display = "none";
	}
	else if(val == 5)
	{
		document.getElementById("btnwe").className = "abt-btnwe";
		document.getElementById("btnva").className = "abt-btnva";
		document.getElementById("btnbr").className = "abt-btnbr";
		document.getElementById("btnmi").className = "abt-btnmi";
		document.getElementById("btnvi").className = "abt-btnvi-active";
		document.getElementById('whoweare').style.display = "none";
		document.getElementById('whatwevalues').style.display = "none";
		document.getElementById('ourbrand').style.display = "none";
		document.getElementById('ourmission').style.display = "none";
		document.getElementById('ourvision').style.display = "block";
	}
}