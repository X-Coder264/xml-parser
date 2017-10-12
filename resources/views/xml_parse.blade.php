@extends('layouts.app')

@section('content')
    <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Upload XML-a
            </div>

            <div class="card-body">
                @include('partials.flash_messages')
                <br>
                <form enctype="multipart/form-data" method="POST" action="{{ route('xml.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="xml" class="col custom-file">
                            <input type="file" id="xml" name="xml" class="custom-file-input" accept="application/xml" required>
                            <span id="xmlName" class="custom-file-control form-control-file">Izaberi XML datoteku</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Uploadaj</button>
                </form>
            </div>
        </div>
    </div>
@endsection