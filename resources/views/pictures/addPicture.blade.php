
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-3">
                <div class="col-md-8">
                    <a class="btn btn-success mb-3" href="{{ route("users.index") }}">Grįžti į bendrą darbuotojų sąrašą</a>

                    <div class="card">
                        <div class="card-header">Pridėti nuotrauką</div>

                        <div class="card-body">

                            <form method="post" action="{{ route("pictures.store", $user->id) }}" enctype="multipart/form-data">
                                @csrf
{{--                                @method("put")--}}
                                <div class="mb-3">
                                    <label class="form-label">Įkelkite nuotrauką</label>
                                    <input class="form-control" type="file" name="picture">
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






