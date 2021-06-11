<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    protected $table = 'user_details';
    protected $fillable = [
        'user_id','address', 'phone',
    ];
    /**
     * Get the user that owns the user_detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
