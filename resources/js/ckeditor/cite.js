import CiteEditing from './cite/citeediting';
import CiteUI from './cite/citeui';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

export default class Cite extends Plugin {
	static get requires() {
		return [CiteEditing, CiteUI];
	}

	static get pluginName() {
		return 'Cite';
	}
}
