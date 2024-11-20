{{-- cette partie importe le header --}}
<title>Edit Profile Admin</title>


{{-- celle-ci inclu la section dans laquelle notre code va s'afficher --}}
@section('pageFck')
@extends('../Template/app')
    <div class="container-fluid marge0">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card">
                <a href="{{ route('Admin.shwAc', ['admin' => $admin->id]) }}" class="nav-link  mt-3">
                    <i class="mx-1 far fa-arrow-alt-circle-left"></i><b>Go Back</b>
                </a>
                <center class="h5 mt-3"><b> <i class="fas fa-edit text-info"></i> Edit Form for Admin</b></center>
                <hr class="bg-primary">
                <form action="{{ route('Admin.update', ['admin' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-user-circle "></i>  <b>Username:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder=" Enter your name" value="{{ $admin->name }}">
                        </div>
                                                {{-- pour celui ci celle-ci est la mieux adaptée --}}
                            @error('nom')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-user-circle "></i>  <b>First Name:</b>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter your subname" value="{{ $admin->prenom }}" >
                        </div>

                        @error('prenom')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-envelope"></i>  <b>Email:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Valid E-mail address" value="{{ $admin->email }}">
                        </div>

                        @error('email')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-phone"></i> <b>Phone:</b>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Phone number" value="{{ $admin->telephone }}">
                        </div>

                        @error('telephone')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="current_password">
                                <i class="fas fa-user-lock"></i> <b>Curent Password:</b>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter your current password">
                        </div>
                        @error('current_password')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="password">
                                <i class="fas fa-user-lock"></i> <b>New Password</b>:</b>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">

                        </div>
                        @error('password')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <center class="my-2">
                        <button type="reset" class="btn btn-outline-secondary mx-2">
                            <b>Cancel</b>
                        </button>
                        <button type="submit" class="btn btn-outline-success mx-2">
                            <i class="far fa-save mx-2 "></i><b>Save changes </b>
                        </button>

                    </center>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


    {{-- ici c'est le sweetAlert qui gère les messages d'erreurs --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Récupère toutes les erreurs de validation
                let errors = @json($errors->all());
                // Affiche chaque erreur dans une alerte SweetAlert
                errors.forEach(function(message) {
                    swal("Erreur", message, "error");
                });
            });
        </script>
    @endif

    @if (session()->has('current_password'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal("Erreur", "{{ session('current_password') }}", "error");
            });
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal("Succès", "{{ session('success') }}", "success");
            });
        </script>
    @endif
@endsection
