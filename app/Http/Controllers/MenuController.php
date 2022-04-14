<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;
    public function __construct(MenuRecusive $menuRecusive)
    {
        $this->menuRecusive = $menuRecusive;
    }
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        return view('admin.menu.index',compact('menus'));
    }
    public function create()
    {
        $optionSelect =  $this->menuRecusive->MenuRecusiveAdd();
        return view('admin.menu.add',compact('optionSelect'));
    }
    public function store(Request $request)
    {
        Menu::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id)
    {
       
        $menu = Menu::find($id);
        $optionSelect =  $this->menuRecusive->MenuRecusiveEdit($menu->parent_id);
        return view('admin.menu.edit',compact('menu','optionSelect'));
    }
    public function update($id,Request $request)
    {
        Menu::find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        Menu::find($id)->delete();
    }
}
