function init($cloud) {
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
			const fontSize = ((Math.log(val) / Math.log(max)) * (maxFontSize - minFontSize)) + minFontSize; // prettier-ignore
			$num.closest('li').style.fontSize = `${fontSize}px`;
		}
	});
}

export const initClouds = () => {
	const $clouds = document.querySelectorAll('.cloud');
	$clouds.forEach(($cloud) => {
		init($cloud);
	});
};
