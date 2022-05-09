<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    public function index()
    {
        $faqs = FAQ::all();
        return view('backend.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.faqs.create_form');
    }

    public function store(Request $request)
    {
        $couriers = new FAQ();
        $couriers->fill($request->all());
        $couriers->save();

        notify()->success("FAQ Added Successfully","Success");
        return redirect()->route('app.faq-system.index');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('backend.faqs.edit_form', compact('faq'));
    }

    public function update(Request $request, FAQ $fAQ)
    {
        FAQ::findOrFail($request->faq_ques_id)->update($request->all());
        notify()->success("FAQS Updated Successfully","Success");

        return redirect()->route('app.faq-system.index');
    }


    public function destroy($id)
    {
        $faqs = FAQ::find($id)->delete();
        notify()->success("FAQS Deleted Successfully","Successfully");
        return back();
    }
}
