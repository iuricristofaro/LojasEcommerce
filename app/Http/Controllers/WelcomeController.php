<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

class WelcomeController extends Controller
{
    private $categories;

    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('welcome');
    }

    public function exemplo()
    {
        $categories = $this->categories->all();
        return view('exemplo', compact('categories'));
    }

}
