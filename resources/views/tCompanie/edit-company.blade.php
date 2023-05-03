@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white;">Companie</div>
                <div class="card-body">
                    <form method="POST" id="call-back-form" name="call-back-form">
                        @csrf
                        <input type="hidden" value="{{ $company->slug }}" name="slug">
                        
                        <div class="row mb-3">
                            <label for="nume_companie" class="col-md-4 col-form-label text-md-end">{{ __('Nume companie') }}</label>

                            <div class="col-md-6">
                                <input id="nume_companie" type="text" class="form-control @error('nume_companie') is-invalid @enderror" name="nume_companie" value="{{ $company->nume }}" required autocomplete="company_name" autofocus>

                                @error('nume_companie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div id="errors"></div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="update_company()">
                                    Actualizeaza date
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
                    }, 2500);
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                        window.location.href = 'http://127.0.0.1:8000/show-company'
                    }, 2500);
                }
            }
        })
    }
</script>
@endsection