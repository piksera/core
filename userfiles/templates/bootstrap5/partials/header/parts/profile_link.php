
    <script>
        var $window = $(window), $document = $(document);
        $document.ready(function () {
            $('.js-register-modal').on('click', function () {
                $(".js-login-window").hide();
                $(".js-forgot-window").hide();
                $(".js-register-window").show();
            });
            $('.js-login-modal').on('click', function () {
                $(".js-register-window").hide();
                $(".js-forgot-window").hide();
                $(".js-login-window").show();
            });
        });
    </script>
    <li class="dropdown btn-member ms-4">
        <a href="#" class="dropdown-toggle btn btn-primary" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o d-none"></i><?php if (user_id()): ?><?php print user_name(); ?><?php else: ?><?php _e('Log in'); ?><?php endif; ?></a>
        <ul class="mw-big-dropdown dropdown-menu">
            <?php if (user_id()): ?>
                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal"><?php _lang("Profile", "templates/bootstrap5"); ?></a></li>
                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ordersModal"><?php _lang("My Orders"); ?></a></li>
            <?php else: ?>
                <li><a href="#" class="dropdown-item" class="js-login-modal" data-bs-toggle="modal" data-bs-target="#loginModal"><?php _lang("Login", "templates/bootstrap5"); ?></a></li>
                <li><a href="#" class="dropdown-item js-register-modal" data-bs-toggle="modal" data-bs-target="#loginModal"><?php _lang("Register", "templates/bootstrap5"); ?></a></li>
            <?php endif; ?>

            <?php if (is_admin()): ?>
                <li><a class="dropdown-item" href="<?php print admin_url() ?>"><?php _lang("Admin panel", "templates/bootstrap5"); ?></a></li>
            <?php endif; ?>

            <?php if (user_id()): ?>
                <li><a class="dropdown-item" href="<?php print logout_url() ?>"><?php _lang("Logout", "templates/bootstrap5"); ?></a></li>
            <?php endif; ?>
        </ul>
    </li>
