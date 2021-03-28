<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abonnee;

class AbonneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('association.abonne.index');
    }
    public function get_abonnee(Request $request){

        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Abonnee::where('id','>',0);


        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('n_compteur ','like','%'.$search.'%')                
                ->orWhere('cin','like','%'.$search.'%')
                ->orWhere('nom','like','%'.$search.'%')
                ->orwhere('prenom','like','%'.$search.'%')
                ->orWhere('date_naissance','like','%'.$search.'%')
                ->orWhere('tel','like','%'.$search.'%')
                ->orWhere('montant','like','%'.$search.'%')
                ->orWhere('date_inscription','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('n_compteur',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('cin',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('nom',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('prenom',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('date_naissance',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('tel',$SortDir);
        }elseif($sortCol==6){
            $q->orderby('montant',$SortDir);
        }elseif($sortCol==7){
            $q->orderby('date_inscription',$SortDir);
        }
        $q2    = $q;

     

        $iTotalDisplayRecords = $q2->orderby('id')->count();
        $Abonnee = $q->orderby('id')->offset($displayStart)
                ->limit($displayLength)->get(); 

        return [
            'iTotalRecords' => Abonnee::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $Abonnee
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('association.abonne.add');
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

        if(Abonnee::where('id','<>',$id)->where('n_compteur',$request->input('n_compteur'))->count()>0){
            return view('alerts.operations',[
                'b'   => false,
                 'msg' => 'خطاء في تنفيذ الاجراء'
            ]);
        }

        $Abonnee = Abonnee::find($id);
     
        if($Abonnee==null)

        $Abonnee = new Abonnee;

        $Abonnee->civilite               = $request->input('civilite');
        $Abonnee->etat_social            = $request->input('etat_social');
        //$Abonnee->sexe                   = $request->input('sexe');
        $Abonnee->cin                    = $request->input('cin');
        $Abonnee->n_compteur             = $request->input('n_compteur');
        $Abonnee->nom                    = $request->input('nom');
        $Abonnee->prenom                 = $request->input('prenom');
        $Abonnee->date_naissance         = $request->input('date_naissance');
        $Abonnee->adresse                = $request->input('adresse');
        $Abonnee->tel                    = $request->input('tel');
        $Abonnee->rib                    = $request->input('rib');
        $Abonnee->email                  = $request->input('email');
        $Abonnee->nbr_enfant             = $request->input('nbr_enfant');
        //$Abonnee->montant                = $request->input('montant');
        $Abonnee->note                   = $request->input('note');
        $Abonnee->dernier_index_compteur = $request->input('dernier_index_compteur');
        $Abonnee->date_inscription       = $request->input('date_inscription');

       /* if($Abonnee->user_add != null ){
            $Abonnee->user_update = Auth::user()->name;

        }else{
            $Abonnee->user_add    = Auth::user()->name;
            $Abonnee->user_update = "";
        }
        
        $Abonnee->user_deleted    = "";
        */

        $Abonnee->save();

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
        return view('association.abonne.edit',[
            'Abonnee' => Abonnee::find($id)
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
