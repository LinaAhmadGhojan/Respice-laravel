<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Requests\RecipeRequest;
use App\Http\Traits\SaveFile;

class RecipesController extends Controller
{
    use SaveFile;

    public function index()
    {
        return response()->json(Recipe::all(),200);
    }

    public function store(RecipeRequest $request)
    {
        $request->validated();
        $input=$request->all();
        $input["id_user"]=auth('sanctum')->id();
        $image=$this->SaveFile($request,'photo',public_path('photo'));
        $input["photo"]=url('/')."/photo/".$image;
        Recipe::create($input);
        return response()->json(["message"=>"create"],200);

    }

    public function update($id,RecipeRequest $request)
    {
         $input=$request->all();
         $image=$this->SaveFile($request,'photo',public_path('photo'));
         $input["photo"]=url('/')."/photo/".$image;
         Recipe::where('id',$id)->update($input);

        return response()->json(["message"=>"update"],200);
    }

    public function delete($id)
    {
        $recipe=Recipe::find($id);
        $recipe->delete();
        return response()->json(["message"=>"delete"],200);
    }

    public function search ($name)
    {

    return  Recipe::where('name', 'like', '%'.$name.'%')
    ->orWhere(function ($query) use ($name) {
        $query->where('list_instructions', 'like', '%'.$name.'%')
              ->orWhere('list_ingredients', 'like', $name.'%');
    })
    ->get();

    }

    public function show($id)
    {
        return response()->json(Recipe::find($id),200);
    }

    public function recipeUser()
    {
        return response()->json(Recipe::where('id_user',auth('sanctum')->id())->get(),200);

    }


}
