@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white;">Angajat {{ $angajat->nume }} {{ $angajat->prenume }}</div>
                <div class="card-body">
                    <form method="POST" id="call-back-form" name="call-back-form">
                        @csrf
                        <input type="hidden" value="{{ $angajat->slug }}" name="slug">
                        
                        <div class="row mb-3">
                            <label for="data_cerere" class="col-md-4 col-form-label text-md-end">{{ __('Data cerere') }}</label>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" id='datetimepicker3' name="data_cerere" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @error('data_cerere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data" class="col-md-4 col-form-label text-md-end">{{ __('Data inceput') }}</label>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" id='datetimepicker2' name="dataco_inceput" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @error('dataco-inceput')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data-sfarsit" class="col-md-4 col-form-label text-md-end">{{ __('Data inceput') }}</label>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control" id='datetimepicker2' name="dataco_sfarsit" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @error('dataco-sfarsit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="errors"></div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="save_co()">
                                    Salveaza cererea de concediu
                                </button>
                                <a href="/pdf"><button type="button" class="btn btn-success">
                                    Genereaza pdf
                                </button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function save_co() {
        var data = $("#call-back-form").serialize();
        $.ajax({
            url: "/generate/save",
            method: "patch",
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
                    }, '2800');
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                        location.reload();
                    }, '2800');
                }
            }
        })
    }
</script>
@endsection