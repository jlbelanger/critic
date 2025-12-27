import { Plugin } from 'ckeditor5';
import StrongEditing from './strong/strongediting.js';
import StrongUI from './strong/strongui.js';

export default class Strong extends Plugin {
	static get requires() {
		return [StrongEditing, StrongUI];
	}

	static get pluginName() {
		return 'Strong';
	}
}
