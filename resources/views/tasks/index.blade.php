



@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-3">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Užduočių sąrašas</div>

                        <div class="card-body">
                            <div class="clearfix">
                                <a href="{{ route("tasks.create") }}" class="btn btn-success float-end">Įtraukti naują užduotį</a>
                            </div>
                            <hr>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-6">Užduotys</th>
                                    <th class="col-md-1">Būsena</th>
                                    <th class="col-md-1">Darbuotojai</th>
                                    <th class="col-md-2" style="text-align: center">Užduoties data</th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td class="col-md-6">{{ $task->name }}</td>
                                        <td class="col-md-1">{{ $task->status }}</td>
                                        <td colspan="2" class="col-md-3">
                                            <table class="col-md-12">
                                                <tbody>
                                                    @foreach($task->users as $user)
                                                        <tr>
                                                            <td class="border-bottom">{{ $user->name }}</td>
                                                            <td class="border-bottom" style="text-align: right">{{ \Carbon\Carbon::parse($user->pivot->date)->format('Y-m-d') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ route("tasks.edit", $task->id) }}" class="btn btn-success">Redaguoti</a>
                                        </td>
                                        <td class="col-md-1">
                                            <form method="post" action="{{ route("tasks.destroy", $task->id) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">Ištrinti</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="my-2">
                        Iš viso užduočių yra: {{ $tasks->total() }}
                    </div>
                    <div class="my-2">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

