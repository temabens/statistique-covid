<?php

namespace App\Http\Controllers;

use App\stats;
use App\wilaya;
use App\Willaya;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\support\str;
class statcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $stat =stats::paginate(10);
        return view('admin.stat.index',compact('stat'));
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     $wilaya = Willaya::all();
        
         return view('admin.stat.create',compact('wilaya'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 /*$stat = new stats();

        $stat->wilaya = $request->input('wilaya');
        $stat->cas_tot = $request->input('cas_tot');
        $stat->deces_tot = $request->input('deces_tot');
        $stat->gueris_tot = $request->input('gueris_tot');
        $stat->en_cours_soin = $request->input('en_cours_soin');
        $stat->gueris_24h = $request->input('gueris_24h');
        $stat->deces_24h = $request->input('deces_24h');
        $stat->date = $request->input('date');
       $stat->save();
*/
    
      $acc = DB::table('stats')
        ->where('wilaya','=',$request->input('wilaya'))
        ->update(['cas_tot' =>$request->input('cas_tot'),
    'deces_tot' =>  $request->input('deces_tot'),
    'gueris_tot' => $request->input('gueris_tot'),
    'en_cours_soin' => $request->input('en_cours_soin'),
    'gueris_24h' => $request->input('gueris_24h'),
  'deces_24h' => $request->input('deces_24h'),
  'date' => $request->input('date')
  
  ]);
       return redirect()->back()->with('success','stat yes');}
    

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
         $wilaya = wilaya::all();
        
        $stat = stats::findorfail($id);
        return view('admin.stat.edit',compact('stat','wilaya'));
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
     



     $this->validate($request, [ 
                            'wilaya_id'=>'required',


                            
                             
                            'cas_tot'=>'required',
                            'deces_tot'=>'required',
                            'gueris_tot'=>'required',
                            'en_cours_soin'=>'required',
                            'gueris_24h'=>'required',
                            'deces_24h'=>'required',
                            'date'=>'required'
                        ]);











          $stat =stats::findorfail($id);
        




          $stat_data = ['wilaya_id'=>$request->wilaya_id,
                                'cas_tot'=>$request->cas_tot,
                                'deces_tot'=>$request->deces_tot,
                                'gueris_tot'=>$request->gueris_tot,
                                 'en_cours_soin'=>$request->en_cours_soin,
                                  'gueris_24h'=>$request->gueris_24h,
                                   'deces_24h'=>$request->deces_24h,
                                    'date'=>$request->date
                                 
                                                ];
   $stat->update($stat_data);
   return redirect()->back();
          }


          //else{
            //$stat_data = ['wilaya_id'=>$request->wilaya_id,
                               // 'cas_tot'=>$request->cas_tot,
                            //    'deces_tot'=>$request->deces_tot,
                            //    'gueris_tot'=>$request->gueris_tot,
                             //    'en_cours_soin'=>$request->en_cours_soin,
                            //      'gueris_24h'=>$request->gueris_24h,
                              //     'deces_24h'=>$request->deces_24h,
                              //      'date'=>$request->date
                                 
                                 //               ];


         // }

          

          
          //$stat->update($stat_data );
                                                

 //return redirect()->back()->with('success','statyes')
   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

         $stat= stats::findorfail($id);
        $stat->delete();
        return redirect()->back()->with('success',' stat est supprimi');
    }
}

