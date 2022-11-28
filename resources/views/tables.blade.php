@extends('layouts.app')

@section('content')
          
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <form action="{{ route('ESP.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-primary">Import User Data</button>
                        </form>
            
                        <table class="table table-bordered mt-3">
                            <tr>
                                <th colspan="3">
                                    List Of Users
                                    <a class="btn btn-danger float-end" href="{{ route('ESP.export') }}">Export User Data</a>
                                </th>
                            </tr>
                   
                </main>
       @endsection   