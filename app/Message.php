<?php

namespace Realmessenger;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $casts = [
    	'writtenByMe' => 'boolean'
    ];
}
