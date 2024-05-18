@extends('components.template.layout')
@section('content')
<main class="pt-5">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid rounded-circle" alt="User-Profile-Image" style="width: 100px;">
                        </div>
                        <form>
                            <div class="form-group mb-3">
                                <label for="disabledTextInput" class="form-label">User ID</label>
                                <input type="text" id="disabledTextInput" class="form-control rounded-pill" placeholder="Adm-001" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputName" class="form-label">Nama</label>
                                <input type="text" class="form-control rounded-pill" id="exampleInputName" aria-describedby="nameHelp">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email" class="form-control rounded-pill" id="exampleInputEmail1">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control rounded-pill" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded-pill">Edit Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
