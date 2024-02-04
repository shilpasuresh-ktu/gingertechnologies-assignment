<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);
        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
        ];
        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.cart', compact('cart'));
    }

    public function sendToWhatsApp()
    {

        $cart = session()->get('cart', []);

        $message = "Your Cart:\n\n";
        foreach ($cart as $id => $item) {
            $message .= "{$item['name']} - PID #{$item['id']}\n";
        }
        $encoded_message = urlencode($message);
        $whatsapp_url = "https://api.whatsapp.com/send?text={$encoded_message}";

        return redirect($whatsapp_url);
    }
}
