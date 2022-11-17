<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    /**
     * GET: admin/customer
     * */ 
    public function index()
    {
        $list = User::where([['roles','=','customer'],['status','!=','0']])->get();
        return view('backend.customer.index',compact('list'));
    }

    /**
     * GET: admin/customer/create
     * */ 
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * POST: admin/customer/store
     * */ 
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->password = $request->password;
        $user ->fullname = $request->fullname;
        $user ->phone = $request->phone;
        $user ->address = $request->address;
        $user ->status = $request->status;
        $user ->gender = $request->gender;
        $user ->roles = 'customer';
        $user ->remember_token = $request->remember_token;
        $user ->created_by =1;
        $user->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
    }

    /**
     * GET: admin/customer/id
     * */ 
    public function show($id)
    {
        $customer = User::find($id);
        return view('backend.customer.show',compact('customer',));
    }


    /**
     * GET: admin/customer/id/edit
     * */ 
    public function edit($id)
    {
        $customer = User::find($id);
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * PUT: admin/customer
     * */ 
    public function update(UpdateUserRequest $request, $id){
        $user = User::find($id);
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->password = $request->password;
        $user ->fullname = $request->fullname;
        $user ->phone = $request->phone;
        $user ->address = $request->address;
        $user ->gender = $request->gender;
        $user ->roles = 'customer';
        $user ->remember_token = $request->remember_token;
        $user ->status = $request->status;
        $user->updated_by =1;
        $user->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'succes','msg'=>'messege add success']);
        
    }

    /**
     * Delete: admin/customer
     * */ 
    public function destroy($id)
    {
        $customer = User::find($id);
        if($customer==null){
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $customer->delete();
        return redirect()->route()->with('message',['typemsg'=>'succes','msg'=>'delete messege add success']);
    }
        /**
     * GET: admin/customer/id/status
     * */ 
    public function status($id){
        $customer = User::find($id);
        if($customer==null){
            return redirect()->route('customer.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $customer->status = ($customer->status==2)?1:2;
        $customer->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'messege succes']);
    }

    /**
     * Delete: admin/customer/id/deltrash
     * */ 
    public function deltrash($id){
        $customer = User::find($id);
        if($customer==null){
            return redirect()->route('customer.index')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $customer-> status = 0;
        $customer->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }

    /**
     * GET: admin/customer/1/retrash
     * */ 
    public function retrash($id){
        $customer = User::find($id);
        if($customer==null){
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'danger','msg'=>'messege nothing']);
        }
        $customer-> status = 2;
        $customer->save();
        return redirect()->route('customer-trash')->with('message',['typemsg'=>'succes','msg'=>'messege delete success']);
    }
}
