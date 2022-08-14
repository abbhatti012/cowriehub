<?php

namespace App\Http\Controllers\Consultant;

use App\Models\Job;
use App\Models\User;
use App\Models\Skill;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Setting;
use App\Mail\NotifyMail;
use App\Models\Consultant;
use App\Models\MarketOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ConsultantController extends Controller
{
    public function index(){
        return view('consultant.index');
    }
    public function consultant_account(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user = Consultant::where('user_id',$_GET['id'])->first();
        } else {
            $user = Consultant::where('user_id',Auth::id())->first();
        }
        
        $skills = Skill::orderBy('id','desc')->get();
        return view('consultant.register',compact('skills','user'));
    }
    public function consultant_signup(Request $request){
        $validatedData = $request->validate([
            'skill' => 'required',
            'skill_certificate' => 'required|mimes:jpeg,png,jpg,svg,doc,docx,odt,pdf,tex,txt,wpd,tiff,tif,csv,psd,key,odp,pps,ppt,pptx,ods,xls,xlsm,xlsx',
            'institution' => 'required',
            'id_type' => 'required',
            'identity_card' => 'required',
            'intro_viedo' => 'required|mimes:jpeg,png,jpg,svg,doc,docx,odt,pdf,tex,txt,wpd,tiff,tif,csv,psd,key,odp,pps,ppt,pptx,ods,xls,xlsm,xlsx',
            'description' => 'required',
            'portfolio' => 'required',
            'terms' => 'required',
        ]);
        $user = new Consultant();
        $user->user_id = Auth::id();
        $user->skill = $request->skill;
        if($request->custom_skill != null){
            $user->custom_skill = $request->custom_skill;
        }
        if($request->skill_certificate != null){
            $UploadImage = 'a'.time().'.'.$request->skill_certificate->extension();
            $request->skill_certificate->move(public_path('images/consultant'), $UploadImage);
            $user->skill_certificate = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->skill_certificate);
        }
        $user->phone_number = $request->phone_number;
        $user->institution = $request->institution;
        if($request->present != null){
            $user->year_of_completion = $request->present;
        } else {
            $user->year_of_completion = $request->year_of_completion;
        }
        $user->id_type = $request->id_type;
        if($request->identity_card != null){
            $UploadImage = 'b'.time().'.'.$request->identity_card->extension();
            $request->identity_card->move(public_path('images/consultant'), $UploadImage);
            $user->identity_card = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->identity_card);
        }
        if($request->intro_viedo != null){
            $UploadImage = 'c'.time().'.'.$request->intro_viedo->extension();
            $request->intro_viedo->move(public_path('images/consultant'), $UploadImage);
            $user->intro_viedo = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->intro_viedo);
        }
        if($request->portfolio != null){
            $UploadImage = 'd'.time().'.'.$request->portfolio->extension();
            $request->portfolio->move(public_path('images/consultant'), $UploadImage);
            $user->portfolio = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->portfolio);
        }
        $user->description = $request->description;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->terms = $request->terms;
        if($user->save()){
            $data['title'] = 'New Applicant';
            $data['to'] = 'cowriehubllc@gmail.com';
            $data['username'] = 'Admin';
            $data['body'] = 'New application as a cowriehub consultant is just added to cowriehub. Please check below link to view!';
            $data['link'] = "admin.consultant";
            $data['linkText'] = "View";
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Applicant!');
            });

            return back()->with('message', ['text'=>'Thank you for your application! Cowriehub will review your application in the next 24-48 hours.
            You will be notified in your email on the status of your application after this review.','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! There is something wring. Your book cannot be added','type'=>'danger']);
        }
    }

    public function update_consultant_signup(Request $request, $id){
        $validatedData = $request->validate([
            'skill' => 'required',
            'skill_certificate' => 'mimes:jpeg,png,jpg,svg,doc,docx,odt,pdf,tex,txt,wpd,tiff,tif,csv,psd,key,odp,pps,ppt,pptx,ods,xls,xlsm,xlsx',
            'institution' => 'required',
            'id_type' => 'required',
            'intro_viedo' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'description' => 'required',
            'terms' => 'required',
        ]);
        $user = Consultant::find($id);
        $user->user_id = Auth::id();
        $user->skill = $request->skill;
        if($request->custom_skill != null){
            $user->custom_skill = $request->custom_skill;
        }
        if($request->skill_certificate != null){
            $UploadImage = 'a'.time().'.'.$request->skill_certificate->extension();
            $request->skill_certificate->move(public_path('images/consultant'), $UploadImage);
            $user->skill_certificate = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->skill_certificate);
        }
        $user->phone_number = $request->phone_number;
        $user->institution = $request->institution;
        if($request->present != null){
            $user->year_of_completion = $request->present;
        } else {
            $user->year_of_completion = $request->year_of_completion;
        }
        $user->id_type = $request->id_type;
        if($request->identity_card != null){
            $UploadImage = 'b'.time().'.'.$request->identity_card->extension();
            $request->identity_card->move(public_path('images/consultant'), $UploadImage);
            $user->identity_card = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->identity_card);
        }
        if($request->intro_viedo != null){
            $UploadImage = 'c'.time().'.'.$request->intro_viedo->extension();
            $request->intro_viedo->move(public_path('images/consultant'), $UploadImage);
            $user->intro_viedo = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->intro_viedo);
        }
        if($request->portfolio != null){
            $UploadImage = 'd'.time().'.'.$request->portfolio->extension();
            $request->portfolio->move(public_path('images/consultant'), $UploadImage);
            $user->portfolio = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->portfolio);
        }
        $user->description = $request->description;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->terms = $request->terms;
        $user->status = 0;
        if($user->save()){
            $data['title'] = 'New Applicant';
            $data['to'] = 'cowriehubllc@gmail.com';
            $data['username'] = 'Admin';
            $data['body'] = 'Consultant just updated its record. Please check below link to view!';
            $data['link'] = "admin.consultant";
            $data['linkText'] = "View";
            Mail::send('email', $data,function ($m) use ($data) {
                $m->to($data['to'])->subject('New Applicant!');
            });

            return back()->with('message', ['text'=>'Thank you for your application! Cowriehub will review your application in the next 24-48 hours.
            You will be notified in your email on the status of your application after this review.','type'=>'success']);
        } else {
            return back()->with('message', ['text'=>'Oops! There is something wring. Your book cannot be added','type'=>'danger']);
        }
    }
    public function update_consultant_status(Request $request, $id, $value){
        $user = Consultant::find($id);
        $user->status = $value;
        $user->save();
        $user_detail = User::find($user->user_id);
        if($value == 1){
            $data['title'] = 'Congratulations!';
            $data['body'] = 'You have been approved as a consultant successfully! You will be assign a specific job soon! We will be keep in touch with you. ';
            $data['body'] .= 'Please click on below link to view your status!';
            $data['link'] = "user.consultant-account";
            $data['param'] = "id=$user->user_id";
            $data['linkText'] = "View";
            $user_detail->role = 'consultant';
        } else {
            $data['title'] = 'Consultant Declined';
            $data['body'] = 'Sorry! we are not going to accept your consultant proposal right now because of incomplete profile.';
            $data['body'] .= 'If you have any question then you can reach to support. By clicking on below link to view status. Thanks!';
            $data['link'] = "user.consultant-account";
            $data['param'] = "id=$user->user_id";
            $data['linkText'] = "View";
            $user_detail->role = 'user';
        }
        $user_detail->save();
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Consultant Action!');
        });

        return back()->with('message', ['text'=>'Consultant status updated succesfully!','type'=>'success']);
    }
    public function delete_consultant(Request $request, $id){
        $user = Consultant::find($id);
        $user_detail = User::where('id',$user->user_id)->first();
        $user->delete();
        
        $data['title'] = 'Consultant Declined';
        $data['body'] = 'Sorry! you are not compatible with our requirements. We are going to remove you from cowriehub.';
        $data['body'] .= ' Better luck next time or click on below link to add accurate details!';
        $data['link'] = "";
        $data['linkText'] = "";
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Consultant Removed!');
        });

        return back()->with('message', ['text'=>'Consultant has been removed successfully!','type'=>'success']);
    }
    public function assign_job(Request $request){
        $job_id = $request->job_id;
        $consultantId = $request->consultantId;
        $user = Consultant::find($consultantId);
        $user->job_id = $job_id;
        $user->save();
        $user_detail = User::where('id',$user->user_id)->first();

        $data['title'] = 'Job Assigned';
        $data['body'] = 'Congratulations!. New job has been assigned to you';
        $data['body'] .= ' Click on below link to view the job!';
        $data['link'] = "user.consultant-account";
        $data['linkText'] = "View";
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('New Job Assigned!');
        });

        return response()->json(true);
    }
    public function payment_detail(Request $request){
        $user = Consultant::where('user_id',Auth::id())->first();
        return view('consultant.payment-detail',compact('user'));
    }
    public function update_payment_detail(Request $request){
        $user = Consultant::where('user_id',Auth::id())->first();
        $user->payment = $request->payment;
        if($request->payment == 'mobile_money'){
            $user->account_name = $request->account_name;
            $user->account_number = $request->account_number;
            $user->networks = $request->networks;

            $user->bank_account_name = '';
            $user->bank_account_number = '';
            $user->branch = '';
            $user->bank_name = '';
        } elseif($request->payment == 'bank_settelments'){
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_account_number = $request->bank_account_number;
            $user->branch = $request->branch;
            $user->bank_name = $request->bank_name;

            $user->account_name = '';
            $user->account_number = '';
            $user->networks = '';
        }
        $user->save();
        return back()->with('message', ['text'=>'Payment detail set successfully!','type'=>'success']);
    }
    public function jobs(){
        $jobs = Job::where('assign_to',Auth::id())->where('job_status',0)->with('user')->with('marketing')->get();
        $setting = Setting::first();
        return view('consultant.jobs', compact('jobs','setting'));
    }
    public function active_jobs(){
        $jobs = Job::where('assign_to',Auth::id())->where('job_status','!=',0)->where('is_completed',0)->with('user')->with('marketing')->get();
        $setting = Setting::first();
        return view('consultant.active-jobs', compact('jobs','setting'));
    }
    public function completed_jobs(){
        $jobs = Job::where('assign_to',Auth::id())->where('job_status','!=',0)->where('is_completed',1)->with('user')->with('marketing')->get();
        $setting = Setting::first();
        return view('consultant.completed-jobs', compact('jobs','setting'));
    }
    public function get_author_detail(Request $request){
        $id = $request->id;
        $user = User::with('author_detail')->find($id);
        return response()->json($user);
    }
    public function get_marketing_detail(Request $request){
        $id = $request->id;
        $user = MarketOrders::with('marketing_detail')->find($id);
        return response()->json($user);
    }
    public function upload_document(Request $request, $id){
        $request->validate([
            'job_status' => 'required',
            'prove_document' => 'required',
            'confirmation' => 'required',
        ]);
        
        $user = Job::find($id);
        $imageArr = $user->document;
        $user->is_completed = $request->job_status;
        $user->confirmation = $request->confirmation;
        $user->document_note = $request->document_note;
        if($imageArr){
            $imageArr = unserialize($imageArr);
        } else {
            $imageArr = [];
        }
        if($request->prove_document != null){
            for($i = 0; $i < count($request->prove_document); $i++){
                $UploadImage = $i.time().'.'.$request->prove_document[$i]->extension();
                $request->prove_document[$i]->move(public_path('images/consultant'), $UploadImage);
                array_push($imageArr,'images/consultant/'.$UploadImage);
            }
            $user->document = serialize($imageArr);
        } else {
            unset($user->prove_document);
        }
        $user->save();

        $data['title'] = 'Job Status';
        $data['body'] = 'One of your updated its job status.';
        $data['body'] .= ' Click on below link to view the status!';
        $data['link'] = "admin.consultant";
        $data['linkText'] = "View";
        $data['to'] = 'cowriehubllc@gmail.com';
        $data['username'] = 'Admin';
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Job Status!');
        });

        return back()->with('message', ['text'=>'Job status has been uploaded succesfully!','type'=>'success']);
    }
    public function approve_marketing_status(Request $request, $id, $value){
        $user = Job::find($id);
        $user->job_status = $value;
        $user->save();
        if($value == 1){
            $data['title'] = 'Congratulations!';
            $data['body'] = 'One of your consultant approved the job! ';
            $data['body'] .= 'Please click on below link to view the status!';
            $data['link'] = "admin.consultant";
            $data['linkText'] = "View";
        } else {
            $data['title'] = 'Job Declined';
            $data['body'] = 'One of your consultant did not approve the job.';
            $data['body'] .= 'Please click on below link to view status. Thanks :(';
            $data['link'] = "admin.consultant";
            $data['linkText'] = "View";
        }
        $data['to'] = 'cowriehubllc@gmail.com';
        $data['username'] = 'Admin';
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Consultant Job Status!');
        });

        return back()->with('message', ['text'=>'Job status has been updated succesfully!','type'=>'success']);
    }
    public function submit_payment_proof(Request $request){
        $id = $request->marketingId;
        if($id == 0){
            return back()->with('message', ['text'=>'Proof not sent! Something goes wrong','type'=>'danger']);
        }
        $user = Job::find($id);
        $user->payment_note = $request->payment_note;
        $user->is_payment = 1;
        if($request->payment_proof != null){
            $UploadImage = time().'.'.$request->payment_proof->extension();
            $request->payment_proof->move(public_path('images/consultant'), $UploadImage);
            $user->payment_proof = 'images/consultant/'.$UploadImage;
        } else {
            unset($user->payment_proof);
        }
        $user->save();

        $user_detail = User::where('id',$user->assign_to)->first();

        $data['title'] = 'Payment Sent';
        $data['body'] = 'COWRIEHUB just make a payment of you, Please click on below link to view your payment proof!';
        $data['link'] = "consultant.jobs";
        $data['linkText'] = "View";
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Payment Sent!');
        });
        return back()->with('message', ['text'=>'Payment proof sent succesfully!','type'=>'success']);
    }
    public function submit_author_payment_proof(Request $request){
        $id = $request->revenueId;
        if($id == 0){
            return back()->with('message', ['text'=>'Proof not sent! Something goes wrong','type'=>'danger']);
        }
        $user = Revenue::find($id);
        $user->payment_note = $request->payment_note;
        $user->admin_payment_status = 1;
        if($request->payment_proof != null){
            $UploadImage = time().'.'.$request->payment_proof->extension();
            $request->payment_proof->move(public_path('images/proofs'), $UploadImage);
            $user->payment_proof = 'images/proofs/'.$UploadImage;
        } else {
            unset($user->payment_proof);
        }
        $user->save();

        $user_detail = User::where('id',$user->user_id)->first();

        $data['title'] = 'Payment Sent';
        $data['body'] = 'COWRIEHUB just make a payment of you, Please check your account for verification of visit to cowriehub for payment proof!';
        $data['link'] = "";
        $data['linkText'] = "";
        $data['to'] = $user_detail->email;
        $data['username'] = $user_detail->name;
        Mail::send('email', $data,function ($m) use ($data) {
            $m->to($data['to'])->subject('Payment Sent!');
        });
        return back()->with('message', ['text'=>'Payment proof sent succesfully!','type'=>'success']);
    }
    public function stat(Request $request){
        $id = $request->id;
        if(isset($request->date) && !empty($request->date)){
            $date = explode(' - ',$request->date);
            $start_date = date('Y-m-d',strtotime($date[0]));
            $end_date = date('Y-m-d',strtotime($date[1]));
            $date = [0=>$start_date,1=>$end_date];
            $graphOrders = Revenue::select('*')
            ->whereBetween('created_at',$date)->where('user_id',$id);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);
            
            $revenues = Revenue::where('user_id',Auth::id())->where('payment_status',1)
            ->whereBetween('created_at',$date)->with('user')->get();
            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN user_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN user_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        } else {
            $query_date = date('Y-m-d',strtotime(now()));
            $start_date = date('Y-m-01', strtotime($query_date));
            $end_date = date('Y-m-t', strtotime($query_date));

            $graphOrders = Revenue::select('*')
            ->where('created_at', '>=' ,$start_date)
            ->where('created_at', '<' ,$end_date)->where('user_id',$id);
            $get_date_series = $this->get_date_series($start_date, $end_date);
            $days = count($get_date_series);
            $graph = $this->get_labels($days, $graphOrders->get(), $get_date_series);
            $earning = $graphOrders->select(DB::raw("SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 1 THEN user_amount ELSE 0 END) AS earning, ".
                        "SUM(CASE WHEN payment_status = 1 AND admin_payment_status = 0 THEN user_amount ELSE 0 END) AS pending_earning"))
            ->groupBy('id')->get()->toArray();
            $revenues = Revenue::where('user_id',Auth::id())->where('payment_status',1)
            ->with('user')->get();
            $approved = 0;
            $pending = 0;
            foreach($earning as $earn){
                $approved = $approved + $earn['earning'];
                $pending = $pending + $earn['pending_earning'];
            }
        }
        $ordermcount = [];
        $orderArr = [];
        $ordermnet = [];
        foreach ($graph['orders'] as $key => $order) {
            $sum = 0;
            foreach($order as $value){
                $sum = $sum + $value->user_amount;
            }
            $ordermcount[(int)$key] = count($order);
            $ordermnet[(int)$key] = $sum;
        }
        for($i = 0; $i < $graph['count']; $i++){
            if(!empty($ordermcount[$i])){
                $orderCountArr[$i] = $ordermcount[$i]; 
            }else{
                $orderCountArr[$i] = 0;
            }
            if(!empty($ordermnet[$i])){
                $orderNetArr[$i] = $ordermnet[$i]; 
            }else{
                $orderNetArr[$i] = 0;
            }
        }
        $graph_data['orderCountArr'] = $orderCountArr;
        $graph_data['orderNetArr'] = $orderNetArr;
        $graph_data['label'] = $graph['label'];
        $graph_data['id'] = $id;
        return view('consultant.stat',compact('graph_data'));
    }
    public function get_date_series($start_date, $end_date){
        $dates = array();
        $current = strtotime($start_date);
        $date2 = strtotime($end_date);
        $stepVal = '+1 day';
        while( $current <= $date2 ) {
            $dates[] = date('d-M', $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }
    public function get_labels($days, $graphOrders, $get_date_series){
        if($days >= 0 && $days <= 1){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('h');
            });
           
            $data['label'] = ['1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM','8PM' ,'9PM', '10PM', '11PM', '12AM', '13AM', '14AM', '15AM', '16AM', '17AM', '18AM', '19AM', '20AM', '21AM', '22AM', '23AM', '00PM'];
            $data['count'] = 24;
        } else if($days > 1 && $days <= 14){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
           
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 14 && $days < 30){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days >= 29 && $days <= 31){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d');
            });
            
            $data['label'] = $get_date_series;
            $data['count'] = $days;
        } else if($days > 31 && $days < 365){
            $data['orders'] = $graphOrders->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m');
            });
            
            $data['label'] = ['JAN', 'FEB', 'MARCH', 'APRIL', 'MAY', 'JUN', 'JUL', 'AUG', 'SEPT', 'OCT', 'NOV', 'DEC'];
            $data['count'] = 12;
        }
        return $data;
    }
}
