<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
      
        return [
            "status" => true,
            "data" => $products
        ];
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
  
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'code'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
        ]);
        
        if($validation->fails()){
            return json_decode($validation->errors());
        }else{
            $product = Product::create($request->all());
            return [
                "status" => true,
                "data" => $product
            ];
        }
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return [
            "status" => true,
            "data" => $product
        ];
    }
  
    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'code'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
        ]);
        
        if($validation->fails()){
            return json_decode($validation->errors());
        }else{
            $product = Product::find($id);
            if($product){
                $product->update($request->all());
                $product->save();
                return [
                    "status" => true,
                    "data" => $product
                ];
            }else{                
                return [
                    "status" => false,
                    "msg" => "no found" 
                ];
            }
            
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $removed = Product::destroy($id);
            return [
                "status" => true,
                "data" => $removed,
                "msg" => "Product removed successfully"
            ];
        }else{
            return [
                "status" => false,
                "msg" => "no found" 
            ];
        }
        
    }
}