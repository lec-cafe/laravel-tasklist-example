<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// タスク一覧画面
Route::get('/tasklist', function () {
    $tasks = \App\Task::all();
    return view('tasklist',[
        "tasks" => $tasks
    ]);
});

// タスク一覧画面
Route::get('/task/{id}', function ($id) {
    $task = \App\Task::where("id",$id)->first();
    if($task === null ){
        return abort(404);
    }else{
        return view("/task",[
            "task" => $task
        ]);
    }
});

// タスク追加
Route::post('/task', function () {
    $task = new \App\Task();
    $task->name = request("task_name");
    $task->save();
    return redirect("/tasklist");
});

// タスク削除
Route::post('/task/delete/{id}', function ($id) {
    $task = \App\Task::where("id",$id)->first();
    if($task){
        $task->delete();
    }
    return redirect("/tasklist");
});

