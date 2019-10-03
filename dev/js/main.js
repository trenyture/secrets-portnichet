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
			site.checkOpenedDate();
		},
		onClick: function(event) {
			//si on a cliqué dans le top menu
			if(event.target.closest('#top-menu')) site.topMenuBar.onClick(event);
		},
		checkOpenedDate: function() {
			var month = new Date().getMonth();
			var stopPopup = window.localStorage.getItem('stopPopup');
			if(!stopPopup && (month >= 9 || month < 3)) {
				Swal.fire({
					title: 'Attention',
					text: "Les Secrets de Pornichet sont fermés pour l'hiver mais nous serons de retour en Avril 2020 pour mener l'enquête !",
					type: 'warning',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ok'
				}).then(function(result) {
					if (result.value) {
						window.localStorage.setItem('stopPopup', 1);
					}
				});
			}
		},
	};

	site.topMenuBar = {
		onClick: function(event) {
			//S'il s'agit du burger
			var burger = event.target.closest('#burger');
			if(burger) {
				event.preventDefault();
				burger.previousElementSibling.classList.toggle('active');
				return false;
			}
		}
	};

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
	};

	document.addEventListener("DOMContentLoaded", site.ready);
})();