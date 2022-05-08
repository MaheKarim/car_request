<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourierType;
use Illuminate\Http\Request;

class CourierTypeController extends Controller
{

    public function index()
    {
        $couriers = CourierType::all();
        return view('backend.courier-types.index', compact('couriers'));
    }

    public function create()
    {
        return view('backend.courier-types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'courier_type_name' => 'required|min:3|max:255',
        ]);
        $couriers = new CourierType;
        $couriers->fill($request->all());
        $couriers->save();

        notify()->success("Vehicle Type Created Successfully","Success");
        return redirect()->route('app.courier-types.index');
    }


    public function edit($id)
    {
        $couriers = CourierType::findOrFail($id);

        return view('backend.courier-types.update', compact('couriers'));
    }

    public function update(Request $request, CourierType $courierType)
    {
        $this->validate($request, [
            'courier_type_name' => 'required|min:3|max:255'
        ]);
        CourierType::findOrFail($request->courier_id)->update($request->all());

        notify()->success("Vehicle Info Updated Successfully","Success");
        return redirect()->route('app.courier-types.index');
    }

    public function destroy(CourierType $courierType)
    {
        $courierType->delete();
        notify()->warning('Courier Type Deleted','Successfully');
        return back();
    }
}
