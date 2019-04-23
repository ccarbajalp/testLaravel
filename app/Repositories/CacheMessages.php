<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Session;

class CacheMessages implements MessagesInterface
{
    protected $messages;
    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function getPaginated(){
        if (Session::has('savePage')) {

            Session::forget('savePage');
            Session::forget('Currentpage');
        }

        $key = "messages.page.".\request('page', 1);

        //return Cache::tags('messages')->rememberForever($key, function(){
        return Cache::rememberForever($key, function(){
            return $this->messages->getPaginated();
        });
    }
    public function store($request){
        //Cache::tags('messages')->flush();
        Cache::flush();

        return $this->messages->store($request);
    }
    public function findById($id){
        //return Cache::tags('messages')->rememberForever("messages.{$id}", function() use ($id){
        return Cache::rememberForever("messages.{$id}", function() use ($id){
            return $this->messages->findById($id);
        });
    }
    public function update(Request $request, $id){
        //Cache::tags('messages')->flush();
        Cache::flush();
        return $this->messages->update($request, $id);
    }
    public function destroy($id){
        //Cache::tags('messages')->flush();
        Cache::flush();
        return $this->messages->destroy($id);
    }
}
