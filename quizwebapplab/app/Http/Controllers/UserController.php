<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Exception;

class UserController extends Controller
{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function showAll()
	{
		$user = $this->user->all();

		return response()->json($user,200);
	}

	public function register(Request $request)
	{
		$user = [
			"name" => $request->name,
			"email"=> $request->email,
			"password"=> md5($request->password)
		];

		$user = $this->user->create($user);

		return response()->json($user,200);
	}

	public function find($id)
    {
    	$user = $this->user->where("id", "=", "$id")->get();

       
        return response()->json($user,200);
    }


    public function delete($id)
    {
        $user = $this->user->where("id", "=", "$id")->delete();

        return response()->json($user,200);
    }

    public function update(Request $request)
    {
        $usernew = [
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => md5($request->password)
        ];
        $user = $this->user->where("id", "=", "$request->id")->update($usernew);
        $user = $this->user->where("id", "=", "$request->id")->get();

        return response()->json($user,200);
    }

    public function showItemsbyUser($id)
    {
    	$idUser = User::where('id','=',$id)->value('id');
    	$nameUser = User::where('id','=',$id)->value('name');

    	$data["id"]= $idUser;
    	$data["name"]= $nameUser;
    	$data["items"]=[
    		Item::where('user_id', '=', $id)->get()];
    		return response()->json($data,200);
    }
}
