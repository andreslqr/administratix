import EditorJS from '@editorjs/editorjs'; 
import header from '@editorjs/header';
import link from '@editorjs/link';
import raw from '@editorjs/raw';
import simpleImage from '@editorjs/simple-image';
import checkList from '@editorjs/checklist';
import list from '@editorjs/list';
import quote from '@editorjs/quote';
import delimiter from '@editorjs/delimiter';
import table from '@editorjs/table';
import warning from '@editorjs/warning';
import paragraph from '@editorjs/paragraph';
import marker from '@editorjs/marker';
import inlineCode from '@editorjs/inline-code';

window.Editor = EditorJS;

window.editorPlugins = {
    header,
    link,
    raw,
    simpleImage,
    checkList,
    list,
    quote,
    delimiter,
    table,
    warning,
    paragraph,
    marker,
    inlineCode,
};