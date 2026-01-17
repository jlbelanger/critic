import debounce from '../utilities/debounce.js';
import slugify from '../utilities/slugify.js';

function autocomplete($container) {
	const url = $container.getAttribute('data-autocomplete');
	const name = $container.getAttribute('data-autocomplete-name');
	const $input = $container.querySelector('.autocomplete__input');
	const $clear = $container.querySelector('.autocomplete__clear');
	const $resultsContainer = $container.querySelector('.autocomplete__results');
	const $resultsList = $container.querySelector('.autocomplete__results-list');
	const $noResults = $container.querySelector('.autocomplete__results-none');
	const $selectedList = $container.querySelector('.autocomplete__selected-list');
	let lastSearchTerm = '';
	let selectedIndex = null;
	let isSearching = false;

	let selectedItems = $container.querySelector('[data-autocomplete-value]').value;
	if (selectedItems) {
		selectedItems = JSON.parse(selectedItems);
	}

	const hideResults = () => {
		$resultsContainer.classList.add('hide');
		$resultsList.innerText = '';
	};

	const showClear = () => {
		$container.classList.add('clearable');
	};

	const hideClear = () => {
		$container.classList.remove('clearable');
	};

	const removeSelectedItem = (e) => {
		const id = e.target.getAttribute('data-id');
		const $li = e.target.closest('li');
		$li.remove();
		$input.focus();

		const pos = selectedItems.findIndex((item) => item.id === id);
		if (pos > -1) {
			selectedItems.splice(pos, 1);

			if (selectedItems.length <= 0) {
				$selectedList.classList.add('hide');
			}
		}
	};

	const addSelectedItem = (item) => {
		const $li = document.createElement('li');
		$li.setAttribute('class', 'autocomplete__selected-item');

		const $hiddenInput = document.createElement('input');
		$hiddenInput.setAttribute('name', `${name}[]`);
		$hiddenInput.setAttribute('type', 'hidden');
		$hiddenInput.setAttribute('value', item.id);
		$li.appendChild($hiddenInput);

		const $a = document.createElement('a');
		$a.setAttribute('class', 'autocomplete__selected-link');
		$a.setAttribute('href', item.url);
		$a.innerText = item.title;
		$li.appendChild($a);

		const $button = document.createElement('button');
		$button.setAttribute('class', 'autocomplete__selected-button');
		$button.setAttribute('data-id', item.id);
		$button.setAttribute('type', 'button');
		$button.addEventListener('click', removeSelectedItem);
		$button.innerText = 'Remove';
		$li.appendChild($button);

		$selectedList.appendChild($li);
		$selectedList.classList.remove('hide');

		$input.value = '';
		lastSearchTerm = '';
		hideResults();
		hideClear();
	};

	const onClickResultButton = (e) => {
		let $button = e.target;
		if ($button.tagName !== 'BUTTON') {
			$button = $button.closest('button');
		}
		const item = {
			id: $button.getAttribute('data-id'),
			url: $button.getAttribute('data-url'),
			title: $button.innerText,
		};
		selectedItems.push(item);
		addSelectedItem(item);
		$input.focus();
	};

	const onMouseoverResultButton = (e) => {
		const $selectedListItem = document.querySelector('[data-selected]');
		$selectedListItem.removeAttribute('data-selected');

		const $newItem = e.target.closest('.autocomplete__results-item');
		$newItem.setAttribute('data-selected', 1);
		selectedIndex = parseInt($newItem.getAttribute('data-index'), 10);
	};

	const createResultItem = (i, item) => {
		const $li = document.createElement('li');
		$li.setAttribute('class', 'autocomplete__results-item');
		$li.setAttribute('data-index', i);
		if (i === 0) {
			$li.setAttribute('data-selected', 1);
			selectedIndex = i;
		}

		const $button = document.createElement('button');
		$button.setAttribute('class', 'autocomplete__results-button');
		$button.setAttribute('data-id', item.id);
		$button.setAttribute('data-url', item.url);
		$button.setAttribute('type', 'button');
		$button.innerText = item.title;
		$button.addEventListener('click', onClickResultButton);
		$button.addEventListener('mouseover', onMouseoverResultButton);
		$li.appendChild($button);

		return $li;
	};

	const searchTerms = (term) => {
		if (isSearching) {
			return;
		}

		isSearching = true;
		$container.classList.add('loading');

		fetch(`${url}${term}`)
			.then((response) => response.json())
			.then((response) => {
				$container.classList.remove('loading');
				let hasResults = false;
				let i = 0;
				$resultsList.innerText = '';

				response.items.forEach((row) => {
					// Do not show terms that have already been selected.
					const pos = selectedItems.findIndex((item) => item.id === row.id);
					if (pos > -1) {
						return;
					}

					const $li = createResultItem(i, row);
					$resultsList.appendChild($li);

					i += 1;
					hasResults = true;
				});

				$resultsContainer.classList.remove('hide');

				if (hasResults) {
					$noResults.classList.add('hide');
					$resultsList.classList.remove('hide');
					$resultsList.firstChild.scrollIntoView({ block: 'nearest' });
				} else {
					$noResults.classList.remove('hide');
					$resultsList.classList.add('hide');
				}

				isSearching = false;
			});
	};

	const onKeydownTerm = (e) => {
		if (e.key === 'Enter' && $input.value) {
			e.preventDefault();
		}
	};

	const onKeyupTerm = () => {
		const value = slugify($input.value);
		if (value) {
			showClear();
			if (value !== lastSearchTerm) {
				lastSearchTerm = value;
				searchTerms(value);
			}
		} else {
			hideClear();
			lastSearchTerm = '';
			hideResults();
		}
	};

	const areResultsVisible = () => $resultsContainer.style.display !== 'none';

	const onFocusInput = () => {
		const value = slugify($input.value);
		if (value && !areResultsVisible()) {
			searchTerms(value);
		}
	};

	const onKeyup = (e) => {
		if (!areResultsVisible()) {
			return;
		}

		let $selectedListItem = document.querySelector('[data-selected]');

		if (e.key === 'Enter') {
			if ($selectedListItem) {
				e.preventDefault();
				onClickResultButton({ target: $selectedListItem.querySelector('button') });
			}
		} else if (e.key === 'ArrowDown') {
			$selectedListItem.removeAttribute('data-selected');
			if (selectedIndex >= $resultsList.querySelectorAll('li').length - 1) {
				selectedIndex = 0;
			} else {
				selectedIndex += 1;
			}
			$selectedListItem = $resultsList.querySelector(`[data-index="${selectedIndex}"]`);
			$selectedListItem.setAttribute('data-selected', 1);
			$selectedListItem.scrollIntoView({ block: 'nearest' });
		} else if (e.key === 'ArrowUp') {
			$selectedListItem.removeAttribute('data-selected');
			if (selectedIndex > 0) {
				selectedIndex -= 1;
			} else {
				selectedIndex = $resultsList.querySelectorAll('li').length - 1;
			}
			$selectedListItem = $resultsList.querySelector(`[data-index="${selectedIndex}"]`);
			$selectedListItem.setAttribute('data-selected', 1);
			$selectedListItem.scrollIntoView({ block: 'nearest' });
		} else if (e.key === 'Escape') {
			hideResults();
			e.stopPropagation();
		}
	};

	const onClickClear = () => {
		$input.value = '';
		onKeyupTerm();
		$input.focus();
	};

	const init = () => {
		document.addEventListener('keyup', onKeyup, { capture: true });
		$input.addEventListener('keydown', onKeydownTerm);
		$input.addEventListener('keyup', debounce(onKeyupTerm, 250));
		$input.addEventListener('focus', onFocusInput);
		$clear.addEventListener('click', onClickClear);

		if (selectedItems.length > 0) {
			selectedItems.forEach((item) => {
				addSelectedItem(item);
			});
		}
	};

	init();
}

export const initAutocomplete = () => {
	const $elements = document.querySelectorAll('[data-autocomplete]');
	$elements.forEach(($element) => {
		autocomplete($element);
	});
};
