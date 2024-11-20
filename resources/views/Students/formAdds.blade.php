@extends('../Template/app')

@section('pageFck')
    <title>Student's add Form</title>

    <div class="container-fluid mt-5">
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

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                             <b>Picture :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="file" accept="" class="form-control" id="photoEl" name="photoEl" value="{{ old('photoEl') }}">
                                    </div>

                                    @error('photoEl')
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
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                       <label for="">
                                            <b>New</b>
                                       </label>
                                    </div>
                                    <div class="col-md-2 ">
                                        <input type="radio" class="" id="newOld" name="newOld" value="New">

                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                       <label for="">
                                            <b>Old</b>
                                       </label>
                                    </div>
                                    <div class="col-md-2 ">
                                        <input type="radio" class="" id="newOld" name="newOld" value="Old" >
                                    </div>
                                    <div class="col-md-1"></div>

                                    @error('newOld')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                           <b>Bid :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="number" class="form-control" id="montantVerse" name="montantVerse" placeholder="payement" value="{{ old('montantVerse') }}">
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
                                           <b> Rest :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="number" class="form-control" id="resteV" name="resteV" placeholder="Rest" value="{{ old('resteV') }}">
                                    </div>

                                    @error('resteV')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">
                                    <div class="col-md-3">
                                        <label for="">
                                            <b>Date Paid :</b>
                                        </label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <input type="date" class="form-control" id="datePay" name="datePay" placeholder="Enter new Code Class" value="{{ old('datePay') }}">
                                    </div>

                                    @error('datePay')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="row my-2">

                                </div>

                            </div>

                            <center class="my-4">
                                <button class="btn btn-secondary">
                                    <b>Go Back </b>
                                </button>
                                <button type="reset" class="btn btn-outline-danger mx-3">
                                    <b>  Cancel </b>
                                </button>
                                <button type="submit" class="btn btn-outline-primary">
                                    <b>  Save  </b>
                                </button>
                            </center>
                        </div>
                    </form>

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
