<?php

namespace App\Http\Controllers;
use App\tags;
use Illuminate\Http\Request;
use Illuminate\support\str;


class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $tag =tags::paginate(10);
        return view('admin.tag.index',compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['name'=>'required|max:20|min:3']);

      tags::create(['name'=> $request->name,
                   'slug'=>str::slug($request->name)]);
       return redirect()->back()->with('success','tag yes');}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag  = tags::findorfail($id);
        return view('admin.tag.edit',compact('tag'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=$this->validate($request,['name'=>'required']);
    $tag_data =[
        'name'=>$request->name,
          'slug'=>str::slug($request->name)];
  tags::whereId($id)->update($tag_data);
  return redirect()->route('tag.index')-> with('success','date berhasil di update');}
    /**
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag= tags::findorfail($id);
        $tag->delete();
        return redirect()->back()->with('success',' data est supprimi');
    }
}
