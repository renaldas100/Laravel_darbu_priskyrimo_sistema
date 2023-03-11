
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Nauja užduotis</div>

                            <div class="card-body">

                                <form method="post" action="{{ route("tasks.store") }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Užduotis</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Būsena</label>
                                        <input class="form-control" type="text" name="status" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Darbuotojas</label>
                                        <select class="form-select" name="user_id">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-success">Pridėti</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection





