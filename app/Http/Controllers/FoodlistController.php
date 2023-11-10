<?php

namespace App\Http\Controllers;

use App\Models\Foodlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Foodlists = Db::select('select * from foodlists');
        return view('Foodlist', [
            'Foodlists' => $Foodlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newFoodlist = new Foodlist;
        $newFoodlist->name = $request->name;
        $newFoodlist->itemname = $request->itemname;
        $newFoodlist->description = $request->description;
        $newFoodlist->price = $request->price;
        $newFoodlist->save();
        return redirect('/foodlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foodlist $foodlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($foodlist)
    {
        $foodlist = Foodlist::find($foodlist);
        return view('edit', compact('foodlist'));
    }


    public function update(Request $request, Foodlist $foodlist)
    {
        $data = $request->validate([
            'name' => 'required',
            'itemname' => 'required',
            'description' => 'required',
            'price' => 'required',


        ]);

        $foodlist->update($data);
        return redirect('/foodlist')->with('success', 'Foodlist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foodlist = Foodlist::find($id);
        $foodlist->delete($foodlist);
        return redirect('/foodlist')->with('success', 'Foodlist deleted successfully');
    }
}
