function Cloudable($cloud) {
	const $nums = $cloud.querySelectorAll('.cloud__num');

	let max = 0;
	$nums.forEach(($num) => {
		const val = parseInt($num.innerText, 10);
		if (val > max) {
			max = val;
		}
	});

	const minFontSize = 10;
	const maxFontSize = 24;
	$nums.forEach(($num) => {
		const val = parseInt($num.innerText, 10);
		if (val) {
			const fontSize = (Math.log(val) / Math.log(max)) * (maxFontSize - minFontSize) + minFontSize;
			$num.closest('li').style.fontSize = `${fontSize}px`;
		}
	});
}

function initClouds() {
	const $elements = document.querySelectorAll('.cloud');
	$elements.forEach(($element) => {
		Cloudable($element);
	});
}

initClouds();
