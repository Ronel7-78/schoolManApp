@extends('../Template/app')

@section('pageFck')
    <title>Student list of {{$classe->nomCl}} </title>

    <div class="container-fluid my-5">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 card bordure1 ">
                <a href="{{ route('Classes.home') }}" class="nav-link  mt-3">
                    <i class="mx-1 far fa-arrow-alt-circle-left"></i><b>Go Back</b>
                </a>
                <center class="mt-3">

                    <b class="h1 ">Liste des élèves de la classe {{ $classe->nomCl }}</b>
                    <hr>
                </center>
                <table class="table table-striped border-left table-sm fs-13-5 table-hover my-2 border p-2 border-2">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Matricule</th>
                            <th>Name</th>
                            <th>Subname</th>
                            <th>Birth date</th>
                            <th>Born at</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $index => $student)
                        <tr>
                            <td> {{$index + 1 }}</td>
                            <td> <b>{{ $student->matricule }}</b> </td>
                            <td> <b>{{ $student->nomEl }}</b> </td>
                            <td> <b>{{ $student->prenomEl }}</b> </td>
                            <td> <b>{{ $student->dateNais }}</b> </td>
                            <td>  <b>{{ $student->lieuNais }}</b> </td>
                            <td> <b>{{ $student->gender }}</b> </td>
                            <td>
                                    <a class="btn-outline-info btn py-0" href="{{ route('Student.show',['id'=>$student->id])}}" >
                                        <i class="fas fa-info-circle"></i> <b class="">See more</b>
                                    </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">Aucun élève trouvé pour cette classe.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $students->links() }}
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

    @if (session()->has('success'))

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            swal("Succès", "{{ session('success') }}", "success");
        });
    </script>


    @endif
@endsection
