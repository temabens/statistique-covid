<?php

namespace App\Http\Controllers;
use App\malades;
use Illuminate\Http\Request;

use Illuminate\support\str;
class maladecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $malade =malades::paginate(10);
        return view('admin.malade.index',compact('malade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.malade.create');
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

      malades::create(['name'=> $request->name,
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
        $malade  = malades::findorfail($id);
        return view('admin.malade.edit',compact('malade'));
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
    $malade_data =[
        'name'=>$request->name,
          'slug'=>str::slug($request->name)];
  malades::whereId($id)->update($malade_data);
  return redirect()->route('malade.index')-> with('success','date berhasil di update');}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $malade= malades::findorfail($id);
        $malade->delete();
        return redirect()->back()->with('success',' data est supprimi');
    }
}
