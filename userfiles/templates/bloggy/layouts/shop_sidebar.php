<div class="edit allow-drop" field="bloggy_shop_sidebar" rel="inherit">
    <div class="sidebar">
        <div class="sidebar__widget search-holder">
            <module type="search" data-search-type="shop"/>
        </div>

        <div class="sidebar__widget m-b-40">
            <h4 class="m-b-20"><?php _lang("Categories", "templates/bloggy"); ?></h4>

            <module type="categories" template="skin-1" content-id="<?php print PAGE_ID; ?>"/>
        </div>

        <div class="sidebar__widget m-b-40">
            <h4 class="m-b-20"><?php _lang("Tags", "templates/bloggy"); ?></h4>

            <module type="tags" template="skin-1"/>
        </div>

        <div class="sidebar__widget m-b-40">
            <h4 class="m-b-20"><?php _lang("About Us", "templates/bloggy"); ?></h4>
            <p>
                <?php _lang("We're a digital focussed collective working with individuals and businesses to establish rich, engaging online presences.", "templates/bloggy"); ?>
            </p>
        </div>
    </div>
</div>


