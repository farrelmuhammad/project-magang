<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'reviews';
    protected $fillable=[
        'user_id','product_id','score','description'
    ];
    /**
     * Get the user that owns the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the product that owns the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
