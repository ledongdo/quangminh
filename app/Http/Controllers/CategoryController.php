<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->htmlSelect = '';
    }
    public function index()
    {
        $categorys = Category::latest()->paginate(5);
        return view('admin.category.index',compact('categorys'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add',compact('htmlOption'));
    }
    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name),
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data); 
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function update($id,Request $request)
    {
        Category::find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
        Category::find($id)->delete();
    }
}
