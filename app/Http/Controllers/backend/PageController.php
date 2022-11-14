<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * GET: admin/page
     * */ 
    public function index(){
        $list = Page::where('status','!=',0)->orderby('created_at', 'desc')->get();
        return view('backend.page.index',compact('list'));
    }

    /**
     * GET: admin/page/create
     * */ 
    public function create(){
        $list_page = Page::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.page.create',compact('list_page'));
    }

    /**
     * POST: admin/page/store
     * */ 
    public function store(StorePageRequest $request){
        $page = new Page();
        $page ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $page ->slug = $slug;
        $page ->metadesc = $request->metadesc;
        $page ->metakey = $request->metakey;
        $page ->parentid = $request->parentid;
        $page ->orders = $request->orders;
        $page ->status = $request->status;
        $page ->created_by =1;
        if($page->save()){
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $page ->id;
            $link->type = 'page';
            $link->save();
        };
        return redirect()->route('page.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * GET: admin/page/id
     * */ 
    public function show($id){
        $page = Page::find($id);
        return view('backend.page.show',compact('page'));
    }

    /**
     * GET: admin/page/id/edit
     * */ 
    public function edit($id){
        $page = Page::find($id);
        $list_page = Page::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.page.edit',compact('list_page','page'));
    }

    /**
     * PUT: admin/page
     * */ 
    public function update(UpdatePageRequest $request, $id){
        $page = Page::find($id);
        $page ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $page ->slug = $slug;
        $page ->metadesc = $request->metadesc;
        $page ->metakey = $request->metakey;
        $page ->parentid = $request->parentid;
        $page ->orders = $request->orders;
        $page ->status = $request->status;
        $page ->update_by =1;
        if($page->save()){
            // link
            $link = Link::where([['tableid','=',$id],['type','=','page']])->first();
            if($link!=null){
                $link->slug = $slug;
                $link->save();
            }
            // menu
            $list_menu = Menu::where([['tableid','=',$id],['type','=','page']])->get();
            if(count($list_menu)>0){
                foreach($list_menu as $menu){
                    $menu->name=$page->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
        };
        return redirect()->route('page.index')->with('message',['typemsg'=>'succes','msg'=>'Add messege add success']);
    }

    /**
     * Delete: admin/page
     * */ 
    public function destroy($id){
        $page = Page::find($id);
        if($page==null){
            return redirect()->route('page-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $page->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/page-trash
     * */ 
    public function trash(){
        $list = Page::where('status','==',0)->orderby('created_at', 'desc')->get();
        return view('backend.page.trash',compact('list'));
    }

    /**
     * GET: admin/page/id/status
     * */ 
    public function status($id){
        $page = Page::find($id);
        if($page==null){
            return redirect()->route('page.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $page->status = ($page->status==2)?1:2;
        $page->save();
        return redirect()->route('page.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/page/id/deltrash
     * */ 
    public function deltrash($id){
        $page = Page::find($id);
        if($page==null){
            return redirect()->route('page.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $page-> status = 0;
        $page->save();
        return redirect()->route('page.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/page/1/retrash
     * */ 
    public function retrash($id){
        $page = Page::find($id);
        if($page==null){
            return redirect()->route('page-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $page-> status = 2;
        $page->save();
        return redirect()->route('page-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
