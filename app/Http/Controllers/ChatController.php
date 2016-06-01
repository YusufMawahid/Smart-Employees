<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Auth;

class ChatController extends Controller
{
	public function index()
	{
			$users = User::where('id','<>',auth()->user()->id)->get();
			return view('user.chat.index',['users'=>$users]);
	}

	public function userMessage($id)
	{
			$users = User::where('id','<>',auth()->user()->id)->get();
			$user = User::find($id);
			$user_login = User::find(Auth::user()->id);

			$messages = Chat::where(function($query) use($user_login,$user){
				$query->where('receiver_id',$user_login->id)
							->where('user_id',$user->id);
			})
			->orWhere(function($query) use($user_login,$user){
				$query->where('receiver_id',$user->id)
							->where('user_id',$user_login->id);
			})
			->get();

			return view('user.chat.show',['users'=>$users,'user_login'=>$user_login,'user'=>$user,'messages'=>$messages]);
	}

	public function sendMessage(Request $r)
	{
			$user_id = $r->input('user_id');
			$receiver_id = $r->input('receiver_id');
			$msg = $r->input('msg');

			$chat = new Chat;
			$chat->user_id = $user_id;
			$chat->receiver_id = $receiver_id;
			$chat->msg = $msg;
			$chat->check = 0;
			$chat->save();

			$success = true;

			return response()->json(compact('success'));
	}

	public function reloadMessage($id)
	{
		$user = User::find($id);
		$user_login = User::find(Auth::user()->id);

		$messages = Chat::where(function($query) use($user_login,$user){
			$query->where('receiver_id',$user_login->id)
						->where('user_id',$user->id);
		})
		->orWhere(function($query) use($user_login,$user){
			$query->where('receiver_id',$user->id)
						->where('user_id',$user_login->id);
		})
		->get();

		foreach ($messages as $message) {
			if ($message->user_id==Auth::user()->id) {
				echo '<div class="direct-chat-msg right">';
				echo '<div class="direct-chat-info clearfix">';
				echo '<span class="direct-chat-name pull-right">'.$message->user->nama.'</span>';
				echo '<span class="direct-chat-timestamp pull-left">'.$message->created_at.'</span>';
				echo '</div>';
				echo '<img class="direct-chat-img" src='.url('images'.'/'.$message->user->photo).' alt='.$message->user->nama.'>';
				echo '<div class="direct-chat-text">';
				echo $message->msg;
				echo '</div>';
				echo '</div>';
			}

			else {
				echo '<div class="direct-chat-msg">';
				echo '<div class="direct-chat-info clearfix">';
				echo '<span class="direct-chat-name pull-left">'.$message->user->nama.'</span>';
				echo '<span class="direct-chat-timestamp pull-right">'.$message->created_at.'</span>';
				echo '</div>';
				echo '<img class="direct-chat-img" src='.url('images'.'/'.$message->user->photo).' alt='.$message->user->nama.'>';
				echo '<div class="direct-chat-text">';
				echo $message->msg;
				echo '</div>';
				echo '</div>';
			}
		}

		// return response()->json(compact('messages'));
	}
}
