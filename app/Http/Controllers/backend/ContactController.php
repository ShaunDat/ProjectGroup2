<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Link;
use App\Models\Menu;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * GET: admin/contact
     * */ 
    public function index(){
        $list = Contact::where('status','!=',0)->orderby('created_at', 'desc')->get();
        return view('backend.contact.index',compact('list'));
    }

    /**
     * GET: admin/contact/create
     * */ 
    public function create(){
        $list_contact = Contact::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.create',compact('list_contact'));
    }

    /**
     * POST: admin/contact/store
     * */ 
    public function store(StoreContactRequest $request){
        $contact = new Contact();
        $contact ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $contact ->slug = $slug;
        $contact ->metadesc = $request->metadesc;
        $contact ->metakey = $request->metakey;
        $contact ->parentid = $request->parentid;
        $contact ->orders = $request->orders;
        $contact ->status = $request->status;
        $contact ->created_by =1;
        if($contact->save()){
            $link = new Link();
            $link->slug = $slug;
            $link->tableid = $contact ->id;
            $link->type = 'contact';
            $link->save();
        };
        return redirect()->route('contact.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * GET: admin/contact/id
     * */ 
    public function show($id){
        $contact = Contact::find($id);
        return view('backend.contact.show',compact('contact'));
    }

    /**
     * GET: admin/contact/id/edit
     * */ 
    public function edit($id){
        $contact = Contact::find($id);
        $list_contact = Contact::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.edit',compact('list_contact','contact'));
    }

    /**
     * PUT: admin/contact
     * */ 
    public function update(UpdateContactRequest $request, $id){
        $contact = Contact::find($id);
        $contact ->name = $request->name;
        $slug = Str::slug($request->name,'-');
        $contact ->slug = $slug;
        $contact ->metadesc = $request->metadesc;
        $contact ->metakey = $request->metakey;
        $contact ->parentid = $request->parentid;
        $contact ->orders = $request->orders;
        $contact ->status = $request->status;
        $contact ->updated_by =1;
        if($contact->save()){
            // link
            $link = Link::where([['tableid','=',$id],['type','=','contact']])->first();
            if($link!=null){
                $link->slug = $slug;
                $link->save();
            }
            // menu
            $list_menu = Menu::where([['tableid','=',$id],['type','=','contact']])->get();
            if(count($list_menu)>0){
                foreach($list_menu as $menu){
                    $menu->name=$contact->name;
                    $menu->link=$slug;
                    $menu->save();
                }
            }
        };
        return redirect()->route('contact.index')->with('message',['typemsg'=>'succes','msg'=>'Add messege add success']);
    }

    /**
     * Delete: admin/contact
     * */ 
    public function destroy($id){
        $contact = Contact::find($id);
        if($contact==null){
            return redirect()->route('contact-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $contact->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }

    /**
     * GET: admin/contact-trash
     * */ 
    public function trash(){
        $list = Contact::where('status','==',0)->orderby('created_at', 'desc')->get();
        return view('backend.contact.trash',compact('list'));
    }

    /**
     * GET: admin/contact/id/status
     * */ 
    public function status($id){
        $contact = Contact::find($id);
        if($contact==null){
            return redirect()->route('contact.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $contact->status = ($contact->status==2)?1:2;
        $contact->save();
        return redirect()->route('contact.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/contact/id/deltrash
     * */ 
    public function deltrash($id){
        $contact = Contact::find($id);
        if($contact==null){
            return redirect()->route('contact.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $contact-> status = 0;
        $contact->save();
        return redirect()->route('contact.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/contact/1/retrash
     * */ 
    public function retrash($id){
        $contact = Contact::find($id);
        if($contact==null){
            return redirect()->route('contact-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $contact-> status = 2;
        $contact->save();
        return redirect()->route('contact-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
