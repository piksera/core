<?php

namespace PikseraPackages\View;

class PikseraBladeDirectives
{
    public static function module($expression)
    {

        return <<<EOT
<?php
echo app()->parser->process("<module ".app()->format->arrayToHtmlAttributes($expression)." />");
?>
EOT;
    }
}
