<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Templates;
use App\Events;
use App\Events\TemplateIsChanged;
use Illuminate\Support\Facades\Auth;

class TemplatesController extends Controller
{
    //
    public function index(Request $request)
    {
        $templates = Templates::latest()->paginate(10);
        return view('templates.index',compact('templates'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function show(Request $request)
    {
        return redirect()->route('templates.index');
    }

    public function edit($id)
    {
        $templates = Templates::find($id);
        return view('templates.edit',compact('templates'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'template' => 'required',
        ]);
        $user = Auth::user();
        $request->request->add(['user_changed'=>$user->id]);
        $templateModel = Templates::find($id);
        $templateModel->update($request->all());
        $events = Events::where('name', $templateModel->name)->first();
        event(new TemplateIsChanged($user,['name'=>'contact name','siteEmail'=>'someemail from config','phone'=>'some phone'],$events));
        return redirect()->route('templates.index')
            ->with('success','Template updated successfully');

    }
}
