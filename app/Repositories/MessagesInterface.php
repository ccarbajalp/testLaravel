<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface MessagesInterface
{
    public function getPaginated();
    public function store($request);
    public function findById($id);
    public function update(Request $request, $id);
    public function destroy($id);
}
