<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'done', 'user_id',
    ];

    public function user()
    {
      	return $this->belongsto(User::class, 'user_id');
    }

    public function toggleDone()
    {
    	$this->done = !$this->done;
      $this->save();
    }

    public static function routes()
    {
        Route::get('/users/{user}/tasks', 'TaskController@show')->name('tasks.show');
        Route::post('/users/{user}/tasks', 'TaskController@store')->name('tasks.store');
        Route::post('/tasks/{task}/delete', 'TaskController@destroy')->name('tasks.delete');
        Route::post('/tasks/{task}/toggle', 'TaskController@toggleDone')->name('tasks.toggle');
    }

}
