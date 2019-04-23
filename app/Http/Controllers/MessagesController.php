<?php

namespace App\Http\Controllers;

use App\Repositories\MessagesInterface;
use Illuminate\Http\Request;
use DB;
use Session;
//use App\Message;
use App\Providers\App\Events\MessageWasReceived;
//use Illuminate\Support\Facades\Cache;
//use App\Repositories\CacheMessages;

class MessagesController extends Controller
{
    protected $messages;
    public function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*Messages $messages*/)
    {
        /*$key = "messages.page.".\request('page', 1);

        $messages = Cache::tags('messages')->rememberForever($key, function(){
           return Message::with(['user','note','tags'])
           ->orderBy('created_at', request('sorted', 'ASC'))
           ->paginate(10);
        });*/


        /*if(Cache::has($key))
        {
            $messages = Cache::get($key);
        }else{
            $messages = Message::with(['user','note','tags'])
                //->latest()
                ->orderBy('created_at',request('sorted','ASC'))
                ->paginate(10);

            Cache::put($key,$messages, 350);
        }*/
        //$messages= DB::table('messages')->get();

        //return $messages;
        //Session::has('page') ? dd(Session::get('page')):'';

            $messages = $this->messages->getPaginated();


        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        /*DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);*/

        /*$message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();*/

        /*Message::create([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
        ]);*/
        //Model::unguard();
        //dd($request->all());
        /*$this->validate($request, [
            'nombre' => 'required',
            'email' => 'required',
            'mensaje' => 'required',
        ]);*/

        /*$message = Message::create($request->all());

        if(auth()->check()){
            auth()->user()->messages()->save($message);
        }

        Cache::tags('messages')->flush();*/

        $message = $this->messages->store($request);
        event(new MessageWasReceived($message));
        /*Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });*/

        return redirect()->route('mensajes.create')->with('info','Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message=DB::table('messages')->where('id',$id)->first();
        /*$message = Cache::tags('messages')->rememberForever("messages.{$id}", function() use ($id){
            return Message::findOrFail($id);
        });*/
        $message=$this->messages->findById($id);

        //$message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //$message=DB::table('messages')->where('id',$id)->first();
        //$message = Message::findOrFail($id);
        //$message = Cache::remember("messages.{$id}", 350, function() use ($id){
        /*$message = Cache::tags('messages')->rememberForever("messages.{$id}", function() use ($id){
            return Message::findOrFail($id);
        });*/

        $message=$this->messages->findById($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*DB::table('messages')->where('id',$id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now()
        ]);*/
        //Message::findOrFail($id)->update($request->all());
        $this->messages->update($request, $id);

        Session::put('savePage', Session::get('Currentpage'));

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('messages')->where('id', $id)->delete();
        /*Message::findOrFail($id)->delete();
        Cache::tags('messages')->flush();*/
        $this->messages->destroy($id);
        return redirect()->route('mensajes.index');
    }
}
