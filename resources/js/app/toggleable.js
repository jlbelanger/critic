const showElement = ($button, $element) => {
	$button.setAttribute('aria-expanded', 'true');
	$element.classList.remove('toggle-hide');
	return $button.getAttribute('data-toggleable-hide');
};

const hideElement = ($button, $element) => {
	$button.setAttribute('aria-expanded', 'false');
	$element.classList.add('toggle-hide');
	return $button.getAttribute('data-toggleable-show');
};

const onClick = (e) => {
	const $button = e.target;
	const selector = $button.getAttribute('data-toggleable');
	const $elements = document.querySelectorAll(selector);

	Array.from($elements).forEach(($element) => {
		let text;

		if ($element.classList.contains('toggle-hide')) {
			text = showElement($button, $element);
		} else {
			text = hideElement($button, $element);
		}

		if (text) {
			$button.innerText = text;
		}
	});
};

export const initToggleable = () => {
	const $buttons = document.querySelectorAll('[data-toggleable]');
	$buttons.forEach(($button) => {
		$button.addEventListener('click', onClick);
	});
};
