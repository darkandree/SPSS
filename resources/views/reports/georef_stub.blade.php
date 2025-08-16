<!DOCTYPE html>
<html>
<head>
    <title>Georeferencing Stub</title>
    <style>
            .container {
                display: flex;
                flex-wrap: wrap;
          
                /* background-color:pink; */

                padding-bottom:10px;

            }
             .item {
                
                background-image: url("{{ public_path('storage/images/GeoStub.png')}}");


                background-size: cover;
                background-repeat:no-repeat;
              
               background-position: center;


               /*width: 100%; height: 500px;*/


               width: 100%; height: 495px;

               padding-top: 3px;
               padding-bottom: 3px;


            }

            .imgTest{

                width: 100%;
  /*height: 300px;*/
  object-fit: contain;
            }

            .rsbsaNo tr{
                letter-spacing: 10px;
                font-size: 17px;
                text-align: left;
                color: green;
                font-family: "Lucida Console", "Courier New", monospace;
                font-weight: bold;
                /* background-color: orange */
            }

            td{
                /* padding-top: 3px;
                padding-bottom: 3px; */
            }


            .bordered td{
                border: solid 1px transparent;
                font-family: "Lucida Console", "Courier New", monospace;
                font-size:12px;
                font-weight: bold;
                height:22px;
                /* background-color:pink; */
                /* padding-top:6px;
                padding-bottom:6px; */
                text-align: center;
                overflow:hidden;
            }

            .pInfo{
                /* background-color: yellow; */
                text-align: center;
                font-size:15px;
            }

            .profDesc td{
                /* border: solid 1px black; */
                color: green;
                font-family: "Lucida Console", "Courier New", monospace;
                font-weight: bold;
                font-size: 15px;
                padding-bottom: 3px
            }


            .certifiedBy tr{
                font-size: 12px;
                text-align: left;
                color: black;
                font-family: "Lucida Console", "Courier New", monospace;
                font-weight: bold;
                /* background-color: orange  */
            }
        


    </style>
</head>
<body>


@foreach ($gs->groupBy('rsbsa_no') as $rsbsa_no_geo_stub)



<!-- <img class="imgTest" src="{{ public_path('storage/images/GeoStub.png')}}"/>      -->
<div class="container">

    <div class="item">

        <table class="rsbsaNo" style="width: 100%; padding-top:76px">
            <tr>
                <td style="width:38%"></td> 
                <td style="width:62%; padding-left:2px">{{ $rsbsa_no_geo_stub[0]->rsbsa_no }}</td> 
            </tr>

        </table>

        <table class="profDesc" style="width: 100%; padding-top:6px">

            <tr style="font-size:12px;text-align:center">
            <td style="width:14%"></td>
            <td style="width:22%">{{  $rsbsa_no_geo_stub[0]->first_name }}</td>
            <td style="width:22%">{{  $rsbsa_no_geo_stub[0]->middle_name }}</td>
            <td style="width:22%">{{  $rsbsa_no_geo_stub[0]->last_name }}</td>
            <td style="width:17%">{{  $rsbsa_no_geo_stub[0]->ext_name }}</td> 
        </tr>

        </table>

    <table class="bordered" style=" border-collapse:collapse; width: 100%; height:150px; padding-top:75px;">
    


        @foreach ($rsbsa_no_geo_stub->groupBy('id') as $rsbsa_no_geo_stub_details)
        <tr>
            {{ $rsbsa_no_geo_stub_details[0]->declared_area }}
            <td style="width: 3%;">&nbsp;</td>
            <!-- <td style="width: 13%;">{{  $rsbsa_no_geo_stub_details[0]->month }}&nbsp;{{  $rsbsa_no_geo_stub_details[0]->year }}</td> -->
            <td style="width: 13%;">{{  $rsbsa_no_geo_stub_details[0]->dt_uploaded}}</td>
            <td style="width: 25%;">
                {{ $rsbsa_no_geo_stub_details[0]->barangay }},
                {{ $rsbsa_no_geo_stub_details[0]->municipality }},
                {{ $rsbsa_no_geo_stub_details[0]->province }}

                @if ($rsbsa_no_geo_stub_details[0]->commodity  === 'Rice/Palay')
                <span style="
                    color:green;
                    font-size:9px;
                    ">
                    {{ $rsbsa_no_geo_stub_details[0]->commodity }}
                </span>

                @elseif ($rsbsa_no_geo_stub_details[0]->commodity  === 'Corn')
                <span style="
                    color:orange;
                    font-size:9px;    
                    ">
                    {{ $rsbsa_no_geo_stub_details[0]->commodity }}
                </span>
                @else
                <span style="
                    color:indigo;
                    font-size:9px;    
                    ">
                    {{ $rsbsa_no_geo_stub_details[0]->commodity }}
                </span>


                @endif
                

            </td>
            <td style="width: 10%;">{{ $rsbsa_no_geo_stub_details[0]->declared_area }}</td>
            <td style="width: 10%;">{{ $rsbsa_no_geo_stub_details[0]->verified_area }}</td>
            <td style="width: 10%;"></td>
            <td style="width: 3%;">&nbsp;</td>
                  
        </tr>
        @endforeach

</table>


<table class="certifiedBy" style="width: 100%; padding-top:73px">
            <tr>
                <td style="width:65%"></td> 
                <td style="width:35%; padding-left:1px">{{ $rsbsa_no_geo_stub[0]->uploader }}</td> 
            </tr>
            <tr>
                <td style="width:65%"></td> 
                <!-- <td style="width:35%; padding-left:1px">{{ $rsbsa_no_geo_stub[0]->month }}&nbsp;{{ $rsbsa_no_geo_stub[0]->year }}</td>  -->
                <td style="width:35%; padding-left:1px">{{ $rsbsa_no_geo_stub[0]->dt_uploaded }}</td> 

            </tr>

        </table>


        </div>
</div>
@endforeach




</body>
</html>
