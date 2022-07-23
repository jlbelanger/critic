import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import galleryIcon from './gallery.svg';

const GALLERY = 'gallery';

export default class GalleryUI extends Plugin {
	static get pluginName() {
		return 'GalleryUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add gallery button to feature components.
		editor.ui.componentFactory.add(GALLERY, (locale) => {
			const command = editor.commands.get(GALLERY);
			const view = new ButtonView(locale);

			view.set({
				label: t('Gallery'),
				icon: galleryIcon,
				keystroke: 'CTRL+SHIFT+G',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(GALLERY);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
