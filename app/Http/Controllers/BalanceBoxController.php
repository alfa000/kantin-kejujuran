<?php

namespace App\Http\Controllers;

use App\Models\BalanceBox;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceBoxController extends Controller
{
    public function buy($id)
    {
        $item = Item::findOrFail($id);
        return view('balance_box.buy', compact('item'));
    }

    public function buy_store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        Item::where('id', $request->item_id)->update([
            'sold' => true
        ]);

        BalanceBox::create([
            'status' => 'in',
            'item_id' => $request->item_id,
            'amount' => $request->amount,
        ]);

        return redirect(route('home'));
    }

    public function withdraw()
    {
        return view('balance_box.withdraw');
    }

    public function withdraw_store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|max:'.balance_total(),
        ]);

        BalanceBox::create([
            'status' => 'out',
            'amount' => $request->amount,
        ]);

        return redirect(route('home'));
    }
}
