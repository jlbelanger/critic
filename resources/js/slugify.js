function slugify(value) { // eslint-disable-line no-unused-vars
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
}
