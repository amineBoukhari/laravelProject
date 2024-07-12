<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity'];

    /**
     * Remove a cart item by ID.
     *
     * @param  int  $id
     * @return bool|null
     */
    public static function remove($id)
    {
        $cartItem = self::find($id);
        if ($cartItem) {
            return $cartItem->delete();
        }
        return false;
    }
}
