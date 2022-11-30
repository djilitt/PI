@extends('layouts.app')

@section('content')

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Export/Import</h1>
                        {{-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol> --}}
                        {{-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> --}}
                        <form action="{{ route('ESP.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-primary">Importer les données des etudiants</button>
                            <a class="btn btn-danger float-end" href="{{ route('ESP.export') }}">Exporter les données des etudiants</a>
                        </form>

                        {{-- <table class="table table-bordered mt-3">
                            <tr>
                                <th>N°_inscription</th>
                                <th>NNI</th>
                                <th>N°_de_BAC</th>
                                <th>Nom_et_prenom</th>
                            </tr>
                            @foreach($ESPs as $at)
                            <tr>
                                <td>{{ $at->N°_inscription }}</td>
                                <td>{{ $at->NNI }}</td>
                                <td>{{ $at->N°_de_BAC }}</td>
                                <td>{{ $at->Nom_et_prenom }}</td>
                            </tr>
                            @endforeach
                        </table> --}}
                </main>
       @endsection
