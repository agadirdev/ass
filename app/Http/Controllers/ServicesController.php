<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('association.services.index');
    }

    public function get_services(Request $request){

        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Services::where('id','>',0);

        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('type ','like','%'.$search.'%')                
                ->orWhere('ref','like','%'.$search.'%')
                ->orWhere('designation','like','%'.$search.'%')
                ->orwhere('famille','like','%'.$search.'%')
                ->orWhere('marque','like','%'.$search.'%')
                ->orWhere('unite','like','%'.$search.'%')
                ->orWhere('qte_stock','like','%'.$search.'%')
                ->orWhere('prix_achat','like','%'.$search.'%')
                ->orWhere('prix_vente','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('type',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('ref',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('designation',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('famille',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('marque',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('unite',$SortDir);
        }elseif($sortCol==6){
            $q->orderby('qte_stock',$SortDir);
        }elseif($sortCol==7){
            $q->orderby('prix_achat',$SortDir);
        }elseif($sortCol==8){
            $q->orderby('prix_vente',$SortDir);
        }
        $q2    = $q;


        $iTotalDisplayRecords = $q2->orderby('id')->count();
        $Services = $q->orderby('id')->offset($displayStart)
                ->limit($displayLength)->get(); 

        return [
            'iTotalRecords' => Services::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $Services
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('association.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->input('id');

        if(Services::where('id','<>',$id)->where('ref',$request->input('ref'))->count()>0){
            return view('alerts.operations',[
                'b'   => false,
                 'msg' => 'خطاء في تنفيذ الاجراء'
            ]);
        }

        $Services = Services::find($id);
     
        if($Services==null)

        $Services = new Services;

        $Services->type        = $request->input('type');
        $Services->ref         = $request->input('ref');
        $Services->designation = $request->input('designation');
        $Services->famille     = $request->input('famille');
        $Services->marque      = $request->input('marque');
        $Services->unite       = $request->input('unite');
        $Services->qte_stock   = $request->input('qte_stock');
        $Services->prix_achat  = $request->input('prix_achat');
        $Services->prix_vente  = $request->input('prix_vente');
        $Services->note        = $request->input('note');

       /* if($Services->user_add != null ){
            $Services->user_update = Auth::user()->name;

        }else{
            $Services->user_add    = Auth::user()->name;
            $Services->user_update = "";
        }
        
        $Services->user_deleted    = "";
        */

        $Services->save();

        return view('alerts.operations',[
                    'b' => true,
                    'msg' => 'العملية تمت بنجاح'
            ]);  
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
       return view('association.services.edit',[
        'services' => Services::find($id)
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
