<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
    * GET: admin/topic
    */ 
   public function index(){
       $list = Topic::where('status','!=',0)->orderby('created_at', 'desc')->get();
       return view('backend.topic.index',compact('list'));
   }

    /**
        * GET: admin/topic/create
        * */ 
    public function create(){
        $list_topic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.create',compact('list_topic'));
    }

    /**
        * POST: admin/topic/store
        * */ 
    public function store(StoreTopicRequest $request){
        $topic = new Topic();
        $topic ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $topic ->slug = $slug;
        $topic ->metadesc = $request->metadesc;
        $topic ->metakey = $request->metakey;
        $topic ->parentid = $request->parentid;
        $topic ->orders = $request->orders;
        $topic ->status = $request->status;
        $topic ->created_by =1;
        if($topic->save()){
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $topic ->id;
            $link->type = 'topic';
            $link->save();
        };
        return redirect()->route('topic.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
        * GET: admin/topic/id
        * */ 
    public function show($id){
        $topic = Topic::find($id);
        return view('backend.topic.show',compact('topic'));
    }

    /**
        * GET: admin/topic/id/edit
        * */ 
    public function edit($id){
        $topic = Topic::find($id);
        $list_topic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.edit',compact('list_topic','topic'));
    }

    /**
        * PUT: admin/topic
        * */ 
    public function update(UpdateTopicRequest $request, $id){
        $topic = Topic::find($id);
        $topic ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $topic ->slug = $slug;
        $topic ->metadesc = $request->metadesc;
        $topic ->metakey = $request->metakey;
        $topic ->parentid = $request->parentid;
        $topic ->orders = $request->orders;
        $topic ->status = $request->status;
        $topic ->updated_by =1;
        if($topic->save()){
            // link
            $link = Link::where([['tableid','=',$id],['type','=','topic']])->first();
            if($link!=null){
                $link->slug = $slug;
                $link->save();
            }
            // menu
            $list_menu = Menu::where([['tableid','=',$id],['type','=','topic']])->get();
            if(count($list_menu)>0){
                foreach($list_menu as $menu){
                    $menu->name=$topic->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
        };
        return redirect()->route('topic.index')->with('message',['typemsg'=>'succes','msg'=>'Add messege add success']);
    }

    /**
        * Delete: admin/topic
        * */ 
    public function destroy($id){
        $topic = Topic::find($id);
        if($topic==null){
            return redirect()->route('topic-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $topic->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
        * GET: admin/topic-trash
        * */ 
    public function trash(){
        $list = Topic::where('status','==',0)->orderby('created_at', 'desc')->get();
        return view('backend.topic.trash',compact('list'));
    }

    /**
        * GET: admin/topic/id/status
        * */ 
    public function status($id){
        $topic = Topic::find($id);
        if($topic==null){
            return redirect()->route('topic.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $topic->status = ($topic->status==2)?1:2;
        $topic->save();
        return redirect()->route('topic.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
        * Delete: admin/topic/id/deltrash
        * */ 
    public function deltrash($id){
        $topic = Topic::find($id);
        if($topic==null){
            return redirect()->route('topic.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $topic-> status = 0;
        $topic->save();
        return redirect()->route('topic.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
        * GET: admin/topic/1/retrash
        * */ 
    public function retrash($id){
        $topic = Topic::find($id);
        if($topic==null){
            return redirect()->route('topic-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $topic-> status = 2;
        $topic->save();
        return redirect()->route('topic-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
