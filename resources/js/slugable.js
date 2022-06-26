function Slugable($slugInput) {
	const inputSelectors = $slugInput.getAttribute('data-slug').split(',');
	const $inputs = document.querySelectorAll(inputSelectors);

	const toSlug = () => {
		const values = [];
		$inputs.forEach(($input) => {
			if ($input.name === 'end_release_year' && $input.value === values.at(-1)) {
				return;
			}
			values.push($input.value);
		});
		return slugify(values.join('-'));
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
