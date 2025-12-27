function showHideByType() {
	const val = document.getElementById('type').value;
	const $elements = document.querySelectorAll('[data-show-for-type]');
	$elements.forEach(($element) => {
		const types = $element.getAttribute('data-show-for-type').split(',');
		if (types.includes(val)) {
			$element.classList.remove('hide');
		} else {
			$element.classList.add('hide');
		}
	});
}

export const initShowForType = () => {
	const $type = document.getElementById('type');
	if ($type) {
		$type.addEventListener('change', showHideByType);
		showHideByType();
	}
};
