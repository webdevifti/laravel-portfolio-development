<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //

    public function index(){
        $address = Address::first();
        return view('admin.address',compact('address'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'office_name' => 'required|string|max:255',
            'office_physical_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email_address' => 'required|string|max:255'
        ]);

        try{
            $address = Address::findOrFail($id);
            $address->sub_title = $request->sub_title;
            $address->title = $request->title;
            $address->description = $request->description;
            $address->office_name = $request->office_name;
            $address->office_physical_address = $request->office_physical_address;
            $address->phone_number = $request->phone_number;
            $address->email_address = $request->email_address;
            $address->save();

            return redirect('/address-information')->with('success','Updated');
        }catch(Exception $e){
            return redirect('/address-information')->with('error','Updated');
        }
    }
}
