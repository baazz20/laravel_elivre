<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Souscategories;

class SousCategorieController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = Souscategories::query();
        // if no category has been selected, show no options
        if (!$form['code_categorie']) {
            return [];
        }

        // if a category has been selected, only show articles in that category
        if ($form['code_categorie']) {
            $options = $options->where('code_cat', $form['code_categorie']);
        }

        if ($search_term) {
            $results = $options->where('title', 'LIKE', '%' . $search_term . '%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }
        return $options->paginate(10);
    }

}