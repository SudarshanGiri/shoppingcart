<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Session;
use File;
use App\Cart;
use DB;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /** public function __construct()
   
    //    $this->middleware('auth:admin')->except('index2','show','laptops','speakers','desktops','getAddToCart');
    }*/
    public function getAddToCart(Request $request, $id){
        $product=Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('product.index');

    }
    public function getReduceByOne($id){
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->reduceByOne($id);

        SESSION::put('cart',$cart);
        return redirect()->route('product.shoppingCart');

    }
    public function getRemoveItem($id){
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->removeItem($id);

        SESSION::put('cart',$cart);
        return redirect()->route('product.shoppingCart');

    }

    public function getCart(){
        if(!Session ::has('cart')){
            return view('products.shopping-cart',['products'=>null]);
        }
        $oldCart=Session::get('cart');
        $cart= new Cart($oldCart);
        return view('products.shopping-cart', ['products'=>$cart->items,'totalPrice'=>$cart->totalPrice] );
    }
    public function getCheckout(){
        if(!Session ::has('cart')){
            return view('products.shopping-cart',['products'=>null]);
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('products.checkout',['total'=>$total]);


       
    }
    public function laptops()
    {
        $products= DB::select('select * from products WHERE type="laptop" order by created_at desc');
        
        return view('products.laptops',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function speakers()
    {
        $products= DB::select('select * from products WHERE type="speaker" OR type="speakers" order by created_at desc');
        
        return view('products.laptops',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function desktops()
    {
        $products= DB::select('select * from products WHERE type="desktop" OR type="desktops" order by created_at desc');
        
        return view('products.laptops',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function index2()
    {
        $products=Product::latest()->paginate(12);
        return view('products.index2',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }

   
    public function index()
    {
        $products=Product::latest()->paginate(6);
        return view('products.index',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required'

          ]);
          $image=$request->file('image');
          $new_name=rand().'.'.$image->getClientOriginalExtension();
          $image->move(public_path('images'),$new_name);
          $form_data =array(
              'type' => $request->type,
              'name' =>$request->name,
              'price' =>$request->price,
              'image' =>$new_name,
              'description' =>$request->description

          );
  
          Product::create($form_data);
         
          return redirect()->route('products.index')
                          ->with('success', 'new product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
          $image_name=$request->hidden_image;
          $image=$request->file('image');
          if($image != '')
          {
            $request->validate([
                'type' => 'required',
                'name' => 'required',
                'price' => 'required',
                'image' => 'required',
                'description' => 'required'
    
              ]);
            
            $image_name=rand() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name); 
           // Storage::delete(["public/$image_name"]);
           
           $usersImage = public_path("images/{$product->image}"); // get previous image from folder
           if (File::exists($usersImage)) { // unlink or remove previous image from folder
               unlink($usersImage);
           }
        }
            

          
          else{
                $request->validate([
                    'type' => 'required',
                    'name' => 'required',
                    'price' => 'required',
                    'description' => 'required'

                ]);
             }
            $form_data=array(
                'type' => $request->type,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image_name,
                'description' => $request->description

             
                
            );
            Product::whereid($id)->update($form_data);
            return redirect()->route('products.index')
                          ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
