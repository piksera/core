<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['url', 'lazyLoad' => false ]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['url', 'lazyLoad' => false ]); ?>
<?php foreach (array_filter((['url', 'lazyLoad' => false ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $rand = md5($url);
?>


<div class="preview_frame_wrapper preview_frame_wrapper_<?php echo e($rand); ?> loading left">
    <div class="preview_frame_container preview_frame_container_<?php echo e($rand); ?>"></div>

    <div class="card placeholder-glow mw-add-post-placeholder-loading">
        <div class="ratio ratio-21x9 card-img-top placeholder"></div>
        <div class="card-body">
            <div class="placeholder col-9 mb-3"></div>
            <div class="placeholder placeholder-xs col-10"></div>
            <div class="placeholder placeholder-xs col-11"></div>
            <div class="mt-3">
                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
            </div>
        </div>
    </div>

</div>

<style>
    .preview_frame_container_<?php echo e($rand); ?> {
        display:none;
    }
</style>

<style>
    .preview_frame_container{
        position: relative;
        overflow: hidden;
    }
    .preview_frame_container.preview-in-self {
        <?php if(isset($iframeHeight)): ?>
        height: <?php echo e($iframeHeight); ?>;
        <?php else: ?>
        height: calc(50vh - 80px);
        <?php endif; ?>
    }
    .preview_frame_container.preview-in-self iframe {
        height: calc(200vh - 160px) !important;
    }

    .preview_frame_container.preview-in-iframe {
        height: 800px;

    }
    .preview_frame_container.preview-in-iframe iframe {
        height: 1600px !important;
    }
    .preview_frame_wrapper{
        position: relative;
    }
    .preview_frame_wrapper .mw-spinner{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .preview_frame_container iframe {
        <?php if(isset($iframeWidth)): ?>
        width: <?php echo e($iframeWidth); ?>;
        <?php else: ?>
        width: 400%;
        <?php endif; ?>
        <?php if(isset($transformScale)): ?>
        transform: scale(<?php echo e($transformScale); ?>);
        <?php else: ?>
        transform: scale(0.25);
        <?php endif; ?>

        top: 0;
        position: absolute;
        left: 0;
        transform-origin: 0 0;
        border: 1px solid silver;
        transition: .3s;
    }
    .preview_frame_wrapper.has-mw-spinner iframe{
        opacity: 0;
    }


</style>

<script>
    mw.templatePreview<?php echo e($rand); ?> = {
        set: function () {
            var iframe = document.querySelector('.preview_frame_wrapper_<?php echo e($rand); ?> iframe');
            var framewindow = iframe.contentWindow;
            framewindow.scrollTo(0, 0);
        },
        afterLoad: function () {
            mw.templatePreview<?php print $rand; ?>.set();
            mw.$('.preview_frame_wrapper_<?php echo e($rand); ?> .mw-add-post-placeholder-loading').remove();
            mw.$('.preview_frame_container_<?php echo e($rand); ?>').show();
        },
        rend: function (url) {

            var holder = mw.$('.preview_frame_container_<?php echo e($rand); ?>');
            var wrapper = mw.$('.preview_frame_wrapper_<?php echo e($rand); ?>');

            if (self !== top ) {
                holder.addClass('preview-in-iframe');
            } else {
                holder.addClass('preview-in-self')
            }

            var frame = document.createElement('iframe');
            frame.src = url;
            frame.className = 'preview_frame_small';
            frame.id = 'preview_frame_wrapper_<?php echo e($rand); ?>_iframe';
            frame.tabIndex = -1;
            frame.frameborder = 0;
            frame.onload = function (ev) {
                mw.templatePreview<?php print $rand; ?>.afterLoad();
                this.contentWindow.document.documentElement.className = 'mw-template-document-preview';


            };
            holder.empty();
            holder.append(frame);
        },
        zoom: function (a) {
            if (typeof a == 'undefined') {
                var holder = mw.$('.preview_frame_wrapper_<?php echo e($rand); ?>');
                holder.toggleClass('zoom');
                if (holder[0] != null) {
                    var iframe = holder[0].querySelector('iframe');
                    if (iframe != null) {
                        iframe.contentWindow.scrollTo(0, 0);
                    }
                }
            }
            else if (a == 'out') {
                mw.$('.preview_frame_wrapper_<?php echo e($rand); ?>').removeClass('zoom');
            }
            else {
                mw.$('.preview_frame_wrapper_<?php echo e($rand); ?>').addClass('zoom');
            }
            mw.$('.preview_frame_wrapper_<?php echo e($rand); ?> iframe')[0].contentWindow.scrollTo(0, 0);
        }
    }
   // mw.templatePreview<?php echo e($rand); ?>.rend('<?php echo $url; ?>');
   // mw.templatePreview<?php echo e($rand); ?>.zoom();
</script>
<script>

     <?php if(isset($lazyLoad) and $lazyLoad): ?>
     $(window).on('load scroll', function () {
         if (mw.tools.inview(document.querySelector('.preview_frame_wrapper_<?php echo e($rand); ?>'))) {
             if(!document.getElementById('preview_frame_wrapper_<?php echo e($rand); ?>_iframe')){
                 mw.templatePreview<?php echo e($rand); ?>.rend('<?php echo $url; ?>');
             }
         }
     });




     <?php else: ?>
     $(window).on('load', function () {
         if(!document.getElementById('preview_frame_wrapper_<?php echo e($rand); ?>_iframe')){
             mw.templatePreview<?php echo e($rand); ?>.rend('<?php echo $url; ?>');
         }
     });
     <?php endif; ?>


</script>
<?php /**PATH /Users/yahyehassan/Documents/Bloggy/src/PikseraPackages/Page/resources/views/admin/page/iframe.blade.php ENDPATH**/ ?>