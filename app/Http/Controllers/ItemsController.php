<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;

class ItemsController extends Controller
{
    public function index(Item $model) 
    {
        return view('items.index', ['items' => $model->paginate(15)]);
    }
    public function edit(Item $item)
    {
        return view('items.edit', compact('items'));
    }
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/items');
    }

    public function add(Request $req) {
        $this->validate($req,['nameItem' => 'required']);
        Item::create([
            'item_name' => $req->nameItem
        ]);
        return redirect('items/');
    }
}
