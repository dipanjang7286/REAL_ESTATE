<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    //
    public function allPropertyType(){
        $type = PropertyType::latest()->get();
        return view("backend.type.all_property_type",compact("type"));
    }
    public function addPropertyType(){
        return view("backend.type.add_property_type");
    }
    public function storePropertyType(Request $request){
        $request->validate(
            [
                "type_name"=> "required|unique:property_types|max:200",
                "type_icon"=> "required|unique:property_types",
            ],
            [
                "type_name.required"=> "The Property Type is Empty. Please add value in the field",
                "type_icon.required"=> "The Property Type Icon is Empty. Please add value in the field",
                "type_name.unique"=> "The property type has already been taken.",
                "type_icon.unique"=> "The property icon has already been taken.",
            ]
        );

        PropertyType::insert([
            "type_name"=> $request->type_name,
            "type_icon"=> $request->type_icon,
        ]);
        $notification = [
            "message"=> "Property Type Created Successfully",
            "alert_type"=> "success",
        ];
        return redirect()->route("all.propertyType")->with($notification);

    }
}
