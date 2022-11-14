<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * GET: admin/supplier
     * */ 
    public function index(){
        $list = Supplier::where('status','!=',0)->orderby('created_at', 'desc')->get();
        return view('backend.supplier.index',compact('list'));
    }

    /**
     * GET: admin/supplier/create
     * */ 
    public function create(){
        return view('backend.supplier.create');
    }

    /**
     * POST: admin/supplier/store
     * */   
    public function store(StoreSupplierRequest $request){
        $supplier = new Supplier();
        $supplier ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $supplier ->slug = $slug;
        $supplier ->metadesc = $request->metadesc;
        $supplier ->metakey = $request->metakey;

        $supplier ->siteurl = $request->siteurl;
        $supplier ->email = $request->email;
        $supplier ->fullname = $request->fullname;
        $supplier ->phone = $request->phone;
        $supplier ->address = $request->address;
        $supplier ->status = $request->status;
        $supplier ->created_by =1;
        // Upload file
        if($request->hasFile('logo')){
            $path_dir = "images/supplier/";
            $file = $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $supplier ->logo = $fileName;
        }            
        if($supplier->save()){
            // link
            $link = Link::where([['tableid','=',$id],['type','=','supplier']])->first();
            if($link!=null){
                $link->slug = $slug;
                $link->save();
            }
            // menu
            $list_menu = Menu::where([['tableid','=',$id],['type','=','supplier']])->get();
            if(count($list_menu)>0){
                foreach($list_menu as $menu){
                    $menu->name=$supplier->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
        }
        return redirect()->route('supplier.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * GET: admin/supplier/id
     * */ 
    public function show($id){
        $supplier = Supplier::find($id);
        return view('backend.supplier.show',compact('supplier'));
    }

    /**
     * GET: admin/supplier/id/edit
     * */ 
    public function edit($id){
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit',compact('supplier'));
    }

    /**
     * PUT: admin/supplier
     * */ 
    public function update(UpdateSupplierRequest $request, $id){
        $supplier = Supplier::find($id);
        $supplier ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $supplier ->slug = $slug;
        $supplier ->metadesc = $request->metadesc;
        $supplier ->metakey = $request->metakey;

        $supplier ->siteurl = $request->siteurl;
        $supplier ->email = $request->email;
        $supplier ->fullname = $request->fullname;
        $supplier ->phone = $request->phone;
        $supplier ->address = $request->address;
        $supplier ->status = $request->status;
        $supplier ->created_by =1;
        // Upload file
        if($request->hasFile('logo')){
            $path_dir = "images/supplier/";
            $file = $request->file('logo');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $supplier ->logo = $fileName;
            if($supplier->save()){
                $link = new Link();
                $link -> slug =$slug;
                $link -> tableid = $supplier->id;
                $link ->type='supplier';
                $link ->save();
            }
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
        }
        else{
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'succes','msg'=>'messege add error']);
        }    
    }

    /**
     * Delete: admin/supplier
     * */ 
    public function destroy($id){
        $supplier = Supplier::find($id);
        if($supplier==null){
            return redirect()->route('supplier-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $supplier->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/supplier-trash
     * */ 
    public function trash(){
        $list = supplier::where('status','==',0)->orderby('created_at', 'desc')->get();
        return view('backend.supplier.trash',compact('list'));
    }

    /**
     * GET: admin/supplier/id/status
     * */ 
    public function status($id){
        $supplier = Supplier::find($id);
        if($supplier==null){
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $supplier->status = ($supplier->status==2)?1:2;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/supplier/id/deltrash
     * */ 
    public function deltrash($id){
        $supplier = supplier::find($id);
        if($supplier==null){
            return redirect()->route('supplier.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $supplier-> status = 0;
        $supplier->save();
        return redirect()->route('supplier.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/supplier/1/retrash
     * */ 
    public function retrash($id){
        $supplier = Supplier::find($id);
        if($supplier==null){
            return redirect()->route('supplier-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $supplier-> status = 2;
        $supplier->save();
        return redirect()->route('supplier-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
