import '../../node_modules/ckeditor5/dist/ckeditor5.css';
import '../css/admin.css';
import { initAutocomplete } from './admin/autocomplete.js';
import { initBeforeUnload } from './admin/beforeunload.js';
import { initConfirmable } from './admin/confirmable.js';
import { initMenu } from './admin/menu.js';
import { initShowForType } from './admin/type.js';
import { initSlugable } from './admin/slugable.js';
import { initToday } from './admin/today.js';

initAutocomplete();
initBeforeUnload();
initConfirmable();
initMenu();
initShowForType();
initSlugable();
initToday();
