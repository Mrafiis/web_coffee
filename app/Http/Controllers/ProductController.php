<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('owner.dataproduk.produk',compact('products'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.dataproduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function database(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'category_list' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') ."." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('produk')->with('success'.'product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id){
        $products = Product::find($id);
        return view('owner.dataproduk.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'category_list' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') ."." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        // Product::whereId($id)->update($products);
        // $request->except('_token');
        // return redirect()->route('produk');
        $products->update($input);
        return redirect()->route('produk')->with('success'.'product edit successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $products = Product::find($id);

        if($products){
            $products->delete();
        }

        return redirect()->route('produk');
    }

    public function addToCart($id){
        $products = Product::findOrFail($id);

        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else{
            $cart[$id] = [
                "name" => $products->name,
                "price" => $products->price,
                "category_list" => $products->category_list,
                "image" => $products->image,
                "quantity" => 1
            ];
        }

        session()->put('cart',$cart);
        return redirect()->back()->with('success','berhasil menambahkan produk ke keranjang');
    }

    public function cart(){
        return view('admin.cart');
    }

    public function remove(Request $request){
            if($request->id){
                $cart = session()->get('cart');
                if(isset($cart[$request->id])){
                    unset($cart[$request->id]);
                    session()->put('cart',$cart);
                }
                session()->flash('success','produk berhasil di hapus');
            }
    }

    public function updated(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request-> id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
}
