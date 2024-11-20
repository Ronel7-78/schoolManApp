{{-- cette partie importe le header --}}
@extends('../Template/app')

{{-- celle-ci inclu la section dans laquelle notre code va s'afficher --}}
@section('pageFck')
  <title>Profile</title>
    {{-- @if (session()->has('success'))

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            swal("Succès", "{{ session('success') }}", "success");
        });
    </script>

    @endif --}}
<body style="background-color:#e2ecf3">
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card profileU bg-tertiary" >
                <center>
                    <div class="alert alert-info p-0 mt-3">
                        <h3>Your Profile</h3>
                    </div>
                </center>

                    <div class="row g-0">
                    <div class="col-md-4">
                        <center>
                            <img src="{{ asset('storage/'.$admin->photo ?? 'default-image.png') }}" class="img-fluid rounded-circle "
                            alt="Admin Photo" style="width:6rem; height:6rem">
                        </center>
                    </div>
                    <div class="col-md-8 ">
                        <div >
                            <span class="">
                                Name :<b class="text-center"> {{ $admin->name}}</b>
                            </span>
                        </div>
                        <div class="my-2">
                            <span class="card-text my-2">
                                First Name:<b class="text-center"> {{ $admin->prenom}}</b>
                            </span>
                        </div>
                        <div>
                            <span class="card-text">
                                Email :<b class="text-center"> {{ $admin->email}}</b>
                            </span>
                        </div>
                        <div class="my-2">
                            <span class="card-text">
                                Phone :<b class="text-center"> {{ $admin->telephone}}</b>
                            </span>
                        </div>
                    </div>



                        <div class="card-footer">

                                <center class="my-2">
                                    <button onclick="modifAd()" class="btn btn-outline-success">
                                       <b> <i class="fas fa-recycle"></i> Update Profile</b>
                                    </button>
                                </center>

                        </div>
                    </div>
                    </div>

            </div>
            <div class="col-md-3"></div>
        </div>
   </div>
</body>










@if (session()->has('error'))

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal("Erreur", "{{ session('error') }}", "error");
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
    function modifAd(){
        window.location.href = '/Admin/{{ $admin->id}}/editAdmin';
    }
</script>

@endsection
