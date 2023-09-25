<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    //
    public function index() {
        return view('welcome', ['listItems' => ListItem::where('is_complete', false)->get()]);
    }

    public function markComplete($id) {
        $listItem = ListItem::find($id);
        $listItem->is_complete = true;
        $listItem->save();
        return redirect('/');
    }

    public function saveItem(Request $request) {
        
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = false;
        $newListItem->save();

        return redirect('/');
    }
}
