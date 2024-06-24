<?php

namespace PikseraPackages\Piksera;

use PikseraPackages\Piksera\Traits\ManagesContent;
use PikseraPackages\Piksera\Traits\ManagesUrl;

//@todo move to manager class in seperate package
class Piksera
{
    use ManagesUrl;
    use ManagesContent;
}
