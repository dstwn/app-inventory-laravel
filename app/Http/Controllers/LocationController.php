<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index(Location $model) 
    {
        return view('locations.index', ['locations' => $model->paginate(15)]);
    }
    public function edit(Location $location)
    {
        return view('locations.edit', compact('locations'));
    }
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/locations');
    }

    public function add(Request $req) {
        $this->validate($req,['nameItem' => 'required']);
        Item::create([
            'item_name' => $req->nameItem
        ]);
        return redirect('locations/');
    }
}

