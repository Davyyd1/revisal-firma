@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white;">Cerere pentru angajatul {{ $angajat->nume }} {{ $angajat->prenume }} @if($angajat->este_tesa), TESA @endif</div>
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
                            <label for="companie" class="col-md-4 col-form-label text-md-end">{{ __('Selecteaza compania') }}</label>

                            <div class="col-md-6">
                                <select name="companie" id="companie" class="form-control @error('nr_zile') is-invalid @enderror">
                                    <option value="SC Tib SRL">SC Tib SRL</option>
                                    <option value="SC KARCHER SRL">SC KARCHER SRL</option>
                                    <option value="SC UZINA DACIA SRL">SC UZINA DACIA SRL</option>
                                    <option value="SC Jucarii SRL">SC Jucarii SRL</option>
                                </select>

                                @error('companie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="responsabil_ierarhic" class="col-md-4 col-form-label text-md-end" style="font-size:15px;">{{ __('SEF/RESPONSABIL IERARHIC') }}</label>

                            <div class="col-md-6">
                                <select name="responsabil_ierarhic" id="responsabil_ierarhic" class="form-control @error('responsabil_ierarhic') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach($angajat_tesa as $tesa)
                                    <option value="{{ $tesa->id }}">{{ $tesa->nume }} {{ $tesa->prenume }}</option>
                                    @endforeach
                                </select>

                                @error('responsabil_ierarhic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if($angajat->este_tesa == 1)
                        <div class="row mb-3">
                            <label for="preluare_atributii" class="col-md-4 col-form-label text-md-end" style="font-size:15px;">{{ __('Angajat preluare atributii') }}</label>

                            <div class="col-md-6">
                                <select name="preluare_atributii" id="preluare_atributii" class="form-control @error('preluare_atributii') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach($angajat_tesa_preluareatrb as $ang_tesa)
                                    <option value="{{ $ang_tesa->id }}">{{ $ang_tesa->nume }} {{ $ang_tesa->prenume }}</option>
                                    @endforeach
                                </select>

                                @error('preluare_atributii')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                
                        <div class="row mb-3">
                            <label for="nr_zile" class="col-md-4 col-form-label text-md-end">{{ __('Numar zile concediu') }}</label>

                            <div class="col-md-6">
                                <input id="nr_zile" type="text" class="form-control @error('nr_zile') is-invalid @enderror" name="nr_zile" required autocomplete="new-password">

                                @error('nr_zile')
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
                            <label for="data-sfarsit" class="col-md-4 col-form-label text-md-end">{{ __('Data sfarsit') }}</label>

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
                            <div class="col-md-12" style="display:flex;">
                                <div class="col-md-9" style="padding-right:2.5rem;">
                                    <button type="button" class="btn btn-primary" onclick="save_co()" style="float:right;">
                                        Salveaza cererea de concediu
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <a href="/pdf/generate"><button type="button" class="btn btn-success">
                                        Genereaza pdf
                                    </button></a>
                                </div>
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
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(2000, 500).slideUp(500);
                    $("#errors").slideUp(500);
                }
            }
        })
    }
</script>
@endsection