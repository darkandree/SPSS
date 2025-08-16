<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate of Appearance</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<style>
      @page {
            margin: 10 !important;
            padding: 1 !important;
        }
body{
    background: url("{{ public_path('storage/images/da_letter_head_rsbsa1.png')}}");
    background-repeat: no-repeat;
    background-size: 100%;
}




</style>


<body>

<!--
<img src="{{ public_path('storage/images/cr_bg.png')}}"/>
<img src="{{ asset('storage/images/cr_bg.png') }}"/>
-->




            @foreach ($ca->groupBy('rsbsa_ca_no') as $rsbsa_ca_no)


            <div style="text-align: justify; background-color:transparent; margin:230px 70px 20px 70px; font-family: Cambria; font-size:16px;
                        text-align: justify; text-justify: inter-word">
                    <p style="text-align: center;"><b>THIS IS TO CERTIFY</b> that MR./MS <b><u>{{ $rsbsa_ca_no[0]->name }}</u></b> of  <b><u>{{$rsbsa_ca_no[0]->office}}</u></b>
                    personally appeared at the <u>Department of Agriculture Regional Field Office VIII</u> on <u><span>{{$receivedate}}</span></u> for the <u>{{ $rsbsa_ca_no[0]->purpose }}</u>

                    </p>

                    <br>

                    <p style="text-align: center; text-justify: inter-word">Issued this <span style="text-decoration:none;font-style:bold">{{$dd}}<span style="vertical-align: super;text-decoration:none;">{{$ddsup}}</span></span> day of <span style="font-style:bold">{{$mmyy}}</span> </span> at <span style="text-decoration: none; font-style:bold">Department of Agriculture Regional Field Office VIII, Tacloban City.</span></p>
            </div>

            <br>
            <div style="background-color:transparent; margin:auto; font-family: Cambria; text-align: center; width:100%">
                <p><span style="font-size:17px; font-style:bold"><b>{{ $rsbsa_ca_no[0]->assignatory }}</b></span><br/>
                <span style="font-size:17px; font-style:italic">{{ $rsbsa_ca_no[0]->designation }}</span></p>
            </div>

            @endforeach
           
</body>

</html>
