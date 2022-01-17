<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Delevery;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function orderView(Order $delivery)
    {
        $tovar= Product::all();
        $delivery = Order::all();
        return view('product.order',compact('delivery','tovar'));
    }

    public function viewView(Delevery $delevery)
    {
        $tovar= Product::all();
        $del = Delevery::all();
        return view('product.view', compact('delevery', 'del', 'tovar'));

    }

    public function view(Delevery $delevery,Order $orders)
    {
        $delevery = Delevery::all();
        $orders = Order::all();

        foreach ($delevery as $del) {
            if ($del->users_id == Auth::id()) {
                $data = ['address_id' => $del->address_id, 'products_id' => $del->products_id, 'users_id' => $del->users_id,'price'=>$del->price,'value'=>$del->value];
                Order::create($data);
                $del->where('users_id', Auth::id())->delete();
            }
            else return redirect()->route('/');
        }
        return redirect()->route('/');
    }


    public function formCart(Product $product, Delevery $delevery)
    {
        return view('product.formCart', compact('product', 'delevery'));
    }

    public function deleteProductView()
    {
        $delivery = Delevery::all();
        return view('users.deleteProd', compact('delivery'));
    }

    public function deleteView(Product $product, Delevery $delevery)
    {
        return view('users.delete', compact('product', 'delevery'));
    }

    public function delete(Product $product, Delevery $delevery, Request $request)
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        Schema::dropIfExists(Delevery::where('id',$product->id));      Удаление бд полностью
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $delevery->delete();
        return redirect()->route('/');
    }

    public function buyProductView(Product $product)
    {
        $addresses = Address::all();
        return view('product.buy', compact('product', 'addresses'));
    }

    public function buyProduct(Request $request, Product $product)
    {
        $request->validate([
            "address_id" => "required",
            "products_id" => "required",
            "users_id" => "required",
            "price" => "required",
            "value" => "required",
        ]);
        $price = 0;
        if ($request->address_id == 1) $price = 1000;
        if ($request->address_id == 2) $price = 2000;
        if ($request->address_id == 3) $price = 4000;
        $data = [
            'price' => $price + ($product->price * $request->value)
        ];
        $data += $request->only('address_id', 'products_id', 'users_id', 'value');
        Delevery::create($data);
        return redirect()->route('/');
    }

    public function mainView()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function addproductView()
    {
        return view('product.addproduct');
    }

    public function addproduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "photo" => "required|file|mimes:jpg,bmp,png,jpeg|max:10240",
            "description" => "required",
            "price" => "required",
            "weight" => "required",
        ]);
        $namephoto = explode('/', $request->file('photo')->store('public'))[1];
        $data = [
            'photo' => $namephoto
        ];
        $data += $request->only('name', 'description', 'price', 'weight');
        Product::create($data);
        return redirect()->route('/');
    }

    public function updateView(Product $product)
    {
        return view('users.update', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
           "name"=>"required",
           "photo" => "required|file|mimes:jpg,bmp,png,jpeg|max:10240",
           "description"=>"required",
           "price"=>"required",
           "weight"=>"required",
        ]);
        $editPhoto = explode('/',$request->file('photo')->store('public'))[1];
        $data = [
          'photo'=>$editPhoto
        ];
        $data += $request->only('name','description','price','weight');

        $product->update($data);
        return redirect()->route('/');
    }
}
