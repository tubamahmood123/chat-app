<?php

namespace App\Http\Controllers;
use Auth;
use DateTime;
use App\User;
use App\Message;
use App\Eventevent\UserCreated;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ContactsController extends Controller
{
    public function get()
    {
    


    	$contacts= User::where('id','!=',auth()->id())->get();

       

            $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        
    	return response()->json($contacts);
    }

 public function getMessagesFor($id)
 { 
   Message::where('from',$id)->where('to',auth()->id())->update(['read'=>true]);
   $messages= Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();
   
   return response()->json($messages);

 }
  public function send(Request $request)
{
  $message=Message::create(['from'=>auth()->id(),
                             'to'=>$request->contact_id,
                             'date'=>Carbon::now()->toFormattedDateString(),
                             'time'=>Carbon::now()->format('g:i A'),
                             'text'=>$request->text,
                        ]);
 broadcast(new NewMessage($message));
 return response()->json($message);
}


public function lastseen()
{
    if(Auth::check()) {
 User::where('id', Auth::user()->id)->update(['date'=>Carbon::now()->toFormattedDateString(),
                             'time'=>Carbon::now()->format('g:i A')]);
}


$date = Carbon::now()->toFormattedDateString();

$cont=$date;
return response()->json($cont);}


public function lastseentt()
{
$time = Carbon::now()->format('g:i A');
$tim=$time;
return response()->json($tim);}



 public function lastseentime($id)
{
    
$lastseen= User::select('id','date','time')->where('id',$id)->get();
 return response()->json($lastseen);}


public function index()

 {

 	event(new UserCreated(Carbon::now()->toFormattedDateString()));
 }
}