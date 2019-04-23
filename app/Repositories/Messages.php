<?php
namespace App\Repositories;

use App\Message;
use Illuminate\Http\Request;
use Session;

class Messages implements MessagesInterface
{
    public function getPaginated()
    {

        if (Session::has('savePage')) {

        $message = Message::with(['user', 'note', 'tags'])
            ->orderBy('created_at', request('sorted', 'ASC'))
            ->paginate(10, ['*'], 'page', Session::get('savePage'));


            Session::forget('savePage');
            Session::forget('Currentpage');
        }else
        {
            $message = Message::with(['user', 'note', 'tags'])
                ->orderBy('created_at', request('sorted', 'ASC'))
                ->paginate(10);
        }

        //$message->appends(['page' => '2'])->render();

        return $message;
    }
    public function store($request){
        $message = Message::create($request->all());

        if(auth()->check()){
            auth()->user()->messages()->save($message);
        }

        return $message;
    }
    public function findById($id){
        return Message::findOrFail($id);
    }
    public function update(Request $request, $id){
        return Message::findOrFail($id)->update($request->all());
    }
    public function destroy($id){
        return Message::findOrFail($id)->delete();
    }
}
