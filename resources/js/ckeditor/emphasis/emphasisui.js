import { ButtonView, Plugin } from 'ckeditor5';
import emphasisIcon from './emphasis.svg';

const EMPHASIS = 'emphasis';

export default class EmphasisUI extends Plugin {
	static get pluginName() {
		return 'EmphasisUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add emphasis button to feature components.
		editor.ui.componentFactory.add(EMPHASIS, (locale) => {
			const command = editor.commands.get(EMPHASIS);
			const view = new ButtonView(locale);

			view.set({
				label: t('Emphasis'),
				icon: emphasisIcon,
				keystroke: 'CTRL+E',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(EMPHASIS);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
