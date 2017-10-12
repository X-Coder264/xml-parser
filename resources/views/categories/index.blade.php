@extends('layouts.app')

@section('content')
    <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                Popis kategorija
            </div>

            <div class="card-body">
                @include('partials.flash_messages')
                @if($categories->isEmpty())
                    <div class="card text-dark bg-warning">
                        <div class="card-body">
                            <h4 class="card-title">Napomena</h4>
                            <p class="card-text">Trenutno nemate niti jednu kategoriju. To znači da će se primjenjivati defaultna marža na sve artikle.</p>
                        </div>
                    </div>
                @else
                    <table class="table table-bordered table-hover table-responsive-sm table-responsive-md table-responsive-lg">
                        <thead>
                            <tr>
                                <th>Kategorija</th>
                                <th>Marža</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="bg-warning">
                                    <td>{{ $category->kategorija }}</td>
                                    <td>{{ $category->marza }}</td>
                                    <td>
                                        <a class="btn btn-dark" href="{{ route('categories.edit', $category) }}">Editiraj</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit">Obriši</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection