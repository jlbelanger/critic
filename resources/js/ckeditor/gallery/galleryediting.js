import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import AttributeCommand from '@ckeditor/ckeditor5-basic-styles/src/attributecommand';

const GALLERY = 'gallery';

export default class GalleryEditing extends Plugin {
	static get pluginName() {
		return 'GalleryEditing';
	}

	init() {
		const editor = this.editor;
		// Allow gallery attribute on text nodes.
		editor.model.schema.extend('$text', { allowAttributes: GALLERY });
		editor.model.schema.setAttributeProperties(GALLERY, {
			isFormatting: true,
			copyOnEnter: true,
		});

		// Build converter from model to view for data and editing pipelines.
		editor.conversion.attributeToElement({
			model: GALLERY,
			view: 'gallery',
			upcastAlso: [],
		});

		// Create gallery command.
		editor.commands.add(GALLERY, new AttributeCommand(editor, GALLERY));

		// Set the keystroke.
		editor.keystrokes.set('CTRL+SHIFT+G', GALLERY);
	}
}
