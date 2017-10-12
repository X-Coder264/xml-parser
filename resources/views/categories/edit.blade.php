@extends('layouts.app')

@section('content')
    <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Editiranje kategorije
            </div>

            <div class="card-body">
                @include('partials.flash_messages')
                <br>
                <form method="POST" action="{{ route('categories.update', $category) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="kategorija" class="col-sm-2 col-form-label">Naziv kategorije</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategorija" name="kategorija" placeholder="Naziv kategorije" value="{{ $category->kategorija }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marza" class="col-sm-2 col-form-label">Marža (za npr. 250% ukucati 2.5)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="marza" name="marza" placeholder="Marža" value="{{ $category->marza }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Editiraj kategoriju</button>
                </form>
            </div>
        </div>
    </div>
@endsection