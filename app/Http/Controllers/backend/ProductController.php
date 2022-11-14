<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * GET: admin/product
     * */ 
    public function index(){
        $list = Product::where('products.status','!=',0)
        ->join('categorys', 'categorys.id', '=', 'products.catid')
        ->join('Suppliers', 'Suppliers.id', '=', 'products.suppid')
        ->orderby('products.created_at', 'desc')
        ->select("products.id","products.img","products.name","products.created_at","products.status","categorys.name as catname","suppliers.name as suppname")
        ->get();
        
        return view('backend.product.index',compact('list'));
    }

    /**
     * GET: admin/product/create
     * */ 
    public function create(){
        $list_category = Category::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        $list_supplier = Supplier::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.create',compact('list_category','list_supplier'));
    }

    /**
     * POST: admin/product/store
     * */ 
    public function store(StoreProductRequest $request){
        $product = new Product();
        $product ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $product ->slug = $slug;
        $product ->detail = $request->detail;
        $product ->metadesc = $request->metadesc;
        $product ->metakey = $request->metakey;
        $product ->catid = $request->catid;
        $product ->suppid = $request->suppid;
        $product ->status = $request->status;
        $product ->price = $request->price;
        $product ->pricesale = $request->pricesale;
        $product ->number = $request->number;
        $product ->created_by =1;
            // Upload file
        if($request->hasFile('img')){
            $path_dir = "images/products/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $product ->img = $fileName;
            $product->save();
            return redirect()->route('product.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
        }        
        else{
            return redirect()->route('product.index')->with('imgerror','image don`t select');       
        }
    
    }

    /**
     * GET: admin/product/id
     * */ 
    public function show($id){
        $product = Product::find($id);
        $list_category = Category::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        $list_supplier = Supplier::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.show',compact('list_category','product','list_supplier'));
    }

    /**
     * GET: admin/product/id/edit
     * */ 
    public function edit($id){
        $product = Product::find($id);
        $list_category = Category::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        $list_supplier = Supplier::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.edit',compact('list_category','product','list_supplier'));
    }

    /**
     * PUT: admin/product
     * */ 
    public function update(UpdateProductRequest $request, $id){
        $product = Product::find($id);
        $product ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $product ->slug = $slug;
        $product ->detail = $request->detail;
        $product ->metadesc = $request->metadesc;
        $product ->metakey = $request->metakey;
        $product ->catid = $request->catid;
        $product ->suppid = $request->suppid;
        $product ->status = $request->status;
        $product ->price = $request->price;
        $product ->pricesale = $request->pricesale;
        $product ->number = $request->number;
        $product ->updated_by =1;
            // Upload file
        if($request->hasFile('img')){
            $path_dir = "images/products/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $product ->img = $fileName;
        }        
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * Delete: admin/product
     * */ 
    public function destroy($id){
        $product = Product::find($id);
        if($product==null){
            return redirect()->route('product-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $product->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/product-trash
     * */ 
    public function trash(){
        $list = Product::where('products.status','=',0)
        ->join('categorys', 'categorys.id', '=', 'products.catid')
        ->join('Suppliers', 'Suppliers.id', '=', 'products.suppid')
        ->orderby('products.created_at', 'desc')
        ->select("products.id","products.img","products.name","products.created_at","products.status","categorys.name as catname","suppliers.name as suppname")
        ->get();
        return view('backend.product.trash',compact('list'));
    }

    /**
     * GET: admin/product/id/status
     * */ 
    public function status($id){
        $product = Product::find($id);
        if($product==null){
            return redirect()->route('product.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $product->status = ($product->status==2)?1:2;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/product/id/deltrash
     * */ 
    public function deltrash($id){
        $product = Product::find($id);
        if($product==null){
            return redirect()->route('product.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $product-> status = 0;
        $product->save();
        return redirect()->route('product.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/product/1/retrash
     * */ 
    public function retrash($id){
        $product = Product::find($id);
        if($product==null){
            return redirect()->route('product-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $product-> status = 2;
        $product->save();
        return redirect()->route('product-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
