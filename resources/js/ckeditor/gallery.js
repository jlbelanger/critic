import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import GalleryEditing from './gallery/galleryediting';
import GalleryUI from './gallery/galleryui';

export default class Gallery extends Plugin {
	static get requires() {
		return [GalleryEditing, GalleryUI];
	}

	static get pluginName() {
		return 'Gallery';
	}
}
