<?php

namespace App\Http\Controllers;
use App\sources;
use Illuminate\Http\Request;

use Illuminate\support\str;
class sourcecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $source =sources::paginate(10);
        return view('admin.source.index',compact('source'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.source.create');
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

      sources::create(['name'=> $request->name,
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
        $source  = sources::findorfail($id);
        return view('admin.source.edit',compact('tag'));
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
    $source_data =[
        'name'=>$request->name,
          'slug'=>str::slug($request->name)];
  source::whereId($id)->update($source_data);
  return redirect()->route('source.index')-> with('success','date berhasil di update');}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $source= sources::findorfail($id);
        $source->delete();
        return redirect()->back()->with('success',' data est supprimi');
    }
}
