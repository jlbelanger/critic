import { ButtonView, Plugin } from 'ckeditor5';
import citeIcon from './cite.svg';

const CITE = 'cite';

export default class CiteUI extends Plugin {
	static get pluginName() {
		return 'CiteUI';
	}

	init() {
		const editor = this.editor;
		const t = editor.t;

		// Add cite button to feature components.
		editor.ui.componentFactory.add(CITE, (locale) => {
			const command = editor.commands.get(CITE);
			const view = new ButtonView(locale);

			view.set({
				label: t('Cite'),
				icon: citeIcon,
				keystroke: 'CTRL+SHIFT+K',
				tooltip: true,
				isToggleable: true,
			});

			view.bind('isOn', 'isEnabled').to(command, 'value', 'isEnabled');

			// Execute command.
			this.listenTo(view, 'execute', () => {
				editor.execute(CITE);
				editor.editing.view.focus();
			});

			return view;
		});
	}
}
