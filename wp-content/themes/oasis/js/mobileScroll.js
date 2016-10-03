document.addEventListener("DOMContentLoaded", function(){	
	if(document.body.clientWidth < 768 && window.location.pathname !== '/') {
		var y = document.querySelector('.content').offsetTop - 50;
		var step = y/30;
		scrollTo(0, step, y);
	}
	function scrollTo(to, step, y) {
		if(to >= y) {
			return;
		}
		setTimeout(function(){
			to += step;
			window.scrollTo(0, to);
			scrollTo(to, step, y);
		}, 15);
	}
})