@bender-tags: bug, 4.6.2, trac16682, pastefromword
@bender-ui: collapsed
@bender-ckeditor-plugins: wysiwygarea, toolbar, undo, pastefromword, sourcearea, elementspath, list

1. Using Microsoft Word open/create a document with list (
   e.g. [`Unordered_list.docx`](https://github.com/ckeditor/ckeditor4/blob/master/tests/plugins/pastefromword/generated/_fixtures/Unordered_list/Unordered_list.docx)).
1. Select the whole list.
1. Paste it into CKEditor instance.

   **Expected:** List is pasted as semantic element.

   **Unexpected:** List is pasted as a set of paragraphs.
