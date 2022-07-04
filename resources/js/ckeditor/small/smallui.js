import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import smallIcon from './small.svg';

const SMALL = 'small';

export default class SmallUI extends Plugin {
	static get pluginName() {
		return 'SmallUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add small button to feature components.
		editor.ui.componentFactory.add(SMALL, (locale) => {
			const command = editor.commands.get(SMALL);
			const view = new ButtonView(locale);

			view.set({
				label: t('Small'),
				icon: smallIcon,
				keystroke: 'CTRL+SHIFT+S',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(SMALL);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
