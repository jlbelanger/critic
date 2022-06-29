function Toggleable($button) {
	const onClick = () => {
		const selector = $button.getAttribute('data-toggle');
		const $toggleableElement = document.querySelector(selector);
		$toggleableElement.classList.toggle('toggle-hidden');
		$toggleableElement.classList.toggle('toggle-visible');
		if ($toggleableElement.classList.contains('toggle-hidden')) {
			$button.innerText = $button.getAttribute('data-show-label');
		} else {
			$button.innerText = $button.getAttribute('data-hide-label');
		}
	};

	const init = () => {
		$button.addEventListener('click', onClick);
	};

	init();
}

function initToggleable() {
	const $elements = document.querySelectorAll('[data-toggle]');
	$elements.forEach(($element) => {
		Toggleable($element);
	});
}

initToggleable();
