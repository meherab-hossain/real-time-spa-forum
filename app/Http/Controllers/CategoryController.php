<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category=new Category();
        return CategoryResource::collection(($category->latest()->get()));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->slug=str_slug($request->name);
        $category->save();
        return response('created',Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        $name=$request->name;
        $category->name=$name;
        $category->slug=str_slug($name);
        $category->save();
        return response('updated',Response::HTTP_ACCEPTED);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
