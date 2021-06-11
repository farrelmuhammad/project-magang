<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    protected $fillable=[
        'status','user_id','product_id' 
      ];
      /**
       * Get the user that owns the order
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
       */
      public function user()
      {
          return $this->belongsTo('App\User');
      }
      /**
       * Get the product that owns the order
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
       */
      public function product()
      {
          return $this->belongsTo('App\product');
      }
}
