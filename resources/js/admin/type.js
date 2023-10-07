function showHideByType() {
	const val = document.getElementById('type').value;
	const $elements = document.querySelectorAll('[data-show-for-type]');
	$elements.forEach(($element) => {
		if ($element.getAttribute('data-show-for-type').split(',').includes(val)) {
			$element.classList.remove('hide');
		} else {
			$element.classList.add('hide');
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
