
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-3">
                <div class="col-md-8">
                    <a class="btn btn-success mb-3" href="{{ route("users.index") }}">Grįžti į bendrą darbuotojų sąrašą</a>

                    <div class="card">
                        <div class="card-header">Redaguoti darbuotojo duomenis</div>

                            <div class="card-body">

                                <form method="post" action="{{ route("users.update", $user->id) }}">
                                    @csrf
                                    @method("put")
                                    <div class="mb-3">
                                        <label class="form-label">Vardas</label>
                                        <input class="form-control" type="text" name="name" placeholder="{{ $user->name }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">El.paštas</label>
                                        <input class="form-control" type="text" name="email" placeholder="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Įveskite naują slaptažodį</label>
                                        <input class="form-control @error('password') is-invalid @enderror" type="text" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-success">Atnaujinti</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection





