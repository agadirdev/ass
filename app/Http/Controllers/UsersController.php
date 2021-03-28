<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('association.users.index');
    }
    public function index_role()
    {
        return view('association.role.index');
    }
    public function get_users(Request $request){

        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = User::where('id','>',0);


        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('cin ','like','%'.$search.'%')                
                ->orWhere('name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orwhere('responsabilite','like','%'.$search.'%')
                ->orWhere('tel','like','%'.$search.'%')
                ->orWhere('role','like','%'.$search.'%')
                ->orWhere('date_exp','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('cin',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('name',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('email',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('responsabilite',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('tel',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('role',$SortDir);
        }elseif($sortCol==6){
            $q->orderby('date_exp',$SortDir);
        }
        $q2    = $q;


        $iTotalDisplayRecords = $q2->orderby('id')->count();
        $Users = $q->orderby('id')->offset($displayStart)
                ->limit($displayLength)->get(); 

        return [
            'iTotalRecords' => User::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $Users
        ];
    }
    public function get_users_role(Request $request){

        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Role::where('id','>',0);


        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('role ','like','%'.$search.'%')                
                ->orWhere('type','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('role',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('type',$SortDir);
        }
        $q2    = $q;


        $iTotalDisplayRecords = $q2->orderby('id')->count();
        $Role = $q->orderby('id')->offset($displayStart)
                ->limit($displayLength)->get(); 

        return [
            'iTotalRecords' => Role::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $Role
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('association.users.add',[
        'roles' => Role::all()
    ]);
    }
    public function create_role()
    {
       return view('association.role.add');
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

        if(User::where('id','<>',$id)->where('cin',$request->input('cin'))->count()>0){
            return view('alerts.operations',[
                'b'   => false,
                 'msg' => 'خطاء في تنفيذ الاجراء'
            ]);
        }

        $User = User::find($id);
     
        if($User==null)

        $User = new User;

        $User->cin             = $request->input('cin');
        $User->name            = $request->input('name');
        $User->email           = $request->input('email');
        $User->password        = Hash::make('654321');
        $User->responsabilite  = $request->input('responsabilite');
        $User->adresse         = $request->input('adresse');
        $User->tel             = $request->input('tel');
        $User->role            = $request->input('role');
        $User->date_exp        = $request->input('date_exp');

       /* if($User->user_add != null ){
            $User->user_update = Auth::user()->name;

        }else{
            $User->user_add    = Auth::user()->name;
            $User->user_update = "";
        }
        
        $User->user_deleted    = "";
        */

        $User->save();

        return view('alerts.operations',[
                    'b' => true,
                    'msg' => 'العملية تمت بنجاح'
            ]);   

     }
    public function store_role(Request $request)
    {
        $id = $request->input('id');

        if(User::where('id','<>',$id)->where('role',$request->input('role'))->count()>0){
            return view('alerts.operations',[
                'b'   => false,
                 'msg' => 'خطاء في تنفيذ الاجراء'
            ]);
        }

        $Role = Role::find($id);
     
        if($Role==null)

        $Role = new Role;

        $Role->role            = $request->input('role');
        $Role->type            = $request->input('type');

       /* if($Role->user_add != null ){
            $Role->user_update = Auth::user()->name;

        }else{
            $Role->user_add    = Auth::user()->name;
            $Role->user_update = "";
        }
        
        $Role->user_deleted    = "";
        */

        $Role->save();

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
       return view('association.users.edit',[
        'users' => User::find($id),
        'roles' => Role::all()
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
