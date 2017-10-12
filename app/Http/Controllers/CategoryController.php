<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::all();
        return response()->view('categories.index', compact('categories'));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('categories.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate(
            $request,
            [
                'kategorija' => 'required|string',
                'marza'      => 'required|numeric'
            ],
            [
                'kategorija.required' => 'Naziv kategorije je obavezan.',
                'kategorija.string'   => 'Naziv kategorije mora biti string.',
                'marza.required'      => 'Iznos marže je obavezan.',
                'marza.numeric'       => 'Marža mora biti broj.',
            ]
        );

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return back()->with('success', 'Kategorija je uspješno dodana.');
    }

    /**
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category): Response
    {
        return response()->view('categories.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $this->validate(
            $request,
            [
                'kategorija' => 'required|string',
                'marza'      => 'required|numeric'
            ],
            [
                'kategorija.required' => 'Naziv kategorije je obavezan.',
                'kategorija.string'   => 'Naziv kategorije mora biti string.',
                'marza.required'      => 'Iznos marže je obavezan.',
                'marza.numeric'       => 'Marža mora biti broj.',
            ]
        );

        $category->fill($request->all());
        $category->save();
        return back()->with('success', 'Kategorija je uspješno editirana.');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return back()->with('success', 'Kategorija je uspješno obrisana.');
    }
}
