import { Plugin } from 'ckeditor5';
import SmallEditing from './small/smallediting.js';
import SmallUI from './small/smallui.js';

export default class Small extends Plugin {
	static get requires() {
		return [SmallEditing, SmallUI];
	}

	static get pluginName() {
		return 'Small';
	}
}
