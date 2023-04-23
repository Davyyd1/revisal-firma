@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
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
                                @foreach($angajati as $angajat)
                                <tr>
                                    <td><a href="#">{{ $angajat->numar_marca }}</a></td>
                                    <td>{{ $angajat->nume }}</td>
                                    <td>{{ $angajat->prenume }}</td>
                                    <td>{{ $angajat->functie }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success"><a href="/{{ $angajat->slug }}" style="text-decoration:none;color:white;">Vezi</a></button>
                                        <button class="btn btn-sm btn-danger" data-id="{{ $angajat->id }}" data-marca="{{ $angajat->numar_marca }}" onclick="delete_employee(this)">Sterge</button>
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
                {{$angajati->links(("pagination::bootstrap-4"))}}
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->

    <script>
        function delete_employee(elem) {
            var data = $("#call-back-form").serialize();
            $.ajax({
                url: "/delete-employee",
                method: "post",
                data: {
                    id: $(elem).attr('data-id'),
                    marca: $(elem).attr('data-marca'),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(){
                    if(confirm("Esti sigur ca vrei sa stergi angajatul?")) {} else {return false};
                },
                success: function(data) {
                    if (data.status == 0) {
                        $("#errors").html(data.mesaj);
                        $("#errors").fadeTo(2000, 500).slideUp(500);
                        $("#errors").slideUp(500);
                        setTimeout(() => {
                        location.reload();
                        }, 3000);
                    }
                    if (data.status == 1) {
                        $("#errors").html(data.mesaj);
                        $("#errors").fadeTo(2000, 500).slideUp(500);
                        $("#errors").slideUp(500);
                        setTimeout(() => {
                        location.reload();
                        }, 3000);
                    }
                }
            })
        }
    </script>
@endsection
