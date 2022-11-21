import EditorJS from '@editorjs/editorjs'; 
import Header from '@editorjs/header';
import Link from '@editorjs/link';
import Raw from '@editorjs/raw';
import Image from '@editorjs/simple-image';
import CheckList from '@editorjs/checklist';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Delimiter from '@editorjs/delimiter';
import Table from '@editorjs/table';

window.Editor = EditorJS;

window.editorPlugins = {
    header: Header,
    link: Link,
    raw: Raw,
    image: Image,
    checkList: CheckList,
    list: List,
    quote: Quote,
    delimeter: Delimiter,
    table: Table
};