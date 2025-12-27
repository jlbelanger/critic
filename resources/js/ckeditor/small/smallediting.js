import { AttributeCommand, Plugin } from 'ckeditor5';

const SMALL = 'small';

export default class SmallEditing extends Plugin {
	static get pluginName() {
		return 'SmallEditing';
	}

	init() {
		const editor = this.editor;
		// Allow small attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: SMALL });
		editor.model.schema.setAttributeProperties(SMALL, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: SMALL,
			view: 'small',
			upcastAlso: [],
		});

		// Create small command.
		editor.commands.add(SMALL, new AttributeCommand(editor, SMALL));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+SHIFT+S', SMALL);
	}
}
