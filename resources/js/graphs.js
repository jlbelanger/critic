const graphs = document.querySelectorAll('.graph');
graphs.forEach((graph) => {
	const bars = graph.querySelectorAll('.graph__bar');
	const height = bars[0].clientHeight;

	let max = 0;
	bars.forEach((bar) => {
		const val = parseInt(bar.innerText, 10);
		if (bar.innerText && val > max) {
			max = val;
		}
	});

	bars.forEach((bar) => {
		if (bar.innerText) {
			const val = parseInt(bar.innerText, 10);
			bar.style.height = `${(val / max) * height}px`;
		} else {
			bar.style.height = 0;
		}
	});
});
