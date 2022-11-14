<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
        /**
     * GET: admin/post
     * */ 
    public function index(){
        $list = Post::where('posts.status','!=',0)
        ->join('topics', 'topics.id', '=', 'posts.topicid')
        ->orderby('posts.created_at', 'desc')
        ->select("posts.id","posts.img","posts.title","posts.created_at","posts.status","topics.name as topname")
        ->get();
        
        return view('backend.post.index',compact('list'));
    }

    /**
     * GET: admin/post/create
     * */ 
    public function create(){
        $list_topic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.create',compact('list_topic'));
    }

    /**
     * POST: admin/post/store
     * */ 
    public function store(StorePostRequest $request){
        $post = new Post();
        $post ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $post ->slug = $slug;
        $post ->detail = $request->detail;
        $post ->metadesc = $request->metadesc;
        $post ->metakey = $request->metakey;
        $post ->topid = $request->topid;
        $post ->suppid = $request->suppid;
        $post ->status = $request->status;
        $post ->price = $request->price;
        $post ->pricesale = $request->pricesale;
        $post ->number = $request->number;
        $post ->created_by =1;
            // Upload file
        if($request->hasFile('img')){
            $path_dir = "images/posts/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $post ->img = $fileName;
            $post->save();
            return redirect()->route('post.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
        }        
        else{
            return redirect()->route('post.index')->with('imgerror','image don`t select');       
        }
    
    }

    /**
     * GET: admin/post/id
     * */ 
    public function show($id){
        $post = Post::find($id);
        $list_topic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.show',compact('list_topic','post',));
    }

    /**
     * GET: admin/post/id/edit
     * */ 
    public function edit($id){
        $post = Post::find($id);
        $list_topic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.post.edit',compact('list_topic','post'));
    }

    /**
     * PUT: admin/post
     * */ 
    public function update(UpdatePostRequest $request, $id){
        $post = Post::find($id);
        $post ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $post ->slug = $slug;
        $post ->detail = $request->detail;
        $post ->metadesc = $request->metadesc;
        $post ->metakey = $request->metakey;
        $post ->topid = $request->topid;
        $post ->suppid = $request->suppid;
        $post ->status = $request->status;
        $post ->price = $request->price;
        $post ->pricesale = $request->pricesale;
        $post ->number = $request->number;
        $post ->updated_by =1;
            // Upload file
        if($request->hasFile('img')){
            $path_dir = "images/posts/";
            $file = $request->file('img');
            $fileName = $slug.$file->getClientOriginalName();
            $filepath = $file->move($path_dir,$fileName);
            $post ->img = $fileName;
        }        
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * Delete: admin/post
     * */ 
    public function destroy($id){
        $post = Post::find($id);
        if($post==null){
            return redirect()->route('post-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $post->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/post-trash
     * */ 
    public function trash(){
        $list = post::where('posts.status','=',0)
        ->join('topics', 'topics.id', '=', 'posts.topicid')
        ->orderby('posts.created_at', 'desc')
        ->select("posts.id","posts.img","posts.name","posts.created_at","posts.status","topics.name as topname")
        ->get();
        return view('backend.post.trash',compact('list'));
    }

    /**
     * GET: admin/post/id/status
     * */ 
    public function status($id){
        $post = Post::find($id);
        if($post==null){
            return redirect()->route('post.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $post->status = ($post->status==2)?1:2;
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/post/id/deltrash
     * */ 
    public function deltrash($id){
        $post = Post::find($id);
        if($post==null){
            return redirect()->route('post.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $post-> status = 0;
        $post->save();
        return redirect()->route('post.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/post/1/retrash
     * */ 
    public function retrash($id){
        $post = Post::find($id);
        if($post==null){
            return redirect()->route('post-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $post-> status = 2;
        $post->save();
        return redirect()->route('post-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
