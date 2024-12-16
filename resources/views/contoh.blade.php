@extends('app')
@section('content')
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-xl-">
                <div class="card">
                    <div class="card-header">
                        P login
                    </div>
                    <div class="card-body">
                        <form action="{{ route('logins22') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="email" id="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="password" id="">
                            </div>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection