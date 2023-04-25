<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
    <style>
        @page {
            margin: 100px 50px;
        }

        header {
            position: fixed;
            top: -90px;
            left: 50px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        span {
            page-break-after: always;
        }

        span:last-child {
            page-break-after: never;
        }

        .magento {
            color: #e2007a;
            font-size: 10;
        }
        .tabel-first {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .td, .th {
        border: .5px solid black;
        text-align: left;
        padding: 8px;
        font-size: 14.5px;
        }
        .td{
            font-size: 12px;
        }
        .tabel-predare-primire{
            width: 100%;
        }
        
    </style>
</head>

<body>
    <header>
        <img width="37%" style="opacity:0.5" src="" height="93"/>img sigla firma
    </header>

    <body>
        <p style="margin-left: 12rem; margin-top:3rem;"><b></b><br></p> 
        <p style="font-weight:bold; float:right">Nr{{ autocomplete($employee_co->nr) }}/{{ autocomplete($employee_co->nrinreg) }}</p><br>

        <p style="font-size:14.5px; margin-top:3rem; font-weight:bold;">Doamna/Domnule Director,</p>

        <p style="font-size:14.5px;">Subsemnatul/a <b>{{ autocomplete($employee_co->nume) }}  {{ autocomplete($employee_co->prenume) }}</b>, angajat/a in cadrul <b>{{ autocomplete($employee_co->companie) }}</b>, in functia de <b>{{ autocomplete($employee_co->functie) }}</b>, avand contract individual de munca pe perioada determinata/nedeterminata, va rog sa imi aprobati <b>{{ autocomplete($employee_co->nr_zile) }} zile / ore</b> pentru: </p>

        <p style="font-size:14.5px;">
        <b><input type="radio" style="margin-bottom:-4.5px;">Invoire cu recuperare</b><br>
        <b><input type="radio" style="margin-bottom:-4.5px;" checked>Concediu de odihna</b><br>
        <b><input type="radio" style="margin-bottom:-4.5px;">Concediu eveniment special * (certificatul de casatorie/deces)</b><br>
        <b><input type="radio" style="margin-bottom:-4.5px;">Maternitate / paternitate * (certificat nastere/curs de puericultura)</b><br>
        <b><input type="radio" style="margin-bottom:-4.5px;">Concediu fara plata</b>
        </p>

        <p style="font-size:14.5px;">Incepand cu ora/data de <b>{{ autocomplete($employee_co->data_inceput) }}</b> pana la ora/data de <b>{{ autocomplete($employee_co->data_sfarsit) }}</b>.</p>
        <p style="font-size:14.5px;">Persoana care va prelua atributiile in perioada invoirii/concediului( doar pentru functiile cadru ): <b>{{ autocomplete($employee_co->preluare_atributii) }}</b></p><br>
       
        <p style="font-size:14.5px; margin-left:30rem;">
        Data solicitare cerere: <b>{{ autocomplete($employee_co->data_cerere) }}</b>
        Semnatura salariat:
        </p>

        <table style="border:1px solid black; margin-top:1.3rem; " class="tabel-first">
            <tr>
                <th class="th">Viza SEF/RESPONSABIL IERARHIC </th>
                <th class="th">Viza RESURSE UMANE </th>
              </tr>
              <tr>
                <td class="td">NUME SI PRENUME: </td>
                <td class="td">Numar zile concediu de odihna/ore de recuperare: <b>{{ autocomplete($employee_co->nr_zile) }}</b></td>
              </tr>
              <tr>
                <td class="td">SEMNATURA:</td>
                <td class="td">SEMNATURA:</td>
            </tr>
            
        </table>
        <p style="font-size:12px">*se va anexa la intoarcerea din concediu</p>
        <p style="text-align:right; font-weight:bold; text-decoration:underline; margin-bottom:8.85rem;">APROBAT ADMINISTRATOR,</p>

        <b style="font-size:14.5px;"><span style="text-decoration:underline; font-weight:bold;">NOTA</span>: Cererile de concediu se acorda perioadelor anuale stabilite de catre angajator, respectand termenul intre 25 iulie - 25 august si respectiv, 20 decembrie - 15 ianuarie.</b><br><br>
        <b style="font-size:14.5px;"><span style="text-decoration: underline;">ATENTIE!</span> Dupa validare, un exemplar semmnat va fi inmanat salariatului.</b>

        <p style="font-size:13px;">Cod Unic de Inregistrare: RO 12345678<br> <span>N* Registrul Comertului: J11/2034/2005 - Cu capital de 410 000 lei</span></p>

    </body>
</body>

</html>
