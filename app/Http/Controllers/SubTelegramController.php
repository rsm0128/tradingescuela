<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\TelegramSpam;
use App\TelegramCommand;
use Telegram;

class SubTelegramController extends Controller
{
    public function createView()
    {
        $data['page_title'] = "Create New Telegram Command";
        return view('telegram.create',$data);
    }
    public function createCommand(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:telegram_commands,name',
            'message' => 'required',
        ]);
        
        $data['name'] = $request->name;
        $data['message'] = $request->message;
        $data['description'] = $request->description;

        TelegramCommand::create($data);
        session()->flash('message', 'Telegram Command Created Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function getTelegramCommands()
    {
        $data['page_title'] = "Telegram Commands";
        $data['commands'] = TelegramCommand::paginate(8);
        return view('telegram.commands',$data);
    }
    public function editView($id)
    {
        $data['page_title'] = "Edit Telegram Command";
        $data['command'] = TelegramCommand::findOrFail($id);
        return view('telegram.edit',$data);
    }
    public function updateCommand(Request $request)
    {
        $command = TelegramCommand::findOrFail($request->command_id);
        $request->validate([
            'name' => 'required|unique:telegram_commands,name,'.$command->id,
            'message' => 'required',
        ]);
        $command->name = $request->name;
        $command->message = $request->message;
        $command->description = $request->description;
        $command->update();
        session()->flash('message', 'Telegram Command Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function deleteCommand(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $command = TelegramCommand::findOrFail($request->id);
        $command->delete();
        session()->flash('message', 'Telegram Command Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    
    // Spam controllers
    public function createSpamView()
    {
        $data['page_title'] = "Create New Telegram Spam Key Word";
        return view('telegram.spam-create',$data);
    }
    public function createSpam(Request $request)
    {
        $request->validate([
            'keyword' => 'required|unique:telegram_spam_words,keyword',
        ]);
        
        $data['keyword'] = $request->keyword;
        $data['description'] = $request->description;

        TelegramSpam::create($data);
        session()->flash('message', 'Created Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function getTelegramSpams()
    {
        $data['page_title'] = "Telegram Spam Words";
        $data['spams'] = TelegramSpam::paginate(8);
        return view('telegram.spams',$data);
    }
    public function editSpamView($id)
    {
        $data['page_title'] = "Edit Telegram Spam Word";
        $data['spam'] = TelegramSpam::findOrFail($id);
        return view('telegram.edit-spam',$data);
    }
    public function updateSpam(Request $request)
    {
        $spam = TelegramSpam::findOrFail($request->spam_id);
        $request->validate([
            'keyword' => 'required|unique:telegram_spam_words,keyword,'.$spam->id,
            'description' => 'required',
        ]);
        $spam->keyword = $request->keyword;
        $spam->description = $request->description;
        $spam->update();
        session()->flash('message', 'Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function deleteSpam(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $spam = TelegramSpam::findOrFail($request->id);
        $spam->delete();
        session()->flash('message', 'Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
}
