<link rel="stylesheet" href="administrator/includes/blueimp/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="administrator/includes/blueimp/css/bootstrap-image-gallery.css">



<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left prev">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-primary next">
                        <i class="fa fa-chevron-right"></i>                      
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->
<script src="administrator/includes/blueimp/js/bootstrap.min.js"></script>
<script src="administrator/includes/blueimp/js/jquery.blueimp-gallery.min.js"></script>
<script src="administrator/includes/blueimp/js/bootstrap-image-gallery.js"></script>



<!--

<div id="links">
    <a href="images/banana.jpg" title="Banana" data-gallery>
        <img src="images/thumbnails/banana.jpg" alt="Banana">
    </a>
    <a href="images/apple.jpg" title="Apple" data-gallery>
        <img src="images/thumbnails/apple.jpg" alt="Apple">
    </a>
    <a href="images/orange.jpg" title="Orange" data-gallery>
        <img src="images/thumbnails/orange.jpg" alt="Orange">
    </a>
</div>
-->
