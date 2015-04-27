<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 18.03.2015
 * Time: 2:34
 */
?>
<script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/admin/Scripts/scripts.js"></script>
<script type="text/javascript" src="/admin/Scripts/debugScript.js"></script>
<script type="text/javascript" src="/admin/Scripts/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".editor",
        theme: "modern",
        plugins: [
            "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | preview | l      ink image media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
</script>