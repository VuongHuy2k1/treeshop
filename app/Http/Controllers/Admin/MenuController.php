<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use phpDocumentor\Reflection\DocBlock\Description;


class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }

    public function create(){
        return view('admin.menu.add',[
            'title'=>'Thêm danh mục mới',
            'menus'=>$this->menuService->getparent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
       $request= $this->menuService->create($request);
       return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list',[
            'title'=>'Danh sách danh mục mới nhất',
            'menu'=> $this->menuService->getAll()
        ]);

    }
}
