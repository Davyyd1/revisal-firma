@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:gray; color:white;">Angajat {{ $angajat->nume }} {{ $angajat->prenume }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="numar_marca" class="col-md-4 col-form-label text-md-end">{{ __('Numar marca') }}</label>

                        <div class="col-md-6">
                            {{ $angajat->numar_marca }}
                        </div>
                    </div>

                    <form method="POST" id="call-back-form" name="call-back-form">
                        @csrf
                        <input type="hidden" value="{{ $angajat->slug }}" name="slug">
                        
                        <div class="row mb-3">
                            <label for="company_id" class="col-md-4 col-form-label text-md-end">{{ __('Companie') }}</label>

                            <div class="col-md-6">
                                <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach(get_company() as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $angajat->company_id ? 'selected' : '' }} >{{ $company->nume }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="este_tesa" class="col-md-4 col-form-label text-md-end">{{ __('Tesa') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="este_tesa" name="este_tesa" value="1" class="@error('este_tesa') is-invalid @enderror" {{ $angajat->este_tesa==1 ? 'checked' : ''}}>Da &nbsp;
                                <input type="radio" id="este_tesa" name="este_tesa" value="0" class="@error('este_tesa') is-invalid @enderror" {{ $angajat->este_tesa==0 ? 'checked' : ''}}>Nu
                                
                                @error('este_tesa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="are_drepturi" class="col-md-4 col-form-label text-md-end">{{ __('Poate aviza cereri') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="are_drepturi" name="are_drepturi" value="1" class="@error('are_drepturi') is-invalid @enderror" {{ $angajat->are_drepturi==1 ? 'checked' : ''}}>Da &nbsp;
                                <input type="radio" id="are_drepturi" name="are_drepturi" value="0" class="@error('are_drepturi') is-invalid @enderror" {{ $angajat->are_drepturi==0 ? 'checked' : ''}}>Nu
                                
                                @error('are_drepturi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="nume" class="col-md-4 col-form-label text-md-end">{{ __('Nume') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nume" value="{{ $angajat->nume }}" required autocomplete="nume" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenume" class="col-md-4 col-form-label text-md-end">{{ __('Prenume') }}</label>

                            <div class="col-md-6">
                                <input id="prenume" type="text" class="form-control @error('prenume') is-invalid @enderror" name="prenume" value="{{ $angajat->prenume }}" required autocomplete="prenume" autofocus>

                                @error('prenume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="functie" class="col-md-4 col-form-label text-md-end">{{ __('Functie') }}</label>

                            <div class="col-md-6">
                                <input id="functie" type="text" class="form-control @error('functie') is-invalid @enderror" name="functie" value="{{ $angajat->functie }}" required autocomplete="functie" autofocus>

                                @error('prenume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="serie_ci" class="col-md-4 col-form-label text-md-end">{{ __('Serie buletin') }}</label>

                            <div class="col-md-6">
                                <input id="serie_ci" type="text" class="form-control @error('serie_ci') is-invalid @enderror" name="serie_ci" value="{{ $angajat->serie_ci }}" required autocomplete="serie_ci" autofocus>

                                @error('serie_ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numar_ci" class="col-md-4 col-form-label text-md-end">{{ __('Numar Buletin') }}</label>

                            <div class="col-md-6">
                                <input id="numar_ci" type="text" class="form-control @error('numar_ci') is-invalid @enderror" name="numar_ci" value="{{ $angajat->numar_ci }}" required autocomplete="numar_ci" autofocus>

                                @error('numar_ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cnp" class="col-md-4 col-form-label text-md-end">{{ __('CNP') }}</label>

                            <div class="col-md-6">
                                <input id="cnp" type="text" class="form-control @error('cnp') is-invalid @enderror" name="cnp" value="{{ $angajat->cnp }}" required autocomplete="cnp">

                                @error('cnp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresa" class="col-md-4 col-form-label text-md-end">{{ __('Adresa') }}</label>

                            <div class="col-md-6">
                                <textarea id="adresa" type="text" class="form-control @error('adresa') is-invalid @enderror" name="adresa"  required autocomplete="adresa">{{ $angajat->adresa }}</textarea>

                                @error('adresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="errors"></div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="update_employee()">
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
    function update_employee() {
        var data = $("#call-back-form").serialize();
        $.ajax({
            url: "/employee/update",
            method: "put",
            data:data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.status == 0) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(1500, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                    location.reload();
                    }, 2500);
                }
                if (data.status == 1) {
                    $("#errors").html(data.mesaj);
                    $("#errors").fadeTo(1300, 500).slideUp(500);
                    $("#errors").slideUp(500);
                    setTimeout(() => {
                        window.location.href = 'http://127.0.0.1:8000/employees'
                    }, 1800);
                }
            }
        })
    }
</script>
@endsection