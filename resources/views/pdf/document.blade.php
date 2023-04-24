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
        border: 1px solid black;
        text-align: left;
        padding: 8px;
        }

        .tabel-predare-primire{
            width: 100%;
        }
        
    </style>
</head>

<body>
    <header>
        <img width="37%" style="opacity:0.5" src="https://i.imgur.com/sWrWzGU.png" height="93" />
    </header>

    <body>
        <p style="margin-left: 12rem; margin-top:3rem;"><b>{{ $employee_co->nume }} {{ $employee_co->data_cerere }} {{ $employee_co->data_inceput }} {{ $employee->data_sfarsit }}</b><br></p> 
        <p><span style="font-size:13.5px; margin-left:2rem; margin-right:2rem;">la Contractul de abonament pentru serviciile prestate profesionistilor de catre Telekom nr. ................. din data  de </span><span style="margin-left:18rem;">........................</span></p>

        <p style="font-size:13.5px; margin-top:2rem;">Incheiat intre:</p>

        <p style="font-size:13.5px;">.................................., cu sediul in ......................, Str. ............ nr ......., .............. ..... ........., Romania, inregistrata la Registrul Comertului sub nr. J..../...../....., CUI ........................, Cod de Inregistrare Fiscala RO................., capital social de ............................ lei, Cod IBAN ............................... deschis la ......................, legal reprezentat prin ......................... in calitate de Agent de Vanzari ..................................., Cod de vanzare ..............................., denumita in continuare <b>„Agent Telekom”</b></p>

        <p style="font-size:13.5px;">si</p>

        <p style="font-size:13.5px;">.................................., cu sediul in ......................, Str. ............ nr ......., .............. ..... ........., Romania, inregistrata la Registrul Comertului sub nr. J..../...../....., CUI ........................, Cod de Inregistrare Fiscala RO................., capital social de ............................ lei, Cod IBAN ............................... deschis la ......................, legal reprezentat prin ......................... in calitate de ................................,  adresa e-mail: ..................................., nr. telefon contact: .................................., denumita in continuare <b>„Client”</b>.</p>
       
        <p style="font-size:13.5px;">Agentul Telekom declara ca a inmanat reprezentantului Clientului mentionat mai sus, iar Clientul declara ca a primit de la reprezentantul AgentuluiTelekom mentionat mai sus, cartelele SIM avand seriile mentionate in tabelul de mai jos:</p>

        <table style="border:1px solid black; margin-top:1.3rem; margin-bottom:1.3rem;" class="tabel-first">
            <tr >
                <th class="th"> </th>
                <th class="th"> </th>
                <th class="th"> </th>
              </tr>
              <tr>
                <td class="td"> </td>
                <td class="td"></td>
                <td class="td"></td>
              </tr>
              <tr>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
              </tr>
              <tr>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
              </tr>
              <tr>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
              </tr>
        </table>

        <p style="font-size:13.5px;">Clientul declara ca a primit cartelel SIM mentionate mai sus in stare buna, nu prezinta deformari, loviri sau alte vicii aparente si este de acord cu receptia lor fara obiectiuni. In cazul in care Clientul are obiectiuni, le va mentiona in continuare: .....................................................................................................................................................................................
        .....................................................................................................................................................................................
        </p>

        <p style="font-size:13.5px;">Persoana semnatara din partea Clientului declara ca are puterea de a reprezenta Clientul la semnarea acestui proces-verbal de predare-primire, de a receptiona cartelele SIM de la Agentul Telekom si de a angaja Clientul ca urmare a semnarii acestui proces-verbal de predare-primire.</p>

        <p style="font-size:13.5px;">Incheiat in 2 (doua) exemplare, cate unul pentru fiecare parte.</p>

        <table style="font-size:13.5px;" class="tabel-predare-primire">
            <p style="font-size:13.5px;"><b>DATA (zz/ll/aaaa): ………………………………..</b></p>
            <tr>
                <th style="width:65%; font-size:13.5px; text-align:left;">
                    AM PREDAT:
                </th>
                <th style="width:35%; text-align:left;">
                    AM PRIMIT:
                </th>
            </tr>
            <tr>
                <td><b>Agent Telekom: ______________________</b></td>
                <td><b>Client: _______________________</b></td>
            </tr>
            <tr>
                <td><b>Prin: ___________________</b></td>
                <td><b>Prin: ________________________</b></td>
            </tr>
            <tr>
                <td><b>Semnatura si stampila:	</b></td>
                <td><b>Semnatura si stampila:	</b></td>
            </tr>
        </table>
        
    </body>

    <footer style="font-size:8.5;opacity:0.5">TELEKOM ROMANIA MOBILE COMMUNICATIONS S.A.
        <br>
        B-dul Expozitiei nr. 1C, Cladirea B1, Etajele 1, 2 si 3, sector 1, cod postal 012101, Bucuresti, Romania | Telefon: 1933 | www.mobile.telekom.ro | Nr. Inreg. Reg. Com.: J40/433/1999 | CUI: 11952970 | CIF: RO11952970 | Capital social subscris si varsat 409.059.998,27 lei 
    </footer>


</body>

</html>
