<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * GET: admin/category
     * */ 
    public function index(){
        $list = Category::where('status','!=',0)->orderby('created_at', 'desc')->get();
        return view('backend.category.index',compact('list'));
    }

    /**
     * GET: admin/category/create
     * */ 
    public function create(){
        $list_category = Category::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.category.create',compact('list_category'));
    }

    /**
     * POST: admin/category/store
     * */ 
    public function store(StoreCategoryRequest $request){
        $category = new Category();
        $category ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $category ->slug = $slug;
        $category ->metadesc = $request->metadesc;
        $category ->metakey = $request->metakey;
        $category ->parentid = $request->parentid;
        $category ->orders = $request->orders;
        $category ->status = $request->status;
        $category ->created_by =1;
        if($category->save()){
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $category ->id;
            $link->type = 'category';
            $link->save();
        };
        return redirect()->route('category.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * GET: admin/category/id
     * */ 
    public function show($id){
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
    }

    /**
     * GET: admin/category/id/edit
     * */ 
    public function edit($id){
        $category = Category::find($id);
        $list_category = Category::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.category.edit',compact('list_category','category'));
    }

    /**
     * PUT: admin/category
     * */ 
    public function update(UpdateCategoryRequest $request, $id){
        $category = Category::find($id);
        $category ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $category ->slug = $slug;
        $category ->metadesc = $request->metadesc;
        $category ->metakey = $request->metakey;
        $category ->parentid = $request->parentid;
        $category ->orders = $request->orders;
        $category ->status = $request->status;
        $category ->update_by =1;
        if($category->save()){
            // link
            $link = Link::where([['tableid','=',$id],['type','=','category']])->first();
            if($link!=null){
                $link->slug = $slug;
                $link->save();
            }
            // menu
            $list_menu = Menu::where([['tableid','=',$id],['type','=','category']])->get();
            if(count($list_menu)>0){
                foreach($list_menu as $menu){
                    $menu->name=$category->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
        };
        return redirect()->route('category.index')->with('message',['typemsg'=>'succes','msg'=>'Add messege add success']);
    }

    /**
     * Delete: admin/category
     * */ 
    public function destroy($id){
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('category-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $category->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/category-trash
     * */ 
    public function trash(){
        $list = Category::where('status','==',0)->orderby('created_at', 'desc')->get();
        return view('backend.category.trash',compact('list'));
    }

    /**
     * GET: admin/category/id/status
     * */ 
    public function status($id){
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('category.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $category->status = ($category->status==2)?1:2;
        $category->save();
        return redirect()->route('category.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/category/id/deltrash
     * */ 
    public function deltrash($id){
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('category.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $category-> status = 0;
        $category->save();
        return redirect()->route('category.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/category/1/retrash
     * */ 
    public function retrash($id){
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('category-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $category-> status = 2;
        $category->save();
        return redirect()->route('category-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
