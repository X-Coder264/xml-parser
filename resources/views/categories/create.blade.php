@extends('layouts.app')

@section('content')
<div class="col-12 mx-auto">
    <div class="card">
        <div class="card-header">
            Unos nove kategorije
        </div>

        <div class="card-body">
            @include('partials.flash_messages')
            <br>
            <form method="POST" action="{{ route('categories.store') }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="kategorija" class="col-sm-2 col-form-label">Naziv kategorije</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategorija" name="kategorija" placeholder="Naziv kategorije" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marza" class="col-sm-2 col-form-label">Marža (za npr. 250% ukucati 2.5)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marza" name="marza" placeholder="Marža" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Unesi novu kategoriju</button>
            </form>
        </div>
    </div>
</div>
@endsection