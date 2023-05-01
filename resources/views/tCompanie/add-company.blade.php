@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white; ">Adauga companie</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('show-form') }}" id="call-back-form" name="call-back-form">
                        @csrf

                        <div class="row mb-3">
                            <label for="nume_companie" class="col-md-4 col-form-label text-md-end">{{ __('Nume companie') }}</label>

                            <div class="col-md-6">
                                <input id="nume_companie" type="text" class="form-control" name="nume_companie" value="{{ old('nume_companie') }}" required autocomplete="nume_companie" autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary" type="button" onclick="save_form()">Adauga companie</button>
                            </div>
                        </div>

                        <div id="errors" style="margin-top:2rem;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function save_form() {
        var data = $("#call-back-form").serialize();
        $.ajax({
            url: "/add/company",
            method: "post",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 0) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                        window.location.href = 'http://127.0.0.1:8000/add/company';
                    }, 2500);
                }
            }
        })
    }
</script>
@endsection