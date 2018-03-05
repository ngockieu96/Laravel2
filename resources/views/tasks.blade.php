<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>@lang('messages.titletable')</h3>
                </div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <!-- New Task Form -->
                    <h3>@lang('messages.titleadd')</h3>
                    {{ Form::open(['route' => 'task.index']) }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    <div class="form-group">
                        {{ Form::submit( trans('messages.Add'), ['class' => 'btn btn-default']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!-- Current Tasks -->
            @if (count($tasks))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>@lang('messages.titletable')</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('messages.title')</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                    <!-- Task Delete Button -->
                                        <td>
                                            {{ Form::open(['route' => ['task.destroy', $task->id]]) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit( @lang('messages.delete'), ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
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
