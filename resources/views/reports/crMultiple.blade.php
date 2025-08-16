<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Custiodian Slip</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<style>
      @page {
            margin: 10 !important;
            padding: 1 !important;
        }
body{
    background-image: url("{{ public_path('storage/images/da_letter_head_rsbsa.png')}}");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

table, th, td {
  border: 1px solid gray;
  border-collapse: collapse;
  
}


</style>


<body>

<!--
<img src="{{ public_path('storage/images/cr_bg.png')}}"/>
<img src="{{ asset('storage/images/cr_bg.png') }}"/>
-->



            <div style="background-color:transparent; margin:180px 70px 20px 70px;text-align: left">
                <span style="font-size:16px; font-style:normal">{{$receivedate}}</span>
            </div>


            <div style="background-color:transparent; margin:20px 70px 20px 70px;text-align: center">
                <h2 style="font-size:18px; font-style:bold">C E R T I F I C A T I O N</h2>
            </div>

            @foreach ($inventory->groupBy('rsbsa_cr_no') as $rsbsa_cr_no)

                

            <div style="text-align: justify; background-color:transparent; margin:20px 70px 20px 70px; font-family: Cambria; font-size:17px;
                        text-align: justify; text-justify: inter-word">
                    <p style="text-indent:50px; text-align: justify;"> 
                        This is to certify that the individuals recorded in the table below are bona fide
                        registrants under the Department of Agriculture Registry System for Basic Sectors in
                        Agriculture (DA-RSBSA) <b><u>{{$rsbsa_cr_no[0]->ProvinceName}}, Region 8</u></b> with the
                        respective official Farmers and Fisherfolk Registration System (FFRS) system-generated RSBSA
                        numbers. 
                    </p>
            </div>


            <div style="text-align: justify; background-color:transparent; margin:20px 45px 20px 45px; font-family: Cambria; font-size:17px;
                        text-align: justify; text-justify: inter-word">


<table class="bordered" style="border-collapse:collapse; width: 100%; font-family:cambria; text-align:center">
    <tbody>
        <tr style="font-size:14px;">
            <td style="width:30%;padding: 10px;"><strong style="font-size: 12px;">System-generated RSBSA Number</strong></td>
            <td style="width:30%;padding: 10px;"><strong style="font-size: 12px;">Full Name</strong></td>
            <td style="width:20%;padding: 10px;"><strong style="font-size: 12px;">Barangay</strong></td>
            <td style="width:20%;padding: 10px;"><strong style="font-size: 12px;">Municipality</strong></td>
            <td style="width:10%;padding: 10px;"><strong style="font-size: 12px;">Livelihood/Category</strong></td>
        </tr>
        @foreach ($rsbsa_cr_no->groupBy('rsbsa_no') as $rsbsa_no)
        <tr style="font-size:14px;">
            <td style="width: 30%;">{{  $rsbsa_no[0]->rsbsa_no }}</td>
            <td style="width: 30%;">{{ $rsbsa_no[0]->fullname }}</td>
            <td style="width: 20%;">{{ $rsbsa_no[0]->MunCityName }}</td>
            <td style="width: 20%;">{{ $rsbsa_no[0]->MunCityName }}</td>
                

                 <td style="width: 10%;">
                 @foreach ($rsbsa_no->groupBy('livelihood') as $livelihood)   
                 {{ $livelihood[0]->livelihood }}<br/>
                 @endforeach
                </td>

                
        </tr>
        @endforeach

    </tbody>
</table>

</div>


<div style="text-align: justify; background-color:transparent; margin:20px 70px 20px 70px; font-family: Cambria; font-size:17px;
                        text-align: justify; text-justify: inter-word">


                    <p style="text-indent:50px;text-align: justify; text-justify: inter-word"> 
                        This certification is being issued upon the request of <b><u>{{ $rsbsa_cr_no[0]->requested_by }}</u></b>
                        for whatever legal purpose it may serve.
                    </p>

                    </br>


                    <p style="text-indent:50px;text-align: justify; text-justify: inter-word">
                        Given this <span>{{$receivedate}}</span> at the Department of Agriculture Regional Field Office 8
                    </p>
            </div>




            </div>

            <div style="float:right; background-color:transparent; margin:40px 70px 20px 70px; font-family: Cambria; text-align: center; width:260px">
                <p><span style="font-size:20px; font-style:bold"><b>{{ $rsbsa_cr_no[0]->assignatory }}</b></span><br/>
                <span style="font-size:18px; font-style:normal">{{ $rsbsa_cr_no[0]->designation }}</span></p>
            </div>

            @endforeach
           
</body>




</html>
