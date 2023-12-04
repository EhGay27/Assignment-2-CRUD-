<?php

namespace App\Http\Controllers;

use App\Models\Foodlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\DB;

class FoodlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $Foodlists = Db::select('select * from foodlists');
        $Foodlists = foodlist::paginate(10);
        return view('Foodlist', [
            'Foodlists' => $Foodlists
        ]);
    }

    public function get_foodlist()
    {

        $foodlists = Foodlist::get();
        return response()->json([
            'message' => 'Food List',
            'Status'  => 'Success',
            'Foodlist' => $foodlists
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'itemname' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
        ]);

        /* if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }*/

        if ($validator->fails()) {
            return redirect()->route('/foodlist/create')
                ->with('error', 'Validation failed')
                ->withErrors($validator)
                ->withInput();
        }

        $newFoodlist = new Foodlist;
        $newFoodlist->name = $request->name;
        $newFoodlist->itemname = $request->itemname;
        $newFoodlist->description = $request->description;
        $newFoodlist->price = $request->price;
        $newFoodlist->save();
        return redirect('/foodlist')
            ->with('success', 'Cookie Created');
    }


    public function create_foodlist(Request $request)
    {



        $newFoodlist = new Foodlist;
        $newFoodlist->name = $request->name;
        $newFoodlist->itemname = $request->itemname;
        $newFoodlist->description = $request->description;
        $newFoodlist->price = $request->price;
        $newFoodlist->save();
        return response()->json([
            'message' => 'FoodList Create',
            'Status'  => 'Success',
            'Foodlist' => $newFoodlist
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'itemname' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('foodlist.edit', $foodlist)
                ->with('error', 'Validation failed')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->validate([
            'name' => 'required',
            'itemname' => 'required',
            'description' => 'required',
            'price' => 'required',


        ]);

        $foodlist->update($data);
        return redirect('/foodlist')->with('success', 'Foodlist updated successfully');
    }

    /**Update api */
    public function update_foodlist(Request $request, Foodlist $foodlist)
    {
        // Validate and update the foodlist information
        $request->validate([
            'name' => 'required',
            'itemname' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);


        // Update the employee's data using the update method
        $foodlist->update($request->all());

        // Return a response indicating success
        return response()->json([
            'message' => 'Foodlist updated successfully',
            'foodlist' => $foodlist,
        ]);
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

    /*public function delete_foodlist(Foodlist $id)
    {
        $foodlist = Foodlist::find($id);
        $foodlist->delete($id);
        return response()->json([
            'message' => 'Food List',
            'Status'  => ' Delete Successfully',
            'Foodlist' => $foodlist
        ]);
    }
}*/

    public function delete_foodlist(Request $request)
    {
        $id = $request->id;

        $foodlist = Foodlist::find($id);

        if (!$foodlist) {
            return response()->json(['message' => 'Foodlist not found.'], 404);
        }

        $foodlist->delete();

        return response()->json([
            'message' => 'Foodlist deleted successfully',
            'deletedID' => $id
        ], 200);
    }
}
