



@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Visų darbuotojų sąrašas</div>

                        <div class="card-body">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="col-md-1">Vardas</th>
                                    <th class="col-md-1">El.paštas</th>
                                    <th class="col-md-9">Nuotraukos</th>
                                    <th class="col-md-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="">
                                        <td class="col-md-1">{{ $user->name }}</td>
                                        <td class="col-md-1">{{ $user->email }}</td>
                                        <td class="col-md-9">
                                            <div class="d-flex">
                                            @foreach($user->pictures as $picture)
                                             <div class="d-flex flex-column align-items-center">
                                               <img src="{{ asset("/storage/users/".$picture->name) }}" style="height: 100px">
                                                <a>
                                                    <form method="post" action="{{ route('pictures.destroy', $picture->id) }}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger deleteButton">Ištrinti</button>
                                                    </form>
                                                </a>
                                             </div>
                                            @endforeach
                                            </div>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ route("pictures.addPicture", $user->id) }}" class="btn btn-success">Pridėti nuotrauką</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

