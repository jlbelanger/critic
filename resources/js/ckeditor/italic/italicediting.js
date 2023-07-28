import AttributeCommand from '@ckeditor/ckeditor5-basic-styles/src/attributecommand';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

const ITALIC = 'italic';

export default class ItalicEditing extends Plugin {
	static get pluginName() {
		return 'ItalicEditing';
	}

	init() {
		const editor = this.editor;
		// Allow italic attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: ITALIC });
		editor.model.schema.setAttributeProperties(ITALIC, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: ITALIC,
			view: 'i',
			upcastAlso: [],
		});

		// Create italic command.
		editor.commands.add(ITALIC, new AttributeCommand(editor, ITALIC));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+I', ITALIC);
	}
}
