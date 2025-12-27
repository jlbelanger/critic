import {
	Autoformat,
	AutoImage,
	AutoLink,
	BlockQuote,
	ClassicEditor,
	Code,
	CodeBlock,
	Essentials,
	GeneralHtmlSupport,
	Heading,
	HorizontalLine,
	Image,
	ImageCaption,
	ImageInsert,
	ImageResize,
	ImageTextAlternative,
	ImageToolbar,
	Indent,
	Italic,
	Link,
	List,
	SourceEditing,
	Strikethrough,
	Table,
	WordCount,
} from 'ckeditor5';
import Bold from './ckeditor/bold.js';
import Cite from './ckeditor/cite.js';
import Emphasis from './ckeditor/emphasis.js';
import Small from './ckeditor/small.js';
import Strong from './ckeditor/strong.js';

const ready = (callback) => {
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', callback);
	} else {
		callback();
	}
};

ready(() => {
	const elem = document.getElementById('content');
	if (elem) {
		ClassicEditor
			.create(
				elem,
				{
					licenseKey: 'GPL',
					plugins: [
						Autoformat,
						AutoImage,
						AutoLink,
						BlockQuote,
						Bold,
						Cite,
						Code,
						CodeBlock,
						Emphasis,
						Essentials,
						GeneralHtmlSupport,
						Heading,
						HorizontalLine,
						Image,
						ImageCaption,
						ImageInsert,
						ImageResize,
						ImageTextAlternative,
						ImageToolbar,
						Indent,
						Italic,
						Link,
						List,
						Small,
						SourceEditing,
						Strikethrough,
						Strong,
						Table,
						WordCount,
					],
					toolbar: {
						items: [
							'heading',
							'|',
							'bold', 'strong', 'italic', 'emphasis', 'strikethrough', 'small', 'code',
							'link',
							'|',
							'bulletedList', 'numberedList',
							'|',
							'outdent', 'indent',
							'-',
							'blockQuote', 'cite',
							'horizontalLine',
							'insertTable',
							'insertImage',
							'codeBlock',
							'sourceEditing',
						],
						shouldNotGroupWhenFull: true,
					},
					heading: {
						options: [
							{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
							{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
							{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
							{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
							{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
						],
					},
					htmlSupport: {
						allow: [
							{ name: 'cite' },
							{ name: 'small' },
							{ name: 'sub' },
							{
								name: 'img',
								attributes: {
									width: true,
									height: true,
								},
							},
						],
					},
					image: {
						toolbar: ['imageTextAlternative', 'toggleImageCaption'],
						resizeUnit: 'px',
					},
					link: {
						defaultProtocol: 'http://',
					},
				}
			)
			.then((editor) => {
				window.EDITOR = editor;
				const wordCountPlugin = editor.plugins.get('WordCount');
				const wordCountWrapper = document.getElementById('word-count');
				wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
			});
	}
});
