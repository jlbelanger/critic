import { ButtonView, Plugin } from 'ckeditor5';
import italicIcon from './italic.svg';

const ITALIC = 'italic';

export default class ItalicUI extends Plugin {
	static get pluginName() {
		return 'ItalicUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add italic button to feature components.
		editor.ui.componentFactory.add(ITALIC, (locale) => {
			const command = editor.commands.get(ITALIC);
			const view = new ButtonView(locale);

			view.set({
				label: t('Italic'),
				icon: italicIcon,
				keystroke: 'CTRL+I',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(ITALIC);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
