import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import AttributeCommand from '@ckeditor/ckeditor5-basic-styles/src/attributecommand';

const BOLD = 'bold';

export default class BoldEditing extends Plugin {
	static get pluginName() {
		return 'BoldEditing';
	}

	init() {
		const editor = this.editor;
		// Allow bold attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: BOLD });
		editor.model.schema.setAttributeProperties(BOLD, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: BOLD,
			view: 'b',
			upcastAlso: [],
		});

		// Create bold command.
		editor.commands.add(BOLD, new AttributeCommand(editor, BOLD));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+B', BOLD);
	}
}
