import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import strongIcon from './strong.svg';

const STRONG = 'strong';

export default class StrongUI extends Plugin {
	static get pluginName() {
		return 'StrongUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add strong button to feature components.
		editor.ui.componentFactory.add(STRONG, (locale) => {
			const command = editor.commands.get(STRONG);
			const view = new ButtonView(locale);

			view.set({
				label: t('Strong'),
				icon: strongIcon,
				keystroke: 'CTRL+G',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(STRONG);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
