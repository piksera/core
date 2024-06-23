<?php
/*
type: layout
name: Default
description: MW Default
*/
?>
    <style>
        .module-multilanguage-change-language .flag-icon {
            margin-right: 7px;
        }

        .module-multilanguage-change-language {
            display: inline-block;
        }
    </style>
<?php if (!empty($supported_languages)): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#switch_language_ul li').on('click', function () {
                var selected = $(this).data('value');
                var is_admin = <?php if (defined('MW_FRONTEND')) {
                    echo 0;
                } else {
                    echo 1;
                } ?>;
                $.post(mw.settings.api_url + "multilanguage/change_language", {locale: selected, is_admin: is_admin})
                    .done(function (data) {
                        if (data.refresh) {
                            if (data.location) {
                                window.location.href = data.location;
                            } else {
                                location.reload();
                            }
                        }
                    });
            });
            mw.dropdown();
        });
    </script>

    <script>
        mw.lib.require('flag_icons');
    </script>

    <style>
        .multilanguage-display-icon-custom {
            max-width: 18px;
            max-height: 18px;
            margin-right: 5px;
            margin-top:3px;
        }
    </style>

    <div class="mw-dropdown mw-dropdown-default">
    <span class="mw-dropdown-value btn btn-outline-primary mw-dropdown-val">

            <?php echo strtoupper(get_short_abr($current_language['locale'])); ?>

    </span>
        <div class="mw-dropdown-content">
            <ul id="switch_language_ul">
                <?php foreach ($supported_languages as $language): ?>
                    <li <?php if ($current_language['locale'] == get_short_abr($language['locale'])): ?> selected="" <?php endif; ?> data-value="<?php print $language['locale'] ?>" style="color:#000;">

                        <!-- custom display icon -->
                        <?php if (!empty($language['display_icon'])): ?>
                            <img src="<?php echo $language['display_icon']; ?>" class="multilanguage-display-icon-custom"/>
                        <?php else: ?>
                            <span class="flag-icon flag-icon-<?php echo $language['icon']; ?> m-r-10"></span>
                        <?php endif; ?>
                        <!--- end of display icon -->



                        <?php echo strtoupper(get_short_abr($language['locale'])); ?>

                    </li>
                <?php endforeach; ?>
                <?php if (isset($params['show_settings_link']) && $params['show_settings_link'] == true): ?>
                    <li style="color:#000;text-align: center;" onclick="window.location.href = '<?php echo admin_url() ?>view:modules/load_module:multilanguage';">
                        <?php _e('Settings'); ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
