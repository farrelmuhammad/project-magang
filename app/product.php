<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable=[
        'image','name','price','product_type','description','user_id','category_id'
    ];
    /**
     * Get the user that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * The category that belong to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo('App\categories');
    }
    /**
     * Get the order associated with the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\order');
    }
    /**
     * Get all of the review for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function review()
    {
        return $this->hasMany('App\review');
    }
}
