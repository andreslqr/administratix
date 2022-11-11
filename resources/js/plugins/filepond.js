import * as FilePond from 'filepond';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginPdfPreview from "filepond-plugin-pdf-preview";
import FilePondPluginMediaPreview from 'filepond-plugin-media-preview';

window.FilePond = FilePond;

window.FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginPdfPreview,
    FilePondPluginMediaPreview
)