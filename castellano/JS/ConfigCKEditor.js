function ConfigCKEditor()
{	
	CKEDITOR.replace( 'TAInfoContacte',
		{
		toolbar : 
			[
            		['Styles', 'Format'],
            		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', '-', 'About']
        		]
 
    		} );
}