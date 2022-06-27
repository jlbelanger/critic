function Menu() {
	const $body = document.body;
	const $menuButton = document.getElementById('menu-button');

	const isMenuVisible = () => (
		$body.classList.contains('open-menu')
	);

	const closeMenu = () => {
		$body.classList.remove('open-menu');
	};

	const openMenu = () => {
		$body.classList.add('open-menu');
	};

	const toggleMenu = () => {
		if (isMenuVisible()) {
			closeMenu();
		} else {
			openMenu();
		}
	};

	const onDocumentKeyup = (e) => {
		if (e.key === 'Escape') {
			closeMenu();
		}
	};

	this.init = () => {
		$menuButton.addEventListener('click', toggleMenu);
		document.addEventListener('keyup', onDocumentKeyup);
	};
}

(new Menu()).init();
