@extends('layouts.app')

@section('content')
            
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Totat des Etudiants par etablissement</h1>
                        {{-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Accueil</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol> --}}
                        {{-- <div class="card mb-4">
                            <div class="card-body">
                                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                                .
                            </div>
                        </div> --}}
                        <div class="card mb-4">
                            
                            {{-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                                
                            </div> --}}
                            
                            <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Les etablisment</th>
                                    <th>Total</th>
                                    <th>Filles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $lists as $list=>$one )
                                <tr>
                                    <td>{{ $one['etat'] }}</td>
                                    <td>{{ $one['total']}}</td>
                                    <td>{{ $one['Filles'] }}</td>
                                </tr>  
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Effectifs des etudiants par etablissement
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Modifier hier ?? 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Repartution des etudiants par etablissement 
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Modifier hier ?? 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div> --}}
                    </div>
                </main>
              <script>var stat = @json($lists)</script>
       @endsection