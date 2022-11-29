<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteSubscribers extends Model
{
    protected $table = 'website_subscribers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'is_active',
    ];
}
