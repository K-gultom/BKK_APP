@extends('dashboard-admin')

@section('content')
    <div class="p-3">
        <section>
            <h3>Dashboard</h3>
        </section>

        <section>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h2>User</h2>
                                <p>KFKAJSBfksbkbaskbvdbvksbvkbsdv</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>
    </div>
@endsection