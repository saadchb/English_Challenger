<?php

namespace App\Http\Controllers;

use App\Mail\InscriptionMail;
use App\Mail\teacherMail;
use App\Mail\userMail;
use App\Models\Message;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search1'))
        {
            $messages = Message::where('name',"like", '%' .request('search1').'%')->paginate(6);
        }
        else
        {
            $messages = Message::query()->latest()->paginate(6);
        }
        $teachers = Teacher::all();
        return view('Backend_editor.messages.index',compact('messages','teachers'));
    }

    public function accept_teacher(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update(['isAdmin' => 2]);
        return redirect()->back()->with('success', 'Teacher status updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
  */
        public function store(Request $request)
        {
            // Validate form data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'messages' => 'required',
            ]);
        //    dd($request);
            // $imagePath =null;
            // if($request->hasFile('photo')){
            // $imagePath = $request->file('photo')->store('images', 'public');
            // }
            // Create message
           $messages = Message::create([
                'name' => $request->name,
                'photo' =>  $request->photo,
                'email' => $request->email,
                'phone' => $request->phone,
                'messages' => $request->messages,
               
            ]); 
            Mail::to($messages->email)->send(new teacherMail($messages)); // Pass $users instead of $user
 
            return redirect()->back()->with('success', 'Message sent successfully!');
        }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = 'dachboard';
        $message = Message::findOrFail($id);
        
            $message->read_at = now();
            $message->save();
        return view('Backend_editor.messages.show',compact('message','table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success','Message removed successfully');
    }
}
