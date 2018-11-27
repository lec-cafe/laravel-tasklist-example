@extends('layout')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mb-3">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong!</strong>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div class="col-8 mt-5">
                <form action="/task" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Task</label>
                        <div class="col-sm-10">
                            <input type="text" name="task_name" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-light"><i class="fa fa-plus"></i> &nbsp; Add Task</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (count($tasks) > 0)
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            Current Tasks
                        </div>
                        <div class="card-body">

                            <h5>tasks</h5>

                            <div class="list-group list-group-flush">
                                @foreach ($tasks as $task)
                                    <a href="/task/{{$task->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <p class="mb-1">{{$task->name}}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
