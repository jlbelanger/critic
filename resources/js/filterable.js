function Filterable($list) {
	const $inputs = $list.querySelectorAll('[data-filterable-input]');
	const $items = $list.querySelectorAll('[data-filterable-item]');
	const $num = document.querySelector('[data-filterable-num]');
	const numTotalItems = $num ? parseInt($num.innerText.replace(',', ''), 10) : $items.length;

	const setNumItems = (numVisibleItems) => {
		if (numVisibleItems !== numTotalItems && numVisibleItems < numTotalItems) {
			$num.innerText = `${numVisibleItems.toLocaleString()} of ${numTotalItems.toLocaleString()}`;
		} else {
			$num.innerText = numTotalItems.toLocaleString();
		}
	};

	const afterFilter = () => {
		const numVisibleItems = $list.querySelectorAll('[data-filterable-item]:not([data-filter-hide^="("])').length;
		setNumItems(numVisibleItems);

		if (numVisibleItems <= 0) {
			$list.classList.add('no-results');
		} else {
			$list.classList.remove('no-results');
		}
	};

	const toSlug = (s) => (
		s.toLowerCase()
			.replace(/ & /g, '-and-')
			.replace(/<[^>]+>/g, '')
			.replace(/['’.]/g, '')
			.replace(/[^a-z0-9-]+/g, '-')
			.replace(/^-+/, '')
			.replace(/-+$/, '')
			.replace(/--+/g, '-')
	);

	const getValue = ($value) => {
		if ($value.getAttribute('data-value')) {
			return $value.getAttribute('data-value');
		}
		return toSlug($value.innerText);
	};

	const showItem = ($item, filterKey) => {
		const val = $item.getAttribute('data-filter-hide') || '';
		$item.setAttribute('data-filter-hide', val.replace(`(${filterKey})`, ''));
	};

	const hideItem = ($item, filterKey) => {
		const val = $item.getAttribute('data-filter-hide') || '';
		if (!val.includes(`(${filterKey})`)) {
			$item.setAttribute('data-filter-hide', `${val}(${filterKey})`);
		}
	};

	const onChangeInput = (e) => {
		const $input = e.target;
		const filterKey = $input.getAttribute('data-filterable-input');
		const isExact = $input.getAttribute('data-filterable-exact');
		const value = toSlug($input.value);
		$items.forEach(($item) => {
			const $element = $item.querySelector(`[data-key="${filterKey}"]`);
			if (!value || ($element && (isExact ? getValue($element) === value : getValue($element).indexOf(value) > -1))) {
				showItem($item, filterKey);
			} else {
				hideItem($item, filterKey);
			}
		});
		afterFilter();
	};

	const init = () => {
		$inputs.forEach(($input) => {
			$input.addEventListener('keyup', debounce(onChangeInput, 100)); // eslint-disable-line no-undef
			$input.addEventListener('change', onChangeInput);

			if ($input.value) {
				onChangeInput({ target: $input });
			}
		});
	};

	init();
}

function initFilterable() {
	const $elements = document.querySelectorAll('[data-filterable-list]');
	$elements.forEach(($element) => {
		Filterable($element);
	});
}

initFilterable();
