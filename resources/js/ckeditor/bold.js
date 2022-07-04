import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import BoldEditing from './bold/boldediting';
import BoldUI from './bold/boldui';

export default class Bold extends Plugin {
	static get requires() {
		return [BoldEditing, BoldUI];
	}

	static get pluginName() {
		return 'Bold';
	}
}
