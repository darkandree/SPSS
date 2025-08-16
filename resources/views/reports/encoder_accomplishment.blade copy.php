    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Encoder/Validator Accomplishment</title>
    </head>

    <body>

        <header>
            <table style="border-collapse: collapse; height:30px; width: 100%; text-align: center;">
                <tbody>
                    <tr>
                        <td style="width: 33.3333%; text-align: right;">
                            <img src="{{ public_path('storage/images/dalogo.png') }}" width="70" height="70">
                        </td>
                        <td style="width: 33.3333%;"><span style="font-family: Arial, Helvetica, sans-serif;"><strong><span
                                        style="font-size: 9px;">
                                        Republic of the Philippines<br>
                                        DEPARTMENT OF AGRICULTURE<br>
                                        Regional Field Office No. 8<br>
                                        Tacloban City<br><br>
                                        <h2>ACCOMPLISHMENT REPORT</h2></span><br></strong></span></td>
                        <td style="width: 33.3333%;"><br></td>
                    </tr>
                </tbody>
            </table>
            <br />

            <table
                style="border-collapse: collapse; height:30px; width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 9px;">
                <tbody>
                    <tr>
                        <td style="width: 11.3039%; text-align: right;"><strong>for which</strong></td>
                        <td style="width: 14.4585%; text-align: center;"><u><strong>JENNY LYN R. ALMERIA</strong></u></td>
                        <td style="width: 16.2986%; text-align: center;"><u><strong>Chief, Admin and Finance
                                    Division</strong></u>
                        </td>
                        <td style="width: 21.5037%; text-align: center;"><u><strong>Department of Agriculture RFO8&nbsp;
                                </strong></u></td>
                        <td style="width: 23.081%;"><strong>is accountable, having assumed such accountability</strong></td>
                        <td style="width: 13.3018%;"><u><strong>October 03, 2016</strong></u></td>
                    </tr>
                    <tr>
                        <td><strong><br></strong></td>
                        <td style="text-align: center;"><strong>Name of Accountable officer</strong></td>
                        <td style="text-align: center;"><strong>Official Designation</strong></td>
                        <td style="text-align: center;"><strong>Agency /Office</strong></td>
                        <td><strong><br></strong></td>
                        <td><strong>Date of Assumption</strong></td>
                    </tr>
                </tbody>
            </table>
            <br />

            <table class="bordered"
                style="border-collapse: collapse; width: 100%; height: 33px; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 9px;">
                <tbody>
                    <tr class="borders">
                        <td style="width:  4%;" rowspan="2">RSBSA NUMBER</td>
                        <td style="width:  4%;" rowspan="2">FULLNAME</td>
                        <td style="width:  2%;" rowspan="2">GENDER</td>
                        <td style="width:  2%;" rowspan="2">BIRTHDAY</td>
                        <td style="width:  2%;" rowspan="2">DATE ENCODED</td>
                        <td style="width:  2%;" rowspan="2">STATUS</td>
                    </tr>
                </tbody>
            </table>
        </header>
        <main>
            <table class="bordered"
                style="border-collapse: collapse; width: 100%; height: 33px; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 9px;">
                <tbody>



                        @foreach ($accomplishment as $value)
                            <tr>
                                <td style="width: 4%;">{{ $value->rsbsa_no }}</td>
                                <td style="width: 4%;">{{ $value->fullname }}</td>
                                <td style="width: 2%;">{{ $value->sex }}</td>
                                <td style="width: 2%;">{{ $value->birthday }}</td>
                                <td style="width: 2%;">{{ $value->date_encoded }}</td>
                                <td style="width: 2%;">{{ $value->upload_type }}</td>
                            </tr>
                        @endforeach

        

                </tbody>
            </table>
            <p><br></p><br>
            <p><br></p>
            <p><br></p>

            <style>
                .bordered tbody tr {
                    border: 1px solid black;
                }

                .borders td {
                    border: 1px solid black;
                }
            </style>

        </main>

        <style>
            @page {
                margin: 100px 25px 190px 25px;
            }
        
            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 250px;
                font-size: 20px !important;
        
                color: black;
                text-align: center;
        
            }
        
            main {
                position: relative;
                top: 124px;
            }
        </style>


    </body>

    </html>
