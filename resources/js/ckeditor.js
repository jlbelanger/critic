import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import AutoImage from '@ckeditor/ckeditor5-image/src/autoimage';
import AutoLink from '@ckeditor/ckeditor5-link/src/autolink';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import Bold from './ckeditor/bold';
import Cite from './ckeditor/cite';
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import Code from '@ckeditor/ckeditor5-basic-styles/src/code';
import CodeBlock from '@ckeditor/ckeditor5-code-block/src/codeblock';
import Emphasis from './ckeditor/emphasis';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport';
import Heading from '@ckeditor/ckeditor5-heading/src/heading';
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize';
import ImageTextAlternative from '@ckeditor/ckeditor5-image/src/imagetextalternative';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import Indent from '@ckeditor/ckeditor5-indent/src/indent';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Link from '@ckeditor/ckeditor5-link/src/link';
import List from '@ckeditor/ckeditor5-list/src/list';
import Small from './ckeditor/small';
import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Strong from './ckeditor/strong';
import Table from '@ckeditor/ckeditor5-table/src/table';
import WordCount from '@ckeditor/ckeditor5-word-count/src/wordcount';

const ready = (callback) => {
	if (document.readyState !== 'loading') {
		callback();
	} else {
		document.addEventListener('DOMContentLoaded', callback);
	}
};

ready(() => {
	const elem = document.getElementById('content');
	if (elem) {
		ClassicEditor
			.create(
				elem,
				{
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
