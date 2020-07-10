<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'body'];
    /**
     * undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function canEdit()
    {
        if ($this->user_id == auth()->id()) {
           return true; 
        }

        return false;
    }
    
}
