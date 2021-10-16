<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveLaterController extends Controller
{
    public function destroy($id){
        Cart::instance('saveForLater')->remove($id);

        return redirect()->back()->with('msg', 'item has been removed from saved later items');
    }
    public function moveToCart($id)
    {
        

        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($dubl->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is save for later');
        }
        
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        return redirect()->back()->with('msg', 'Item has been moved to cart');
    }
}
