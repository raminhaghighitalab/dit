<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use IlluminateSupportFacadesHash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MassageController extends Controller
{
    
    public function store(Request $request)
    {
       
            $request->validate([
            'name'           =>   'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'email'          =>   'required|email|unique:cruds',
            'phone'          =>   'required|regex:/(^[-0-9,\/ ]+$)/',

        ]);
           $form_data = array(
            'name'               =>   $request->name,
            'email'              =>   $request->email,
            'phone'              =>   $request->phone,

        );
        

        $usermail=$request->email;
        // dd($usermail);
        $this->password = Str::random( 8 );
          
        Crud::create($form_data);
       //sending an email to user
        $mailData = [
            'title' => 'Mail from DIT',
            'body' => 'Welcome',
            'password'=>$this->password,
        ];
         
        Mail::to($usermail)->send(new DemoMail($mailData));
         return redirect('/#footer')->with('success', 'Your application has been submitted,Please check your mailbox after 5 minutes');
    }

}
