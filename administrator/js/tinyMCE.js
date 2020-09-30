tinyMCE.init({
    language : 'pt_BR',
    selector:"textarea",
        plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor",
   ],
    file_browser_callback:function(d,a,b,c){
        tinyMCE.activeEditor.windowManager.open({file:"../includes/kcfinder/browse.php?&refresh=yes&lang=pt&opener=tinymce4&field="+d+"&type="+b+"&dir="+b+"/public",title:"Imagens",
            width:700,
            height:500,
            inline:true,
            close_previous:false
        },
        {
            window:c,input:d});return false
    }})