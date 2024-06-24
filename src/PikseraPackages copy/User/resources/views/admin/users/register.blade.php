<!DOCTYPE html>
<html <?php print lang_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <script>
        mwAdmin = true;
        admin_url = '<?php print admin_url(); ?>';
    </script>
        @php
        $siteTitle = app()->option_manager->get('website_title', 'website');

        @endphp
        <title>Register - {{ $siteTitle }}</title>

<?php include template_dir() . "header.php"; ?>

<module type="users/register" template="auth/register" />

