@extends('layouts.app')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="container">
      <h1 class="list-header">{{ auth()->user()->name }}'s List<i class="fa fa-plus"></i></h1>
      <input class="insert-item" type="text" name="newToDo" placeholder="Add New Task (Press Enter)">
      <ul class="list-items">
      	@foreach ($tasks as $task)
      		<li data-id="{{$task->id}}" class="list-item @if ($task->done) completed @endif">
            <span data-id="{{$task->id}}" class="item-span"><i class="fa fa-trash"></i></span>
            {{ $task->title }}
          </li>
      	@endforeach
      </ul>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        window.user_id = {{ auth()->user()->id }}
    </script>
    <script src="{{ asset('js/script.js') }}" defer></script>
@endsection
