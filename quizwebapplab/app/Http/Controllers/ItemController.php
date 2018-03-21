<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Exception;


class ItemController extends Controller
{
    protected $item;

    public function __construct(Item $item){
		$this->item = $item;
	}

	public function showAll()
	{
		$items = $this->item->all();

		return response()->json($items,200);
	}


	public function add(Request $request)
	{
		$item = [
			"user_id" => $request->user_id,
			"name" => $request->name,
			"price"=> $request->price,
			"stock"=> $request->stock
		];

		$item = $this->item->create($item);

		return response()->json($item,200);
	}

	 public function update(Request $request)
    {
        $itemnew = [
           "user_id" => $request->user_id,
			"name" => $request->name,
			"price"=> $request->price,
			"stock"=> $request->stock
        ];
        $item = $this->item->where("id", "=", "$request->id")->update($itemnew);
         $item = $this->item->where("id", "=", "$request->id")->get();

        return response()->json($item,200);
    }

    public function delete($id)
    {
        $item = $this->item->where("id", "=", "$id")->delete();

        return response()->json($item,200);
    }


}
