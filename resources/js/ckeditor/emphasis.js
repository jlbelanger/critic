import EmphasisEditing from './emphasis/emphasisediting';
import EmphasisUI from './emphasis/emphasisui';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

export default class Emphasis extends Plugin {
	static get requires() {
		return [EmphasisEditing, EmphasisUI];
	}

	static get pluginName() {
		return 'Emphasis';
	}
}
