<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat;

class ChatController extends Controller
{
	public function index()
	{
		$chats = Chat::get();
		return view('user.chat.index',compact('chats'));
	}

	public function ajax()
	{	
		ini_set('max_execution_time',7200);

		while (Chat::where('check',0)->count() < 1) 
		{
			usleep(1000);
		}
		if (Chat::where('check',0)->count() > 0) 
		{
			$data = Chat::where('check',0)->first();
			$id = $data->id;
			$edit = Chat::find($id);
			$edit->check = 1;
			$edit->save();

			return response()->json([
				'msg'=>$data->msg,
				]);
		}
	}

	public function store(Request $request)
	{
		$add = new Chat;
		$add->msg = $request->Input('msg');
		$add->save();
	}
}