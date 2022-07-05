<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::where('sold', false);

        if ($request->sort == 'dcd') {
            $items->orderBy('created_at', 'DESC');
        }else if ($request->sort == 'pna') {
            $items->orderBy('name', 'ASC');
        }else if ($request->sort == 'pnd') {
            $items->orderBy('name', 'DESC');
        }else{
            $items->orderBy('created_at', 'ASC');
        }

        $items = $items->paginate();

        return view('home', compact('items'));
    }
}
