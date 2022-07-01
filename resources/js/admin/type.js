function showHideByType() {
	const val = document.getElementById('type').value;
	const $elements = document.querySelectorAll('[data-show-for-type]');
	$elements.forEach(($element) => {
		if ($element.getAttribute('data-show-for-type').split(',').includes(val)) {
			$element.style.display = '';
		} else {
			$element.style.display = 'none';
		}
	});
}

function initShowForType() {
	const $type = document.getElementById('type');
	if ($type) {
		$type.addEventListener('change', showHideByType);
		showHideByType();
	}
}

initShowForType();
