<?php

namespace App\Http\Controllers;
use App\professions;
use Illuminate\Http\Request;
use Illuminate\support\str;

class professioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profession =professions::paginate(10);
        return view('admin.profession.index',compact('profession'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.profession.create');
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

      professions::create(['name'=> $request->name,
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
        $profession  = professions::findorfail($id);
        return view('admin.profession.edit',compact('profession'));
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
    $profession_data =[
        'name'=>$request->name,
          'slug'=>str::slug($request->name)];
  professions::whereId($id)->update($profession_data);
  return redirect()->route('profession.index')-> with('success','date berhasil di update');}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $profession= professions::findorfail($id);
        $profession->delete();
        return redirect()->back()->with('success',' data est supprimi');
    }
}

 