<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\link;
class SubmitLinkController extends Controller
{
    //
    public function index()
    {
        return view('submit');
    }

    public function create(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|max:255',
            'url'=>'required|url|max:255',
            'description'=>'required|max:255'
        ]);
    
        //$link=tap(new App\link($data))->save(); //mass save
        $link = new link;
        $link->title= $data['title'];
        $link->url = $data['url'];
        $link->description = $data['description'];
        $link->save();
        return redirect('/');
    }
}
