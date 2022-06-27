function Toggleable() {
	const onClick = (e) => {
		const $button = e.target;
		const selector = $button.getAttribute('data-toggle');
		const $element = document.querySelector(selector);
		$element.classList.toggle('toggle-hidden');
		$element.classList.toggle('toggle-visible');
		if ($element.classList.contains('toggle-hidden')) {
			$button.innerText = $button.getAttribute('data-show-label');
		} else {
			$button.innerText = $button.getAttribute('data-hide-label');
		}
	};

	this.init = () => {
		const $elements = document.querySelectorAll('[data-toggle]');
		$elements.forEach(($element) => {
			$element.addEventListener('click', onClick);
		});
	};
}

(new Toggleable()).init();
