@extends('../Template/app')

@section('pageFck')
    <title>Classes</title>

    <div class="container-fluid alert alert-tertiary my-2" role="alert">
        <center>
            <b class="h1 text-center ">The Available Classes</b>
        </center>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 card bordure1">

                  <center>
                    <button class="btn btn-outline-primary float-right mt-2 " aria-current="page" onclick="formAdd()">
                        <b>&nbsp;Add New Class</b>
                    </button>
                  </center>

                <table class="table table-striped border-left table-sm fs-13-5 table-hover marge0 border p-1 border-2" id="Classes" width="100%">
                    <thead>
                        <th>N°</th>
                        <th>Code Classe</th>
                        <th>Class Name</th>
                        <th>School Fees</th>
                        <th>Action</th>
                    </thead>
                    @forelse ($classes as $index => $classe)
                        <tbody>
                            <tr>
                                <td><b> {{$index + 1 }}</b></td>
                                <td> <b> {{$classe->codeCl}} </b></td>
                                <td><b> {{$classe->nomCl}} </b></td>
                                <td><b> {{$classe->montantDue}} F CFA</b></td>
                                <td>
                                    <a href="{{ route('Student.showStudentsByClass',['codeCl' => $classe->codeCl]) }}" class="view border-right " title="Show student list" data-toggle="tooltip" > <b><i class="fas fa-list-ol fs-6 text-info "></i></b></a><span class="mx-1 text-secondary">|</span>
                                    <button class="btn btn-white p-0"  onclick="confirmDelete()" title="Delete" data-toggle="tooltip"><b><i class="fa fa-trash text-danger"></i></b></button><span class="mx-2 text-secondary">|</span>
                                    <a  href="{{ route('Classes.edit', $classe->codeCl) }}" class="link-disable"class="edit" title="Edit" data-toggle="tooltip" scope="col"><b><i class="fa fa-edit text-primary"  ></i></b></a>

                                    <form id="delete-form" action="{{ route('Classes.delete', $classe->codeCl) }}" method="post" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr >
                                <td class="text-info"> <b>No class available</b> </td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>
                <div>
                    {{ $classes->links() }}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>




        <script>
            function confirmDelete() {
                swal({
                    title: "Are You Sure ?",
                    text: "Once deleted, you will not be able to recover this  class!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Soumettre le formulaire de suppression
                        document.getElementById('delete-form').submit();
                    } else {
                        swal("Your Class is safe!");
                    }
                });
            }
        </script>


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

        <script>
            function formAdd(){
                window.location.href = '/Classes/formulaire';
            }
        </script>
@endsection
