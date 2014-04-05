$( document ).ready( function() {

    CKEDITOR.stylesSet.add('custom_style', [
        {name: 'Chapeau', element: 'div', attributes: {'class': 'chapeau'}}
    ]);

    CKEDITOR.config.allowedContent = true;

    var controller = document.URL.split('/');
    CKEDITOR.config.bodyClass = 'cke_'+controller[4];

    CKEDITOR.config.contentsCss = site_url+'/css/ckeditor.css';

    CKEDITOR.config.removePlugins = 'forms';

    CKEDITOR.config.format_tags = 'p;h4;h5;h6;div';

    CKEDITOR.config.tabSpaces = 4;

    CKEDITOR.config.autoParagraph = false;

    $('textarea:not(.mceNoEditor)' ).ckeditor({
        language: 'fr',
        stylesSet: 'custom_style'
    });





} );
