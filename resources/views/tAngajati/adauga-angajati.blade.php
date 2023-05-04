@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white;">Adauga angajat</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('show-form') }}" id="call-back-form" name="call-back-form">
                        @csrf

                        <div class="row mb-3">
                            <label for="numar_marca" class="col-md-4 col-form-label text-md-end">{{ __('Numar marca') }}</label>

                            <div class="col-md-6">
                                <input id="numar_marca" type="text" class="form-control" name="numar_marca" value="{{ old('numar_marca') }}" required autocomplete="numar_marca" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_id" class="col-md-4 col-form-label text-md-end">{{ __('Companie') }}</label>

                            <div class="col-md-6">
                                <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->nume }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="este_tesa" class="col-md-4 col-form-label text-md-end">{{ __('Tesa') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="este_tesa" name="este_tesa" value="1">Da &nbsp;
                                <input type="radio" id="este_tesa" name="este_tesa" value="0">Nu
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="are_drepturi" class="col-md-4 col-form-label text-md-end">{{ __('Poate aviza cereri') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="are_drepturi" name="are_drepturi" value="1">Da &nbsp;
                                <input type="radio" id="are_drepturi" name="are_drepturi" value="0">Nu
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nume" class="col-md-4 col-form-label text-md-end">{{ __('Nume') }}</label>

                            <div class="col-md-6">
                                <input id="nume" type="text" class="form-control" name="nume" value="{{ old('nume') }}" required autocomplete="nume" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenume" class="col-md-4 col-form-label text-md-end">{{ __('Prenume') }}</label>

                            <div class="col-md-6">
                                <input id="prenume" type="text" class="form-control" name="prenume" value="{{ old('prenume') }}" required autocomplete="prenume" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="functie" class="col-md-4 col-form-label text-md-end">{{ __('Functie') }}</label>

                            <div class="col-md-6">
                                <input id="functie" type="text" class="form-control" name="functie" value="{{ old('functie') }}" required autocomplete="functie" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="serie_ci" class="col-md-4 col-form-label text-md-end">{{ __('Serie buletin') }}</label>

                            <div class="col-md-6">
                                <input id="serie_ci" type="text" class="form-control" name="serie_ci" value="{{ old('serie_ci') }}" required autocomplete="functie" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numar_ci" class="col-md-4 col-form-label text-md-end">{{ __('Numar buletin') }}</label>

                            <div class="col-md-6">
                                <input id="numar_ci" type="text" class="form-control" name="numar_ci" value="{{ old('numar_ci') }}" required autocomplete="numar_ci" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cnp" class="col-md-4 col-form-label text-md-end">{{ __('CNP') }}</label>

                            <div class="col-md-6">
                                <input id="cnp" type="text" class="form-control" name="cnp" value="{{ old('cnp') }}" required autocomplete="cnp" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresa" class="col-md-4 col-form-label text-md-end">{{ __('Adresa') }}</label>

                            <div class="col-md-6">
                                <input id="adresa" type="text" class="form-control" name="adresa" value="{{ old('adresa') }}" required autocomplete="adresa" autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary" type="button" onclick="save_form()">Adauga angajat</button>
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
            url: "/show-form",
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
                        window.location.href = 'http://127.0.0.1:8000/show-form';
                    }, 2700);
                }
            }
        })
    }
</script>
@endsection