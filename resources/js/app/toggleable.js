function Toggleable($button) {
	const showElement = ($element) => {
		$button.setAttribute('aria-expanded', 'true');
		$element.classList.remove('hide');
		return $button.getAttribute('data-toggleable-hide');
	};

	const hideElement = ($element) => {
		$button.setAttribute('aria-expanded', 'false');
		$element.classList.add('hide');
		return $button.getAttribute('data-toggleable-show');
	};

	const onClick = () => {
		const selector = $button.getAttribute('data-toggleable');
		const $elements = document.querySelectorAll(selector);

		Array.from($elements).forEach(($element) => {
			let text;

			if ($element.classList.contains('hide')) {
				text = showElement($element);
			} else {
				text = hideElement($element);
			}

			if (text) {
				$button.innerText = text;
			}
		});
	};

	const init = () => {
		$button.addEventListener('click', onClick);
	};

	init();
}

function initToggleable() {
	const $elements = document.querySelectorAll('[data-toggleable]');
	$elements.forEach(($element) => {
		Toggleable($element);
	});
}

initToggleable();
