<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

	protected $fillabel = [
            'user_id',
            'purchaser_name',
            'item_description',
            'item_price',
            'purchase_count',
            'merchant_address',
            'merchant_name',
        ];
        
        public function user()
        {
            return $this->belongsTo('App\User');
        }
}
