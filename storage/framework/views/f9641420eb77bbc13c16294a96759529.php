<script>
    mw.delete_single_post = function (id) {
        mw.tools.confirm("<?php _ejs("Are you sure want to delete?"); ?>?", function () {
            mw.post.del(id, function () {
                mw.$(".manage-post-item-" + id).fadeOut(function () {
                    $(this).remove()
                });
            });
        });
    }
</script>
<?php /**PATH /Users/yahyehassan/Documents/Core/src/MicroweberPackages/Content/resources/views/admin/content/index-scripts.blade.php ENDPATH**/ ?>