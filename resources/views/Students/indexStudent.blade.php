@extends('../Template/app')

@section('pageFck')
    <title>Student's</title>

    <div class="container-fluid">
        <div class="row">
            <a href="{{ route('Student.form')}}" class="nav-items">Lien vers les eleves </a>
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
