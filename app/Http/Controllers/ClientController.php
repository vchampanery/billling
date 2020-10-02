<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\ModuleMaster;
use App\Model\ClientMaster;
use App\User;
use App\Model\SoftwareMaster;
use App\Model\UserAssignMaster;

class ClientController extends Controller
{
    private  $fields = ['client_master_name'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $fields = $this->fields;
        $action = 'add';
        $userList = User::where('email', '<>','vt@gmail.com')->get()->toArray();
        $softwareList = SoftwareMaster::all()->toArray();
        $userAssignMaster = [1];
        $clientMaster = [];
//        $clientList = SoftwareMaster::all()->toArray();
        return view('client.create',compact('permission','fields','action','userList','softwareList','userAssignMaster'));
//        return view('client.create',compact('permission','fields','action','clientMaster','userAssignMaster','userList','softwareList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $data = request()->all();
        if($data['action'] == 'Edit'){
            unset($data['_token']);
            unset($data['action']);
            //update clieint mater
           ClientMaster::where('client_master_id', '=', $data['client_master_id'])->update(
               ['client_master_name'=>$data['client_master_name'],
                   'software_master_id'=>$data['software_master_id']]);
           
            //update userassignmaster
            if(isset($data["user_master_id"])){
                 $userassignmasterData['client_master_id'] = $data['client_master_id'];
                UserAssignMaster::where('client_master_id',$data['client_master_id'])->forceDelete();
                foreach($data["user_master_id"] as $dKey=>$dVlu){
                    $userassignmasterData['user_master_id'] = $dVlu;
                    UserAssignMaster::create($userassignmasterData); 
                }
            }
//            ModuleMaster::where('module_master_id', '=', $data['client_master_id'])->update($data);
        } else {
            //insert client
            $clientData['client_master_name'] = $data['client_master_name'];
            $clientData['software_master_id'] = $data['software_master_id'];
            $client_id = ClientMaster::create($clientData); 
            $clinetId = $client_id->id;
            $userassignmasterData['client_master_id'] = $clinetId;
            //assign client
            if(isset($data["user_master_id"])){
                foreach($data["user_master_id"] as $dKey=>$dVlu){
                    $userassignmasterData['user_master_id'] = $dVlu;
                    UserAssignMaster::create($userassignmasterData); 
                }
            }
        }
        $fields = $this->fields;
        return redirect()->route('client.show');
    }
    
    public function checkIntegration(){
       
            $username = 'vchampanery';
            $password = 'brown@123';
            $messages = array(
              array('to'=>'+919033379562', 'body'=>'Hello World! from viral champanery'),
              array('to'=>'+919737214839', 'body'=>'Hello World! from viral champanery')
            );  

            $result = $this->send_message( json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password );

            if ($result['http_status'] != 201) {
              print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response']);
            } else {
              print "Response " . $result['server_response'];
              // Use json_decode($result['server_response']) to work with the response further
            }
    }
    
    public function send_message ( $post_body, $url, $username, $password) {
            $ch = curl_init( );
            $headers = array(
            'Content-Type:application/json',
            'Authorization:Basic '. base64_encode("$username:$password")
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
            // Allow cUrl functions 20 seconds to execute
            curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
            // Wait 10 seconds while trying to connect
            curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
            $output = array();
            $output['server_response'] = curl_exec( $ch );
            $curl_info = curl_getinfo( $ch );
            $output['http_status'] = $curl_info[ 'http_code' ];
            $output['error'] = curl_error($ch);
            curl_close( $ch );
            return $output;
    } 
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
         $fields = $this->fields;
        if ($request->ajax()) {
            $fields[]='client_master_id';
            $data = ClientMaster::latest()->get($fields);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('client.show',compact('fields'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        
        $action = 'Edit';
        $permission = Permission::get();
        $fields = $this->fields;
        $fields[]='client_master_id';
        $fields[]='software_master_id';
        $clientMaster = ClientMaster::where('client_master_id',$customer_id)->first($fields)->toArray();
       
        $userAssignMaster = UserAssignMaster::where('client_master_id',$customer_id)->get()->pluck('user_master_id')->toArray();
        
        //list 
        $userList = User::where('email', '<>','vt@gmail.com')->get()->toArray();
        $softwareList = SoftwareMaster::all()->toArray();
        $userSelectedList =[];
//        dd($userAssignMaster);
        if($userAssignMaster){
            foreach($userAssignMaster as $uamK => $uamY){
                
                $userSelectedList[] = $uamY;
            }
        }
        return view('client.create',compact('permission','fields','action','clientMaster','userAssignMaster','userList','softwareList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientMaster $patientMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PatientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientMaster $patientMaster)
    {
        //
    }
}
