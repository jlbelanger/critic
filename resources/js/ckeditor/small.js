import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import SmallEditing from './small/smallediting';
import SmallUI from './small/smallui';

export default class Small extends Plugin {
	static get requires() {
		return [SmallEditing, SmallUI];
	}

	static get pluginName() {
		return 'Small';
	}
}
