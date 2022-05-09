<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index()
    {
        $drivers = Driver::all();
        return view('backend.driver.index', compact('drivers'));
    }

    public function create()
    {
        return view('backend.driver.create');
    }


    public function store(Request $request)
    {
        $drivers = new Driver();
        $drivers->fill($request->all());
        $drivers->save();

        notify()->success("Driver Created Successfully","Success");

        return redirect()->route('app.driver-info.index');
    }


    public function edit($id)
    {
        $drivers = Driver::findOrFail($id);
        return view('backend.driver.form', compact('drivers'));

    }


    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->update($request->all());
        $driver->save();

        notify()->success("Driver Updated Successfully","Success");
        return redirect()->route('app.driver-info.index');
    }

    public function destroy($id)
    {
        //
    }
}
