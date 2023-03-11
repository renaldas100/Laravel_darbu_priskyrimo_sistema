
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-3">
                <div class="col-md-8">
                    <a class="btn btn-success mb-3" href="{{ route("tasks.index") }}">Grįžti į bendrą užduočių sąrašą</a>

                    <div class="card">
                        <div class="card-header">Nauja užduotis</div>

                            <div class="card-body">

                                <form method="post" action="{{ route("tasks.update", $task->id) }}">
                                    @csrf
                                    @method("put")
                                    <div class="mb-3">
                                        <label class="form-label">Užduotis</label>
                                        <input class="form-control" type="text" name="name" value="{{ $task->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Būsena</label>
                                        <input class="form-control" type="text" name="status" value="{{ $task->status }}">
                                    </div>
                                    <div class="mb-3">
                                        <table class="col-md-12">
                                            <thead>
                                            <tr>
                                                <th class="col-md-7">Esami priskirti darbuotojai:</th>
                                                <th class="col-md-4" style="text-align: center">Priskyrimo data</th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($task->users as $user)
                                                <tr>
                                                    <td class="border-bottom col-md-7">{{ $user->name }}</td>
                                                    <td class="border-bottom col-md-4" style="text-align: center">{{ \Carbon\Carbon::parse($user->pivot->date)->format('Y-m-d') }}</td>
                                                    <td class="border-bottom col-md-1">
                                                        <a class="btn btn-danger" href="{{ route("tasks.deleteUser", [$task->id, $user->id]) }}">Ištrinti</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Priskirti naują darbuotoją</label>
                                        <select class="form-select" name="user_id">
                                            <option value="">-</option>
                                            @foreach($users as $user)
                                                @if (!$task->users->contains($user->id))
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>




                                    </div>
                                    <button class="btn btn-success">Išsaugoti</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection





