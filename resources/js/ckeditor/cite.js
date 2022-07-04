import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import CiteEditing from './cite/citeediting';
import CiteUI from './cite/citeui';

export default class Cite extends Plugin {
	static get requires() {
		return [CiteEditing, CiteUI];
	}

	static get pluginName() {
		return 'Cite';
	}
}
