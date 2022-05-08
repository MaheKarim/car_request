<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipForMe;
use App\Models\USAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ShipForMeController extends Controller
{

    public function index()
    {
        $shipformes = ShipForMe::where('user_id', Auth::id())->get();
        return view('user.ship-for-me.showown_order', compact('shipformes'));
    }


    public function create()
    {
        $usaddresses = USAddress::find(1);
        return view('user.ship-for-me.create', compact('usaddresses'));
    }


    public function store(Request $request)
    {
//        $request->validate([
//            'product_name' => 'required|string',
//            'recvr_name' => 'required|string',
//            'recvr_phn_number1' => 'required|max:15|min:8',
//            'recvr_address' => 'required|string',
//        ]);

        $config = [
            'table' => 'ship_for_mes',
            'length' => 4,
            'prefix' => date('Ys')
        ];
        $trackID = IdGenerator::generate($config).date('HI').Auth::id();

        $shipformes = new ShipForMe();
        $shipformes->fill($request->all());
        $shipformes->user_id = Auth::id();
        $shipformes->status_id = 3;
        $shipformes->track_id = $trackID;
        $shipformes->save();

        session()->flash('success','Booking Order Created Successfully!');

        return redirect()->route('user.dashboard.index');
    }

    public function show(ShipForMe $shipForMe, $id)
    {
      $shipForMe = ShipForMe::find($id);
      return view('user.ship-for-me.single_order', compact('shipForMe'));
    }


}
