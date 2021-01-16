<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseContoller;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Food as FoodResource;
use Routes\Food\FoodRoute;

class FoodController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();

        return $this->sendResponse(FoodResource::collection($foods), 'Foods retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|min:1, max:35',
            'category_id' => 'required',
            'price' => 'required|between:0,999999.99',
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $food = new Food;
        $food->name = $input['name'];
        $food->category_id = $input['category_id'];
        $food->price = $input['price'];
        $food->save();

        return $this->sendResponse(new FoodResource($food), 'Food created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);

        if(is_null($food)) {
            return $this->sendError('Food is not found.');
        }

        return $this->sendResponse(new FoodResource($food), 'Food retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|min:1, max:35',
            'category_id' => 'required',
            'price' => 'required|between:0,999999.99',
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $food->name = $input['name'];
        $food->category_id = $input['category_id'];
        $food->price = $input['price'];
        $food->update();

        return $this->sendResponse(new FoodResource($food), 'Food updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return $this->sendResponse([], 'Food deleted successfully.');
    }
}
