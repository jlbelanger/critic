import EmphasisEditing from './emphasis/emphasisediting.js';
import EmphasisUI from './emphasis/emphasisui.js';
import { Plugin } from 'ckeditor5';

export default class Emphasis extends Plugin {
	static get requires() {
		return [EmphasisEditing, EmphasisUI];
	}

	static get pluginName() {
		return 'Emphasis';
	}
}
