(function(){
	var site = {
		ready: function() {
			var listeners = ['click', 'touch'];
			for (var i = 0, len = listeners.length; i < len; i++) {
				document.addEventListener(listeners[i], site.onClick);
			}
		},
		onClick: function(event) {
			//si on a cliqué dans le top menu
			if(event.target.closest('#top-menu')) site.topMenuBar.onClick(event)
		}
	}

	site.topMenuBar = {
		onClick: function(event) {
			//S'il s'agit du burger
			var burger = event.target.closest('#burger');
			if(burger) {
				event.preventDefault();
				burger.previousElementSibling.classList.toggle('active');
				return false;
			}

			//Si jamais on a cliqué sr le lien "en cours"
			var currentA = event.target.closest('a.current');
			if(currentA) {
				event.preventDefault();
				return false;	
			}
		}
	}

	document.addEventListener("DOMContentLoaded", site.ready);
})();