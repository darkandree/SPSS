<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Encoder/Validator Accomplishment</title>
    </head>

    <body>

<header style="text-align: left;">
    <table style="border-collapse: collapse; height: 30px; width: 100%;">
        <tbody>
            <tr>
                <td style="width: 20%" >
                    <img src="public_path('/images/dalogo.png')" width="78" height="78">
                </td>

                <td style=" width:60%; text-align:center; line-height: 1; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                <span style="font-size: 10px ;">Republic of the Philippines</span><br/>
                <span style="font-size: 14px;font-style:bold;">DEPARTMENT OF AGRICULTURE</span><br/>
                <span style="font-size: 10px;">Regional Field Office No. 8</span><br/>
                <span style="font-size: 10px;">Tacloban City</span><br/><br/>
                            <span style="font-size: 18px; font-style:bold">ACCOMPLISHMENT REPORT</span>
                    </strong>

                </td>
                
                <td style="width: 20%"><br></td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>

</header>






<table class="bordered" style="border-collapse:collapse; width: 100%; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; text-align:center">
    <tbody>
        <tr>
            <td style="width:5%;"><strong style="font-size: 11px;">NO</strong></td>
            <td style="width:30%;"><strong style="font-size: 11px;">RSBSA NUMBER</strong></td>
            <td style="width:30%;"><strong style="font-size: 11px;">FULLNAME</strong></td>
            <td style="width:10%;"><strong style="font-size: 11px;">GENDER</strong></td>
            <td style="width:10%;"><strong style="font-size: 11px;">BIRTHDAY</strong></td>
            <td style="width:10%;"><strong style="font-size: 11px;">DATE</strong></td>
            <td style="width:10%;"><strong style="font-size: 11px;">STATUS</strong></td>
        </tr>
        @foreach ($accomplishment as $value)
        <tr style="font-size:10px;">
            <td style="width: 5%;">{{ $loop->iteration }}</td>
            <td style="width: 30%;">{{ $value->rsbsa_no }}</td>
            <td style="width: 30%;">{{ $value->fullname }}</td>
            <td style="width: 10%;">{{ $value->sex }}</td>
            <td style="width: 10%;">{{ $value->birthday }}</td>
            <td style="width: 10%;">{{ $value->date_encoded }}</td>
            <td style="width: 10%;">{{ $value->upload_type }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<br/><br/><br/><br/>
<table style="border-collapse: collapse; height: 30px; width: 100%; font-family: Arial, Helvetica, sans-serif; text-align: right; font-size: 9px;">
    <tbody>
        <tr>
            <td style="width: 13.3839%; text-align: left; font-size: 10px;">Prepared by:</td>
            <td style="width: 19.3531%; text-align: center;"><u><strong style="font-size: 12px;">BON ANDREE G. GO</strong></u></td>
            <td style="width: 15.5652%; font-size: 10px">Approved by:</td>
            <td style="width: 18.5048%; text-align: center;"><u><strong style="font-size: 12px;">JAN LEO B. FALLER</strong></u></td>
            <td style="width: 2.49205%; text-align: left;"><br></td>
            <td style="width: 22.6935%; text-align: center;"><u><strong style="font-size: 12px;">JECELA A. DEMEGILLO</strong></u></td>
            <td style="width: 0.11347%;"><br></td>
        </tr>
        <tr>
            <td><strong><br></strong></td>
            <td style="text-align: center;"><em style="font-size: 12px;">RSBSA Encoder/Verifier</em></td>
            <td><br></td>
            <td style="text-align: center;"><em style="font-size: 12px;">ISA II</em></td>
            <td><br></td>
            <td style="text-align: center;"><em style="font-size: 12px;">PMED-CHIEF</em></td>
            <td><br></td>
        </tr>
    </tbody>
</table>



<style>
                .bordered tbody tr td{
                    border: 1px solid gray;
                }

                .borders td {
                    border: 1px solid black;
                }
            </style>


</body>

</html>
