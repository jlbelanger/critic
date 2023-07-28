import ItalicEditing from './italic/italicediting';
import ItalicUI from './italic/italicui';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

export default class Italic extends Plugin {
	static get requires() {
		return [ItalicEditing, ItalicUI];
	}

	static get pluginName() {
		return 'Italic';
	}
}
