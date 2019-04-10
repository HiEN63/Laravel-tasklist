<?php
use App\tasklist;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    $tasks = DB::select('select task_id,task_sentence,time_limit,time_stamp,user_id,task_status from tasks');

    //testcode
    logger($tasks);
    return view('tasks', [

        'tasks' => $tasks
    ]);
});
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'taskname' => 'required|max:255',
    ]);

    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new tasklist;
    $task->taskname = $request->taskname;
    $task->username = 'hoge';
    $task->save();

    return redirect('/');
});
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
