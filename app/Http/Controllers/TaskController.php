<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {

      //全てのフォルダ取得
      $folders = Folder::all();

      //選んでいるフォルダのIDを取得
      $current_folder = Folder::find($id);

      //選んでいるフォルダのタスクを全て取得する
      $tasks = $current_folder->tasks()->get();

      return view('tasks/index',[
        'folders' => $folders,
        'current_folder_id' => $current_folder->id,
        'tasks' => $tasks,
      ]);

    }
}
