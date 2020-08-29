<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Todo;
use App\Step;
use Illuminate\Support\Facades\Validator;



class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->except('index');
        // $this->middleware('auth')->only('index');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        // return $todos;
        // $todos = Todo::orderBy('completed')->get(); 
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo)
    {
        // dd($todo->steps);
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoCreateRequest $request)
    {
        // $rules = [
        //     'title' => 'required|max:255',
        // ];
        // $messages = [
        //     'title.max' => 'Todo title should not be greater than 255 chars.',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect('todos/create')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);

        // Todo::create($request->all());

        // dd(auth());
        // auth()->user()->todos()->create($request->all());
        $todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        // dd($request->step);
        return redirect(route('todos.index'))->with('message', 'Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {
        // return $todo->title;
        // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        // dump($request->all());
        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    // dd($value);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todos.index'))->with('message', 'Update!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as Complete!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted!');
    }

    public function destroy(Todo $todo)
    {
        // $todo->delete();
        $todo->steps->each->delete();
        return redirect()->back()->with('message', 'Task Deleted');
    }
}
