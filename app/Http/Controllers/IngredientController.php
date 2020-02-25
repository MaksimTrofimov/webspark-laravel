<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function list()
    {
        return view('ingredient/list', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request = $request->input('name')) {
            $ingredient = new Ingredient();
            $ingredient->name = $request['name'];
            $ingredient->save();
        }
        return redirect('ingredient/list');
    }

    public function edit(Request $request)
    {
        if ($request->input('id')) {
            $request = $request->input();
            $ingredient = Ingredient::find((int)$request['id']);
            if ($ingredient && !empty($request['name']) {
                $ingredient->name = $request['name'];
                $ingredient->save();
                return redirect('ingredient/list');
            }
        }
    }

    public function delete()
    {
        if ($id = (int)$request->input('id')) {
            $recipe = Ingredient::find($id);
            $recipe->delete();
            return redirect('ingredient/list');
        }
    }
}
