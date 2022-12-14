CKEDITOR.replace( 'description' );

$(function (){
    $(".colors_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    })
});
