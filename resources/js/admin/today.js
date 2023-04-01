function pad(n, width = 2, z = '0') {
	z = z || '0';
	n = n.toString();
	return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function setToday() {
	const date = new Date();
	const ymd = `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())}`;
	document.getElementById('start_date').value = ymd;
}

function initToday() {
	const $elem = document.querySelector('[data-action="today"]');
	if ($elem) {
		$elem.addEventListener('click', setToday);
	}
}

initToday();
