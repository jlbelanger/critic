import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import boldIcon from '@ckeditor/ckeditor5-basic-styles/theme/icons/bold.svg';

const BOLD = 'bold';

export default class BoldUI extends Plugin {
	static get pluginName() {
		return 'BoldUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add bold button to feature components.
		editor.ui.componentFactory.add(BOLD, (locale) => {
			const command = editor.commands.get(BOLD);
			const view = new ButtonView(locale);

			view.set({
				label: t('Bold'),
				icon: boldIcon,
				keystroke: 'CTRL+B',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(BOLD);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
