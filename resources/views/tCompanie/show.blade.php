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
                            <h3 style="margin-top:1rem;">Cauta companie</h3>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-box mb-20">
                                        <input type="text" name="nume" class="form-control" placeholder="Nume*">
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
                    <h6 class="m-0 font-weight-bold text-primary">Tabel companii</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nume</th>
                                <th>Actiune</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->nume }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="/show-company/{{ $company->slug }}"><button type="button" class="btn btn-primary">Vezi</button></a>
                                    <button class="btn btn-sm btn-danger" data-id="{{ $company->id }}" onclick="delete_company(this)" style="padding:.5rem;">Sterge</button>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <div id="errors"></div>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
            {{$companies->links(("pagination::bootstrap-4"))}}
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<script>
    function delete_company(elem) {
        // var data = $("#call-back-form").serialize();
        $.ajax({
            url: "/delete-company",
            method: "post",
            data: {
                id: $(elem).attr('data-id'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                if(confirm("Esti sigur ca vrei sa stergi compania?")) {} else {return false};
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

    function update_company() {
        var data = $("#call-back-form").serialize();
        $.ajax({
            url: "/update/company",
            method: "put",
            data:data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 0) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                    location.reload();
                    }, 2800);
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                        window.location.href = 'http://127.0.0.1:8000/show-company'
                    }, 2800);
                }
            }
        })
    }
</script>
@endsection