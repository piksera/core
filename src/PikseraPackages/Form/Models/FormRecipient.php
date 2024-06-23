<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/piksera/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FormRecipient extends Model
{
    use Notifiable;

    public $table = 'forms_recipients';
}
