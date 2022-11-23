<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function todoListPage(){
        return response()->view("todoList");
    }
}
