@extends('../Template/app')

@section('pageFck')
    <title>Student's add Form</title>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bordure1 border border-secondary">


                    <form action="{{ route('Student.Registration') }}" method="post" class="p-1">
                        <center class="h5 mt-3"><i class="fas fa-plus-circle text-success mx-1"></i><b> Add Student's Form </b></center>
                        <hr>
                        <div class="row ">
                        @csrf
                        @method('post')
                            <div class="col-md-6">
                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                            <b>Name :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="text" class="form-control" id="nomEl" name="nomEl" placeholder="Enter your name" value="{{ old('nomEl') }}">
                                    </div>

                                    @error('nomEl')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b>Sub Name :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="text" class="form-control" id="prenomEl" name="prenomEl" placeholder="Enter your subname" value="{{ old('prenomEl') }}">
                                    </div>

                                    @error('prenomEl')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b>Birth Date :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="date" class="form-control" id="dateNais" name="dateNais"  value="{{ old('dateNais') }}">
                                    </div>

                                    @error('dateNais')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b> Born At :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="text" class="form-control" id="lieuNais" name="lieuNais" placeholder="Enter your birth place" value="{{ old('lieuNais') }}">
                                    </div>

                                    @error('lieuNais')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-3">

                                    <div class="col-md-3">
                                       <label for="">
                                            <b>Gender</b>
                                       </label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Your gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    @error('gender')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                              <!--   <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                             <b>Picture :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="file" accept="image/*"  class="form-control" id="photoE" name="photoE" value="{{ old('photoE') }}">
                                    </div>

                                    //@error('photoE')
                                        <div class="text text-danger">
                                            //{{ $message }}
                                        </div>
                                    //@enderror

                                </div>-->
                               <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                             <b>Contact:</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="text" class="form-control" id="contactP" name="contactP" placeholder="Enter parent's contacts "value="{{ old('contactP') }}">
                                    </div>

                                    @error('contactP')
                                        <div class="text text-danger">
                                           {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">



                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                            <b> Class:</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <select name="codeCl" id="codeCl" class="form-control" placeholder="choose the class">
                                            <option value="">Select class</option>
                                            @foreach($classes as $classe)
                                                <option value="{{ $classe->codeCl }}">{{ $classe->nomCl }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @error('codeCl')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-3">
                                    <div class="col-md-3">
                                       <label for="">
                                            <b>New / Old</b>
                                       </label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="newOld" id="newOld" class="form-control">
                                            <option value="">Select</option>
                                            <option value="New">New</option>
                                            <option value="Old">Old</option>
                                        </select>
                                    </div>

                                    @error('newOld')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b class="fs-6">Amount Due :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="number" class="form-control" id="montantDue" name="montantDue" placeholder="Invoice payment" value="{{ old('montantDue') }}" >
                                    </div>

                                    @error('montantDue')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b>Deposit :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="number" class="form-control" id="montantVerse" name="montantVerse" placeholder="payment made" value="{{ old('montantVerse') }}">
                                    </div>

                                    @error('montantVerse')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b> Balance :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="number" class="form-control" id="resteV" name="resteV" placeholder="Outstanding balance" value="{{ old('resteV') }}" >
                                    </div>

                                    @error('resteV')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="row my-2">

                                </div>

                            </div>

                            <center class="my-4">
                                <a href="{{ route('Student.home') }}" class="btn btn-secondary">
                                    <b> <i class="far fa-arrow-alt-circle-left"></i> Go Back </b>
                                </a>
                                <button type="reset" class="btn btn-outline-danger mx-3">
                                    <b> <i class="fas fa-times-circle"></i> Cancel </b>
                                </button>
                                <button type="submit" class="btn btn-outline-primary">
                                    <b> <i class="fas fa-save"></i> Save  </b>
                                </button>
                            </center>
                        </div>
                    </form>

                    <script>
                        function updateMontantDue() {
                            var select = document.getElementById("codeCl");
                            var montantDue = select.options[select.selectedIndex].getAttribute('data-montant');
                            document.getElementById("montantDue").value = montantDue;
                             // Mise à jour automatique du champ Balance lors de la modification du montant versé
                            var montantVerse = document.getElementById("montantVerse").value;
                            if (montantDue && montantVerse) { document.getElementById("resteV").value = montantDue - montantVerse;

                             } } // Ajouter un écouteur d'événement pour mettre à jour la balance en fonction des montants
                            document.getElementById("montantVerse").addEventListener('input', function() { var montantDue = document.getElementById("montantDue").value;
                            var montantVerse = this.value;
                            if (montantDue && montantVerse) { document.getElementById("resteV").value = montantDue - montantVerse;} });
                    </script>
            </div>
            <div class="col-md-2"></div>
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
