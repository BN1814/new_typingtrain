<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    //
    function Contact() {
        return view('contact');
    }
    function sendContact(Request $req) {
        $req->validate([
            'email' => 'required',
            'phone' => 'required',
            'topic' => 'required',
        ],[
            'email.required' => 'กรุณาใส่อีเมล',
            'phone.required' => 'กรุณาใส่เบอร์โทรศัพท์',
            'topic.required' => 'กรุณาใส่เรื่องที่ต้องการติดต่อ',
        ]);

        $details = [
            'email' => $req->email,
            'phone' => $req->phone,
            'topic' => $req->topic,
        ];

        Mail::to('typingtrain.01@gmail.com')->send(new ContactMail($details));
        return redirect()->back()->with('send-success', 'ส่งข้อมูลติดต่อเรียบร้อยแล้ว');
    }
}
