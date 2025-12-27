import ItalicEditing from './italic/italicediting.js';
import ItalicUI from './italic/italicui.js';
import { Plugin } from 'ckeditor5';

export default class Italic extends Plugin {
	static get requires() {
		return [ItalicEditing, ItalicUI];
	}

	static get pluginName() {
		return 'Italic';
	}
}
