@if(session('success'))
    <div class="card text-white bg-success">
        <div class="card-body">
            <h4 class="card-title">Uspjeh</h4>
            <p class="card-text">{{ session('success') }}</p>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="card text-white bg-danger">
        <div class="card-body">
            <h4 class="card-title">Greška</h4>
            <p class="card-text">{{ session('error') }}</p>
        </div>
    </div>
@endif
@if (session('status'))
    <div class="card text-white bg-warning">
        <div class="card-body">
            <h4 class="card-title">Status</h4>
            <p class="card-text">{{ session('status') }}</p>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="card text-white bg-danger">
        <div class="card-body">
            <h4 class="card-title">Greška</h4>
            @foreach ($errors->all() as $error)
                <p class="card-text">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif