import BoldEditing from './bold/boldediting.js';
import BoldUI from './bold/boldui.js';
import { Plugin } from 'ckeditor5';

export default class Bold extends Plugin {
	static get requires() {
		return [BoldEditing, BoldUI];
	}

	static get pluginName() {
		return 'Bold';
	}
}
