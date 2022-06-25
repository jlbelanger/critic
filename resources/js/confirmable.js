function Confirmable($form) {
	$form.addEventListener('submit', (e) => {
		const message = e.target.getAttribute('data-confirmable');
		if (!window.confirm(message)) { // eslint-disable-line no-alert
			e.preventDefault();
			return false;
		}
		return true;
	}, true);
}

function initConfirmable() {
	const $elements = document.querySelectorAll('[data-confirmable]');
	$elements.forEach(($element) => {
		Confirmable($element);
	});
}

initConfirmable();
