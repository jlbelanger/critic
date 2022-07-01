export default (value) => {
	if (!value) {
		return '';
	}
	return value.toLowerCase()
		.replace(/ & /g, '-and-')
		.replace(/<[^>]+>/g, '')
		.replace(/['’.]/g, '')
		.replace(/[^a-z0-9-]+/g, '-')
		.replace(/^-+/, '')
		.replace(/-+$/, '')
		.replace(/--+/g, '-');
};
