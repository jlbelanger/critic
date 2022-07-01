function Sortable($list) {
	let data = [];
	let currentKey = $list.getAttribute('data-sortable-default-key');
	let currentDirection = $list.getAttribute('data-sortable-default-dir') ? $list.getAttribute('data-sortable-default-dir') : 'asc';
	const $buttons = $list.querySelectorAll('[data-sortable-key]');
	const $container = $list.querySelector('[data-sortable-container]');
	const $items = $list.querySelectorAll('[data-sortable-item]');

	const getData = () => {
		$items.forEach(($item) => {
			const obj = {
				row: $item,
			};
			$item.querySelectorAll('td').forEach(($col) => {
				const key = $col.getAttribute('data-key');
				const value = $col.getAttribute('data-sortable-value') || $col.getAttribute('data-value') || $col.innerText.trim();
				obj[key] = value;
			});
			data.push(obj);
		});
	};

	const sortData = (key) => {
		data = data.sort((a, b) => {
			if (a[key] === '' && b[key] !== '') {
				return 1;
			}
			if (a[key] !== '' && b[key] === '') {
				return -1;
			}
			if (a[key] === b[key]) {
				return 0;
			}
			if (currentDirection === 'desc') {
				return a[key] < b[key] ? 1 : -1;
			}
			return a[key] < b[key] ? -1 : 1;
		});
	};

	const rearrangeRows = () => {
		$container.innerText = '';
		data.forEach((d) => {
			$container.appendChild(d.row);
		});
	};

	const onSort = (e) => {
		const oldClass = `sortable-button--${currentDirection}`;
		const $oldButtons = Array.from(document.getElementsByClassName(oldClass));
		$oldButtons.forEach(($oldButton) => {
			$oldButton.classList.remove(oldClass);
		});

		const $button = e.target;
		const key = $button.getAttribute('data-sortable-key');
		if (key === currentKey) {
			currentDirection = currentDirection === 'desc' ? 'asc' : 'desc';
		} else {
			currentDirection = 'asc';
		}
		$button.classList.add(`sortable-button--${currentDirection}`);
		sortData(key);
		rearrangeRows();
		currentKey = key;
	};

	const addListeners = () => {
		$buttons.forEach(($button) => {
			$button.addEventListener('click', onSort);
		});
	};

	const init = () => {
		getData();
		addListeners();

		const $button = $list.querySelector(`[data-sortable-key="${currentKey}"]`);
		$button.classList.add(`sortable-button--${currentDirection}`);
	};

	init();
}

function initSortable() {
	const $elements = document.querySelectorAll('[data-sortable-list]');
	$elements.forEach(($element) => {
		Sortable($element);
	});
}

initSortable();
