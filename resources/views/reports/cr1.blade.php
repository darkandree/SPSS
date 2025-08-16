<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSBSA Certification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<style>
      @page {
            margin: 10 !important;
            padding: 1 !important;
        }
body{
    background: contain no-repeat url("{{ public_path('storage/images/da_letter_head_rsbsa.png')}}");

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
                    <p style="text-indent:50px; text-align: justify;"> This is to certify that <b><u>{{ $rsbsa_cr_no[0]->fullname }}</u></b> a resident of <b><u>{{$rsbsa_cr_no[0]->barangay}}, {{$rsbsa_cr_no[0]->municipality}}, {{$rsbsa_cr_no[0]->province}}</u></b>
                        is bona fide registered

                        <u>
                        @foreach ($rsbsa_cr_no->groupBy('livelihood') as $livelihood)
                        
                        <span>
                            {{ $livelihood[0]->livelihood }}
                        </span>
                        
                        @endforeach
                        </u>
                        
                        in the Registry System for Basic Sectors in Agriculture
                        (RSBSA) with official system-generated 
                        RSBSA reference number <u><b>{{ $rsbsa_cr_no[0]->rsbsa_no }}</b></u>.
                    </p>

                    <p style="text-indent:50px;text-align: justify; text-justify: inter-word"> This certification is being issued upon the request of <b><u>{{ $rsbsa_cr_no[0]->fullname }}</u></b>
                        for whatever legal purpose it may serve.
                    </p>

                    <p style="text-indent:50px;text-align: justify; text-justify: inter-word"> Given this <span>{{$receivedate}}</span> at the Department of Agriculture Regional Field Office 8, Tacloban City</p>
            </div>


            <div style="float:right; background-color:transparent; margin:40px 70px 20px 70px; font-family: Cambria; text-align: center; width:300px">
                <p><span style="font-size:20px; font-style:bold"><b>{{ $rsbsa_cr_no[0]->assignatory }}</b></span><br/>
                <span style="font-size:18px; font-style:normal">{{ $rsbsa_cr_no[0]->designation }}</span></p>
            </div>

            @endforeach
           
</body>

</html>
