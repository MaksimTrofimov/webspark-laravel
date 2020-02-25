<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingredient;
use App\Recipe;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formCreate()
    {
        return view('recipe/create', [
            'ingredients' => Ingredient::all(),
            'units' => Ingredient::UNITS
        ]);
    }

    public function create(RecipeRequest $request)
    {
            $post = $request->input();
            if (!empty($post['name'])) {
                $recipe = new Recipe();
                $recipe->name = $post['name'];
                $recipe->description= $post['description'];
                $recipe->save();
                return redirect('home');
            }
    }

    public function delete(Request $request)
    {
        if ($id = (int)$request->input('id')) {
            $recipe = Recipe::find($id);
            $recipe->delete();
        }
        return redirect('home');
    }
}
