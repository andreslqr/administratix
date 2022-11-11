import * as FilePond from 'filepond';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

window.FilePond = FilePond;

window.FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation
)