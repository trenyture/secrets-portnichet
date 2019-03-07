(function(){
	var site = {
		ready: function() {
			var listeners = ['click', 'touch'];
			for (var i = 0, len = listeners.length; i < len; i++) {
				document.addEventListener(listeners[i], site.onClick);
			}
			site.forms.submitsButton = document.getElementsByClassName('wpcf7-submit');
			if(site.forms.submitsButton.length > 0) {
				site.forms.customize();
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

	site.forms = {
		submitsButton: null,
		customize: function() {
			if(site.forms.submitsButton.length > 0) {
				var submits = Array.from(site.forms.submitsButton);
				for (var i = 0, len = submits.length; i < len; i++) {
					var button = document.createElement('button');
					button.type = submits[i].type;
					button.classList = submits[i].classList;
					button.innerHTML = submits[i].value;
					button.appendChild(submits[i].nextElementSibling);
					submits[i].parentNode.insertBefore(button, submits[i]);
					submits[i].remove();
				}
			}
		}
	}

	document.addEventListener("DOMContentLoaded", site.ready);
})();