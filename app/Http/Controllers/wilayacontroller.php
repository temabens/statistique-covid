<?php

namespace App\Http\Controllers;
use App\wilaya;
use Illuminate\Http\Request;
use Illuminate\support\str
;



class wilayacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
       $wilaya =wilaya::paginate(10);
        return view('admin.wilaya.index',compact('wilaya'));
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.wilaya.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['name'=>'required|min:3']);

       $wilaya=wilaya::create(['name'=> $request->name,
        'slug'=>str::slug($request->name)]);
       return redirect()->back()->with('success','wilaya yes');
    }

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
        $wilaya=wilaya::findorfail($id);
        return view('admin.wilaya.edit',compact('wilaya'));
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
    $wilaya_data =[
        'name'=>$request->name,
          'slug'=>str::slug($request->name)];
  wilaya::whereId($id)->update($wilaya_data);
  return redirect()->route('wilaya.index')-> with('success','date berhasil di update');}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wilaya= wilaya::findorfail($id);
        $wilaya->delete();
        return redirect()->back()->with('success',' data est supprimi');
    }
}
