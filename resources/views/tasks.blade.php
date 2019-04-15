@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
            New Task
            </div>

            <div class="panel-body">
            <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="{{ url('task')  }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name  -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-sm-6">
                                <input type="text" name="task_sentence" id="task-name" class="form-control">
                            </div>
                    </div>
                    <br>
                    <!-- Task Time Limit -->
                    <div class="form-group">
                        <label for="time-limit" class="col-sm-3 control-label">TimeLimit</label>
                            <div class="col-sm-6">
                                <input type="date" name="time_limit" id="time_limit" class="form-control">
                            </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (true)
        @endif
        <!-- Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>TaskTitle</th>
                            <th>User</th>
                            <th>DayLimit</th>
                            <th>TimeLimit</th>
                            <th>TImeStanp</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div>{{ $task->task_sentence }}</div>
                                    </td>

                                    <!-- TODO user idから名前を検索する -->
                                    <!-- User Name -->
                                    {{-- <td class="table-text">
                                        <div>{{ $task->username }}</div>
                                    </td> --}}
                                    <td class="table-text">
                                            @foreach($users as $user)
                                                @if($user->id === $task->user_id)
                                                <div>{{ $user->user_name }}</div>
                                                    @break
                                                @endif
                                            @endforeach
                                    </td>

                                    <!-- DayLimit -->
                                    <td class="table-text">
                                        <div>{{ $task->TimeLimit }}</div>
                                    </td>

                                    <!--TODO TimeStanp-->
                                    <td class="taable-text">
                                        <div> {{ $task->created_at }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>
                                            @php
                                                $task_status = $task ->task_status
                                            @endphp

                                            @if($task_status == 0)
                                                未完了
                                            @else
                                                完了
                                            @endif
                                        </div>
                                    </td>
                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('task/'.$task->task_id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
