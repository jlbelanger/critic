import AttributeCommand from '@ckeditor/ckeditor5-basic-styles/src/attributecommand';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

const STRONG = 'strong';

export default class StrongEditing extends Plugin {
	static get pluginName() {
		return 'StrongEditing';
	}

	init() {
		const editor = this.editor;
		// Allow strong attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: STRONG });
		editor.model.schema.setAttributeProperties(STRONG, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: STRONG,
			view: 'strong',
			upcastAlso: [],
		});

		// Create strong command.
		editor.commands.add(STRONG, new AttributeCommand(editor, STRONG));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+G', STRONG);
	}
}
