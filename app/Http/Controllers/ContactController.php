<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use \Validator;
use Helpers;
use  App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::latest()->paginate(7);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|max:15|min:11',
            'message' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,odt,txt|max:500000',
            'sender_ip' => 'required|ip',
        ]);

        $data = $request->all();

        $data['file'] = Helpers::uploadFile("file", "files", $request);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $contact = Contact::create($data);
        $data['created_at'] = $contact->created_at;

        \Mail::to(env('MAIL_RECEIVES_MESSAGE'))->send(new SendMail($data, 'Mensagem de ' . $request->name, $data['file']));

        return  array('message' => 'Mensagem enviada com sucesso!');;
    }
}
