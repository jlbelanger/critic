import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import EmphasisEditing from './emphasis/emphasisediting';
import EmphasisUI from './emphasis/emphasisui';

export default class Emphasis extends Plugin {
	static get requires() {
		return [EmphasisEditing, EmphasisUI];
	}

	static get pluginName() {
		return 'Emphasis';
	}
}
