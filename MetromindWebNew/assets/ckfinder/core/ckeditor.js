  1 ?/*
  2 Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
  3 For licensing, see LICENSE.html or http://ckeditor.com/license
  4 */
  5 
  6 /**
  7  * @fileOverview Contains the third and last part of the {@link CKEDITOR} object
  8  *		definition.
  9  */
 10 
 11 // Remove the CKEDITOR.loadFullCore reference defined on ckeditor_basic.
 12 delete CKEDITOR.loadFullCore;
 13 
 14 /**
 15  * Holds references to all editor instances created. The name of the properties
 16  * in this object correspond to instance names, and their values contains the
 17  * {@link CKEDITOR.editor} object representing them.
 18  * @type {Object}
 19  * @example
 20  * alert( <b>CKEDITOR.instances</b>.editor1.name );  // "editor1"
 21  */
 22 CKEDITOR.instances = {};
 23 
 24 /**
 25  * The document of the window holding the CKEDITOR object.
 26  * @type {CKEDITOR.dom.document}
 27  * @example
 28  * alert( <b>CKEDITOR.document</b>.getBody().getName() );  // "body"
 29  */
 30 CKEDITOR.document = new CKEDITOR.dom.document( document );
 31 
 32 /**
 33  * Adds an editor instance to the global {@link CKEDITOR} object. This function
 34  * is available for internal use mainly.
 35  * @param {CKEDITOR.editor} editor The editor instance to be added.
 36  * @example
 37  */
 38 CKEDITOR.add = function( editor )
 39 {
 40 	CKEDITOR.instances[ editor.name ] = editor;
 41 
 42 	editor.on( 'focus', function()
 43 		{
 44 			if ( CKEDITOR.currentInstance != editor )
 45 			{
 46 				CKEDITOR.currentInstance = editor;
 47 				CKEDITOR.fire( 'currentInstance' );
 48 			}
 49 		});
 50 
 51 	editor.on( 'blur', function()
 52 		{
 53 			if ( CKEDITOR.currentInstance == editor )
 54 			{
 55 				CKEDITOR.currentInstance = null;
 56 				CKEDITOR.fire( 'currentInstance' );
 57 			}
 58 		});
 59 };
 60 
 61 /**
 62  * Removes an editor instance from the global {@link CKEDITOR} object. This function
 63  * is available for internal use only. External code must use {@link CKEDITOR.editor.prototype.destroy}
 64  * to avoid memory leaks.
 65  * @param {CKEDITOR.editor} editor The editor instance to be removed.
 66  * @example
 67  */
 68 CKEDITOR.remove = function( editor )
 69 {
 70 	delete CKEDITOR.instances[ editor.name ];
 71 };
 72 
 73 /**
 74  * Perform global clean up to free as much memory as possible
 75  * when there are no instances left
 76  */
 77 CKEDITOR.on( 'instanceDestroyed', function ()
 78 	{
 79 		if ( CKEDITOR.tools.isEmpty( this.instances ) )
 80 			CKEDITOR.fire( 'reset' );
 81 	});
 82 
 83 // Load the bootstrap script.
 84 CKEDITOR.loader.load( 'core/_bootstrap' );		// @Packager.RemoveLine
 85 
 86 // Tri-state constants.
 87 
 88 /**
 89  * Used to indicate the ON or ACTIVE state.
 90  * @constant
 91  * @example
 92  */
 93 CKEDITOR.TRISTATE_ON = 1;
 94 
 95 /**
 96  * Used to indicate the OFF or NON ACTIVE state.
 97  * @constant
 98  * @example
 99  */
100 CKEDITOR.TRISTATE_OFF = 2;
101 
102 /**
103  * Used to indicate DISABLED state.
104  * @constant
105  * @example
106  */
107 CKEDITOR.TRISTATE_DISABLED = 0;
108 
109 /**
110  * The editor which is currently active (have user focus).
111  * @name CKEDITOR.currentInstance
112  * @type CKEDITOR.editor
113  * @see CKEDITOR#currentInstance
114  * @example
115  * function showCurrentEditorName()
116  * {
117  *     if ( CKEDITOR.currentInstance )
118  *         alert( CKEDITOR.currentInstance.name );
119  *     else
120  *         alert( 'Please focus an editor first.' );
121  * }
122  */
123 
124 /**
125  * Fired when the CKEDITOR.currentInstance object reference changes. This may
126  * happen when setting the focus on different editor instances in the page.
127  * @name CKEDITOR#currentInstance
128  * @event
129  * var editor;  // Variable to hold a reference to the current editor.
130  * CKEDITOR.on( 'currentInstance' , function( e )
131  *     {
132  *         editor = CKEDITOR.currentInstance;
133  *     });
134  */
135 

136 /**
137  * Fired when the last instance has been destroyed. This event is used to perform
138  * global memory clean up.
139  * @name CKEDITOR#reset
140  * @event
141  */
142 