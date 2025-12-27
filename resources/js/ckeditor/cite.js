import CiteEditing from './cite/citeediting.js';
import CiteUI from './cite/citeui.js';
import { Plugin } from 'ckeditor5';

export default class Cite extends Plugin {
	static get requires() {
		return [CiteEditing, CiteUI];
	}

	static get pluginName() {
		return 'Cite';
	}
}
