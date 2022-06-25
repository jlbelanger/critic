function Slugable($slugInput) {
	const inputSelectors = $slugInput.getAttribute('data-slug').split(',');
	const $inputs = document.querySelectorAll(inputSelectors);

	const toSlug = () => {
		const value = [];
		$inputs.forEach(($input) => {
			value.push($input.value);
		});
		return value.join('-')
			.toLowerCase()
			.replace(/ & /g, '-and-')
			.replace(/<[^>]+>/g, '')
			.replace(/['’.]/g, '')
			.replace(/[^a-z0-9-]+/g, '-')
			.replace(/^-+/, '')
			.replace(/-+$/, '')
			.replace(/--+/g, '-');
	};

	const onChangeInput = () => {
		$slugInput.value = toSlug();
	};

	const init = () => {
		Array.from($inputs).forEach(($input) => {
			$input.addEventListener('keyup', onChangeInput);
		});
	};

	init();
}

function initSlugable() {
	const $elements = document.querySelectorAll('[data-slug]');
	$elements.forEach(($element) => {
		Slugable($element);
	});
}

initSlugable();
