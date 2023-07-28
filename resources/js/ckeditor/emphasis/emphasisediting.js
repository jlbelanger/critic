import AttributeCommand from '@ckeditor/ckeditor5-basic-styles/src/attributecommand';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';

const EMPHASIS = 'emphasis';

export default class EmphasisEditing extends Plugin {
	static get pluginName() {
		return 'EmphasisEditing';
	}

	init() {
		const editor = this.editor;
		// Allow emphasis attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: EMPHASIS });
		editor.model.schema.setAttributeProperties(EMPHASIS, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: EMPHASIS,
			view: 'em',
			upcastAlso: [],
		});

		// Create emphasis command.
		editor.commands.add(EMPHASIS, new AttributeCommand(editor, EMPHASIS));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+E', EMPHASIS);
	}
}
