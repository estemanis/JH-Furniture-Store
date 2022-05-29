<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class furnitureController extends Controller
{
    //
    public function addFurniture(){
        return view('add_furniture');
    }
    
    public function updateFurniture($id){
        $furniture = Furniture::where('id', '=', $id)->get();

        return view('update_furniture', compact('furniture'));
    }

    public function detailFurniture($id){
        $furniture = Furniture::where('id', '=', $id)->get();
        return view('view_furniture_detail', compact('furniture'));
    }

    public function add(Request $request){
        // dd($request->all());
        $validateData = $request->validate([
            'name'      =>  'required | max:15 | unique:furnitures',
            'price'     =>  'required | numeric | gte:5000 | lte:10000000',
            'type'      =>  'required', 
            'color'     =>  'required',
            'image'     =>  'required | mimes:jpg,jpeg,png', 
        ]);

        $furniture = Furniture::create([
            'name'=> $validateData['name'],
            'price' => $validateData['price'],
            'type' => $validateData['type'],
            'color'=>  $validateData['color']
        ]);

        $file = $request->file('image');
        $name = $file->getClientOriginalName()."_".time();
        Storage::putFileAs('public/images', $file, $name);
        $furniture->image = 'images/'.$name;
        $furniture->save();

        return redirect('/add-furniture');
    }

    public function edit(Request $request, $id){
        // dd($request->all());
        $validateData = $request->validate([
            'name'      =>  'required | max:15',
            'price'     =>  'required | numeric | gte:5000 | lte:10000000',
            'type'      =>  'required', 
            'color'     =>  'required',
            // 'image'     =>  'mimes:jpg,jpeg,png', //file type blomm
        ]);
        $validateData['id'] = $id;
        // Furniture::where('id', $furniture->id)
        // dump( $validateData);
        Furniture::where('id', $id)->update($validateData); 
        // $furniture = Furniture::where('id', '=', $id)->get();
        // return redirect('/detail-furniture');
        $furniture = Furniture::where('id', '=', $id)->get();
        
        return view('view_furniture_detail', compact('furniture'));
        
    }
    
    public function delete($id){
        
        $delete = Furniture::where('id', $id)->first();

        $delete->delete();

        return redirect('/home');
    }

    // public function previous(){
    //     return redirect()->back();
    // }

}
