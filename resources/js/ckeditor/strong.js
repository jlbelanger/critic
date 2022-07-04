import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import StrongEditing from './strong/strongediting';
import StrongUI from './strong/strongui';

export default class Strong extends Plugin {
	static get requires() {
		return [StrongEditing, StrongUI];
	}

	static get pluginName() {
		return 'Strong';
	}
}
