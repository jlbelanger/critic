function setToday() {
	document.getElementById('start_date').value = new Date().toLocaleString().substring(0, 10);
}

function initToday() {
	const $elem = document.querySelector('[data-action="today"]');
	if ($elem) {
		$elem.addEventListener('click', setToday);
	}
}

initToday();
