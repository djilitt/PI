@extends('layouts.app')

@section('content')
            <style>
                 .model{
                    border-color:#2b6ec4;
 display: none;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 170px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  box-shadow: 0 0 10px rgba(0,0,0,0.2);

  font-size: 1.4em ;
                 }
            </style>

                <main>

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Export</h1>
                        <ol class="breadcrumb mb-4">
                            {{-- <li class="breadcrumb-item"><a href="{{route('index')}}">Accueil</a></li>
                            <li class="breadcrumb-item active">Export</li> --}}
                        </ol>
                        <div class="card mb-4">

                            <form action="{{ route('ESP.export') }}" method="GET" enctype="multipart/form-data">
                                <button class="btn btn-danger float-end p-2" type="submit">Exporter les Etudiants</button>
                                <select class="p-2 text-light bg-success float-center" name="annee" id="annee" required>
                                    <option value="" selected disabled>Specifie l'annee scolaire</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2017-2018">2017-2018</option>
                                </select>
                                                            <select name="etat" id="etat" class="p-2 text-light bg-success " required>
                                                                <option value="" selected disabled>Specifie l'etablisment</option>
                                                                <option value="SupNum">SpNum</option>
                                                                <option value="ESP">ESP</option>
                                                                <option value="ISCAE">ISCAE</option>
                                                            @foreach ($etats as $etat=>$one )
                                                                <option value="{{ $one->abrev}}">{{$one->abrev}}</option>
                                                            @endforeach
                                                            </select>
                                                            <button type="button" class="btn btn-primary center-block p-2" onclick="model('Modal');">Filtrer vos exports</button>

                                                            <div class="model" style="display: none" id="Modal">
                                                                <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="ModalLabel">Filtrer le Fichier Exporter</h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="sb-sidenav-menu-heading">Etudiants</div>
                                                                     <input type="checkbox" name="etudiant[]" value="genre">
                                                                       genre
                                                                       <input type="checkbox" name="etudiant[]" value="Redoublant">
                                                                       Redoublant
                                                                       <input type="checkbox" name="etudiant[]" value="NATIONALITE">
                                                                       Nationalite
                                                                       <input type="checkbox" name="etudiant[]" value="wilaya">
                                                                       wilaya
                                                                    <br>
                                                                    <br>
                                                                    <div class="sb-sidenav-menu-heading">Etablisment</div>
                                                                  <input type="checkbox" name="Etablissement[]" id="" value="privee">
                                                                    privee
                                                                 <input type="checkbox" name="Etablissement[]" id="" value="public">
                                                                    public
                                                                 <input type="checkbox" name="Etablissement[]" id="" value="co-tutle">
                                                                 co-tutle
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      {{-- <button type="button" class="btn btn-secondary" >Close</button> --}}
                                                                      <button type="button" class="btn btn-primary" class="save">Continuer l'export</button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                            </form>




                        </div>

                    </div>
                </main>

            <script>

         function model(id_model){
var modal = document.getElementById(id_model);


var span = document.getElementsByClassName("close")[0];


    modal.style.display = "block";


    span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}

            </script>
            @endsection
