<?php

namespace PikseraPackages\Microweber;

use PikseraPackages\Microweber\Traits\ManagesContent;
use PikseraPackages\Microweber\Traits\ManagesUrl;

//@todo move to manager class in seperate package
class Microweber
{
    use ManagesUrl;
    use ManagesContent;
}
