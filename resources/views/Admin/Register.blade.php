{{-- cette partie importe le header --}}
<title>Inscription de l'administrateur</title>


{{-- celle-ci inclu la section dans laquelle notre code va s'afficher --}}
@section('pageFck')
@extends('../Template/app')
    <div class="container-fluid marge0">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card">
                <center class="h5 mt-3"><i class="fas fa-file-signature text-success mx-1"></i><b>Registration Form for Admin</b></center>
                <hr class="bg-primary">
                <form action="{{ route('inscriptionAdd')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-user-circle "></i>  <b>Username:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder=" Enter your name" value="{{ old('nom') }}">
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
                                <i class="fas fa-user-circle "></i>  <b>Subname:</b>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter your subname" value="{{ old('prenom') }}">
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
                            <input type="email" class="form-control" id="email" name="email" placeholder="Valid E-mail address" value="{{ old('email') }}">
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
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Phone number" value="{{ old('telephone') }}">
                        </div>

                        @error('telephone')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-user-lock"></i>  <b>Password:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="password" class="form-control" id="password" name="password" placeholder=" Enter your password " value="{{ old('password') }}">
                        </div>

                        @error('password')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-camera"></i> <b>Picture:</b>
                            </label>
                        </div>
                        <div class="col-md-9 card ">
                            <input type="file" accept="image/*" class="form-control" id="photo" name="photo" value="{{ old('photo') }}">
                        </div>

                        @error('photo')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <center class="my-2">
                        <button type="reset" class="btn btn-secondary mx-2">
                            <b>Cancel</b>
                        </button>
                        <button type="submit" class="btn btn-primary mx-2">
                            <b>Register</b>
                        </button>

                    </center>
                    <b class="small">
                        Already have an account ? <a href="{{ route('loginAdmin') }}">Login</a>
                    </b>
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

    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal("Succès", "{{ session('success') }}", "success");
            });
        </script>
    @endif
@endsection
