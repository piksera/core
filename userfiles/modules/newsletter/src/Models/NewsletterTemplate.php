<?php

namespace PikseraPackages\Modules\Newsletter\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterTemplate extends Model
{
    public $timestamps = true;

    protected $table = 'newsletter_templates';

    protected $fillable = [
        'title',
        'text',
    ];

}