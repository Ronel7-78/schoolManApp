@extends('../Template/app')

@section('pageFck')
<title> Profil {{$students->nomEl}} {{$students->prenomEl}}</title>
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 card bordure1 marge0">
           <!--  //entete -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <center class="my-1">
                            <b>Republique du Cameroun</b> <br>
                            <small>
                                <i><b>Paix-Travail-Patrie</b></i> <br>
                            </small>

                            <b>Ministère de l'enseignement Secondaire</b> <br>
                            <b>Lycee de MOKOLO IV Bertoua</b> <br>

                        </center>

                    </div>

                    <div class="col-md-4">
                        <center class="mt-4">
                            <div class="" >
                                <img src="{{ asset('imagesP/logo.png')}}"
                                class="card rounded-circle border-0" alt="" srcset="" style="height: 6rem; width:6.9rem ; margin-top:4rem">
                            </div>
                        </center>
                    </div>

                    <div class="col-md-4">
                        <center class="my-1">
                            <b>Republic of Cameroon</b> <br>
                            <small>
                                <i><b>Peace-Work-Fatherland</b></i> <br>
                            </small>

                            <b>Ministry of Secondary Education</b> <br>
                            <b>Govement High School MOKOLO IV Bertoua</b> <br>

                        </center>
                    </div>
                </div>
            </div>
            <hr>
            <center  >
                <i>
                    <b class="h2 text-underline">RECU DE PAIEMENT</b>
                </i>
            </center>
            <hr>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nom(s) & Prénom(s) :</label> <b> {{$students->nomEl}}  {{$students->prenomEl}}</b>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Né(e) le :</label> <b> {{$students->dateNais}}  </b> <label for="">&nbsp; &nbsp; À &nbsp;</label> <b> {{$students->lieuNais}}</b>
                        </div>
                        <div class="form-group ">
                          <label for="">Classe :</label> <b> &nbsp; &nbsp;{{$students->codeCl}}  </b>&nbsp; &nbsp;&nbsp; &nbsp;  <label for="">Sexe :</label> <b>&nbsp; &nbsp; {{$students->gender}}</b>
                        </div>

                       <!--  <div class="form-group my-2">

                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <center>
                            <table class="table  table-bordered table-sm fs-5 h-100 table-hover my-2 border p-2 border-2">
                                <thead>
                                    <tr>

                                        <th>Montant Due</th>
                                        <th>Montant versé</th>
                                        <th>Reste</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td> <b>{{ $students->montantDue }} F CFA</b> </td>
                                        <td> <b class="text-success">{{ $students->montantVerse }} F CFA</b> </td>
                                        <td> <b class="text-danger">{{ $students->resteV }} F CFA</b> </td>
                                    </tr>

                                </tbody>
                            </table>
                        </center>
                    </div>
                    <hr>
                    <div class="row mt-2 mb-5" >
                        <div class="col-md-3">
                            <center>
                                <b> L'Intendant(e)</b>
                                <hr class=" m-0 w-75 py-1 text-dark" style="font-weight: bold;  ">
                            </center>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                            <label for="">Fait le :</label> <i><b> &nbsp; &nbsp; &nbsp; {{$students->datePay}}</b></i>
                            <hr class=" m-0 w-75 py-1 text-dark" style="font-weight: bold; float:right ">
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <a href="{{route('Student.printFacture')}}" class="btn btn-primary" > </a>
            </center>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection
