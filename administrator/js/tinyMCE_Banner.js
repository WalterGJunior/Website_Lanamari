tinyMCE.init({
    language : 'pt_BR',
    selector:"textarea",
        plugins:"image",
    toolbar:"image",
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