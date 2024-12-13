@extends('../Template/app')

@section('pageFck')
    <title>Add Class</title>
    <div class="container-fluid marge1">
        <div class="row ">
            <div class="col-md-3"></div>
            <div class="col-md-6 card bordure1">
                <a href="{{ route('Classes.home') }}" class="nav-link  mt-3">
                    <i class="mx-1 far fa-arrow-alt-circle-left"></i><b>Go Back</b>
                </a>
                <center class="h5 mt-3"><i class="fas fa-file-signature text-success mx-1"></i><b> ADD NEW CLASS FORM </b></center>
                <hr class="bg-primary">
                <form action="{{ route('Classes.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-envelope"></i>  <b>Code Class:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" class="form-control" id="codeCl" name="codeCl" placeholder="Enter Code Class"value="{{ old('codeCl') }}">
                        </div>

                        @error('codeCl')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-user-lock"></i>  <b>Class Name:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" class="form-control" id="nomCl" name="nomCl" placeholder=" Enter the class Name " value="{{ old('nomCl') }}">
                        </div>

                        @error('nomCl')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="row my-2">
                        <div class="col-md-3">
                            <label for="">
                                <i class="fas fa-money-bill"></i>  <b>School fees:</b>
                            </label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="number" class="form-control" id="montantDue" name="montantDue" placeholder=" Enter the academic costs " value="{{ old('montantDue') }}">
                        </div>

                        @error('montantDue')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <center class="my-3">
                        <button type="reset" class="btn btn-secondary mx-2">
                            <b>Cancel</b>
                        </button>
                        <button type="submit" class="btn btn-primary mx-2">
                            <b> &nbsp; Add &nbsp; </b>
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

        @if (session()->has('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal("Succès", "{{ session('success') }}", "success");
                });
            </script>
        @endif
@endsection
