<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
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
