import { AttributeCommand, Plugin } from 'ckeditor5';

const CITE = 'cite';

export default class CiteEditing extends Plugin {
	static get pluginName() {
		return 'CiteEditing';
	}

	init() {
		const editor = this.editor;
		// Allow cite attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: CITE });
		editor.model.schema.setAttributeProperties(CITE, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: CITE,
			view: 'cite',
			upcastAlso: [],
		});

		// Create cite command.
		editor.commands.add(CITE, new AttributeCommand(editor, CITE));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+SHIFT+K', CITE);
	}
}
