{{-- cette partie importe le header --}}
@extends('../Template/app')

{{-- celle-ci inclu la section dans laquelle notre code va s'afficher --}}
@section('pageFck')
  <title>Accueil</title>
    @if (session()->has('success'))

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            swal("Succès", "{{ session('success') }}", "success");
        });
    </script>

    @endif
@endsection
