<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    //seo setting
    public function seo(){
        $data = DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));
    }
    public function seoUpdate(Request $request,$id){

        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['google_varification']=$request->google_varification;
        $data['alexa_varification']=$request->alexa_varification;
        $data['google_analytics']=$request->google_analytics;
        $data['google_adsense']=$request->google_adsense;
        DB::table('seos')->where('id','=',$id)->update($data);

        $notification=array('message' => 'SEO Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    //smtp setting

    public function smtp(){

        $data = DB::table('smtp')->first();
        return view('admin.setting.smtp',compact('data'));
    }

    public function smtpUpdate(Request $request,$id){

        $data=array();
        $data['mailer']=$request->mailer;
        $data['host']=$request->host;
        $data['port']=$request->port;
        $data['user_name']=$request->user_name;
        $data['password']=$request->password;
        DB::table('smtp')->where('id','=',$id)->update($data);
        $notification=array('message' => 'SMTP Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //website settings

    public function website(){

        $settings = DB::table('settings')->first();
        return view('admin.setting.website_setting',compact('settings'));
    }

    public function websiteUpdate(Request $request,$id){

        $data = array();
        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

        if ($request->logo){
            $logo = $request->logo;
            $logo_name = uniqid().'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->resize(320,120)->save('files/setting/'.$logo_name); //Image Intervention
            $data['logo'] = 'files/setting/'.$logo_name;
        }else{
            $data['logo'] = $request->old_logo;
        }
        if ($request->favicon){
            $favicon = $request->favicon;
            $favicon_name = uniqid().'.'.$favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(32,32)->save('files/setting/'.$favicon_name); //Image Intervention
            $data['favicon'] = 'files/setting/'.$favicon_name;
        }else{
            $data['favicon'] = $request->old_favicon;
        }

        DB::table('settings')->where('id','=',$id)->update($data);
        $notification=array('message' => 'Website Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
