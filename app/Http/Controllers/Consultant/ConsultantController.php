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
        $users = Payment::select('*')->where('user_id',$request->id)
        ->whereYear('created_at', date('Y'))
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
        $filter['year'] = date('Y');

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        return view('consultant.stat',compact('userArr','filter'));
    }
}
