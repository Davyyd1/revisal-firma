@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    

                    <div class="search">
                        <div class="container-fluid">
                            <form action="{{ route('search-employee') }}" method="POST">
                                @csrf
                                <h3 style="margin-top:1rem;">Cauta angajat</h3>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-box mb-20">
                                            <input type="text" name="nume" class="form-control" placeholder="Nume*">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-box mb-20">
                                            <input type="text" name="prenume" class="form-control" placeholder="Prenume*">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-box mb-20">
                                            <input type="text" name="numar_marca" class="form-control" placeholder="Numar marca*">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-box mb-20">
                                            <button class="btn btn-sm btn-success">Cauta</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   <hr>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel angajati Groupe TIB</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Numar marca</th>
                                    <th>Nume</th>
                                    <th>Prenume</th>
                                    <th>Functia</th>
                                    <th>Actiune</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($search as $angajat)
                                <tr>
                                    <td><a href="#">{{ $angajat->numar_marca }}</a></td>
                                    <td>{{ $angajat->nume }}</td>
                                    <td>{{ $angajat->prenume }}</td>
                                    <td>{{ $angajat->functie }}</td>
                                    <td>
                                        <a href="/{{ $angajat->slug }}" style="text-decoration:none;color:white;"><button class="btn btn-sm btn-success">Vezi</button></a>
                                        <button class="btn btn-sm btn-danger" data-id="{{ $angajat->id }}" data-marca="{{ $angajat->numar_marca }}" onclick="delete_employee(this)">Sterge</button>
                                        <a href=""><button class="btn btn-sm btn-info">Genereaza C.O.</button></a>
                                    </td>
                                    {{-- <td><a href="#" class="btn btn-sm btn-primary">{{ $angajat->cnp }}</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                            <div id="errors"></div>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
                {{$search->links(("pagination::bootstrap-4"))}}
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->

    
@endsection
