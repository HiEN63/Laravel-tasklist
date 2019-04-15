<?php
use App\Task;
use App\User;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

/*'
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , 'TaskController@getTask');
Route::post('/task', 'TaskController@postTask');
/*
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'task_sentence' => 'required|max:255',
    ]);

    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new task;
    $task->task_sentence = $request->task_sentence;
    $task->time_limit = $request->time_limit;
    //todo This get by login infomation
    $task->user_id = 4;
    $task->task_status = 0;
    $task->save();

    return redirect('/');
});
*/
Route::delete('/task/{task}', 'TaskController@deleteTask');
/*
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hoge', 'HogeController@hoge');
