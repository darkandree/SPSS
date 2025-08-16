<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DECLARATION OF INTENT TO
    UPDATE RSBSA REGISTRATION</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<style>
      @page {
            margin: 10 !important;
            padding: 1 !important;
        }
body{
    background:url("{{ public_path('storage/images/da8_letterhead.png')}}");
    background-repeat: no-repeat;
    height: 500px;
    background-size: contain;
}



table, th, td {
   /* border: 1px solid;
  border-collapse: collapse; */
  text-align : center;
}


</style>


<body>
            <div style="background-color:transparent; margin:50px 52px 45px 52px;text-align: center">
                <table width="100%">
                    <td width="20%"></td>
                    <td width="60%"></td>
                    <td width="20%" style="font-style:bold">ANNEX A</td>
                </table>
            </div>


            <div style="background-color:transparent; margin:0px 70px 0px 70px; text-align: center">
                <h2 style="font-size:17px; font-style:bold"><span>DECLARATION OF INTENT TO</span><br>
                    UPDATE RSBSA REGISTRATION</h2>
            </div>

            @foreach ($ca->groupBy('rsbsa_ucr_no') as $rsbsa_ucr_no)



            <div style="text-align: justify; background-color:transparent; margin:30px 52px 50px 52px; font-family: Cambria; font-size:16px;
                        text-align: justify; text-justify: inter-word">

                        <!-- <table style="border: solid black 1px; width:100%;border-collapse: collapse;" > -->
                        <table style="width:100%; margin: 0px 0px 25px 0px" >
                            <tr >
                                <td style="text-align:left" >I, </td>
                                <td style="font-style:bold; border-bottom: 1px solid black" width="25%">{{ $rsbsa_ucr_no[0]->first_name}}</td>
                                <td style="font-style:bold; border-bottom: 1px solid black" width="25%">{{ $rsbsa_ucr_no[0]->middle_name }}</td>
                                <td style="font-style:bold; border-bottom: 1px solid black" width="25%">{{ $rsbsa_ucr_no[0]->last_name }}</td>
                                <td style="font-style:bold; border-bottom: 1px solid black" width="20%">{{ $rsbsa_ucr_no[0]->ext_name }}</td>
                            </tr>

                            <tr style="font-style:italic; font-size:12px;">
                                <td width="5%"></td>
                                <td width="25%">(First Name)</td>
                                <td width="25%">(Middle Name)</td>
                                <td width="25%">(Last Name)</td>
                                <td width="20%">(Ext Name)</td>
                            </tr>

                        </table>


                        <table style="width:100%; margin: 0px 0px 25px 0px" >
                            <tr>
                                <td style="text-align:left">Filipino, of legal age, resident of </td>
                                <td style="font-style:bold; border-bottom: 1px solid black; text-align:center" width="67%">{{ $rsbsa_ucr_no[0]->purok}},  {{ $rsbsa_ucr_no[0]->barangay}},  {{ $rsbsa_ucr_no[0]->municipality}},  {{ $rsbsa_ucr_no[0]->province}}</td>
                             </tr>

                             <tr>
                                <td style="text-align:left"></td>
                                <td style="font-style:bold;  text-align:center; font-style:italic; font-size:12px" width="67%">(Complete Address: Purok, Barangay, City/Municipality, Province)</td>
                             </tr>
                        </table>


                        <table style="width:100%; margin: 0px 0px 10px 0px" >
                            <tr >
                                <td style="text-align:left; width:60%">and RSBSA-registered farmer with RSBSA No.</td>
                                <td style="font-style:bold; border-bottom: 1px solid black; text-align:center" width="40%">{{ $rsbsa_ucr_no[0]->rsbsa_no}}</td>
                             </tr>

                             <tr>
                                <td style="text-align:left">hereby stat that:</td>
                                <td style="font-style:bold;  text-align:center; font-style:italic; font-size:12px" width="67%"></td>
                             </tr>
                        </table>

                        <table style="width:100%; margin: 0px 0px 5px 0px ">

                            <tr style="margin: 0px 0px 10px 0px">
                                <td width="5%" style="text-align:left"></td>
                                <td width="20%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->rfirst_name}}</td>
                                <td width="20%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->rmiddle_name }}</td>
                                <td width="20%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->rlast_name }}</td>
                                <td width="8%">is my</td>
                                <td width="20%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->rrelationship}}</td>    
                                <td width="10%">and</td>                       
                            </tr>

                        <tr style="font-style:italic; font-size:12px;">
                                <td width="5%"></td>
                                <td width="20%">(First Name)</td>
                                <td width="20%">(Middle Name)</td>
                                <td width="20%">(Last Name)</td>
                                <td width="5%"></td>
                                <td width="20%">(Relationship)</td>
                                <td width="10%"></td>
                            </tr>
                        </table>


                        <table style="width:100%;margin: 0px 0px 25px 0px">
                            <tr style="text-align:left">
                                <td width="5%"> </td>
                                <td width="95%" style="text-align:left;line-height: 35px;">I am tilling the same farm parcel as with that of the person above-stated and made the same declaration in my RSBSA registration.</td>                       
                            </tr>
                        </table>

                    <p>
                        In relation to this, and to reflect the truthfulness of my farming activity, I am updating my
                    </p><bn>
                    <p>   
                        RSBSA registration by : <i>(choose only one)</i>
                    </p> 
                    



                    @if($rsbsa_ucr_no[0]->rregistration_cat_id == 1)
                
                    <table style="width:100%; margin: 0px 0px 5px 0px; ">
                        <tr>
                            <td width="5%"><input type="checkbox" name="" value="" checked></td>                               
                            <td width="95%" style="text-align:left; font-style:normal; border-bottom: 0px solid black">Updating my Livelihood from FARMER TO FARMWORKER (RSBSA Updating Slip B)</td>
                        </tr>
                    </table>

                    <table style="width:100%; margin: 0px 0px 20px 0px ">
                        <tr>
                            <td width="5%"><input type="checkbox" name="" value=""></td>                               
                            <td width="95%" style="text-align:left; font-style:normal; border-bottom: 0px solid black">Deactivating my RSBSA record (RSBSA Updating Slip A)</td>
                        </tr>
                    </table>

                    @endif

                    @if($rsbsa_ucr_no[0]->rregistration_cat_id == 2)
                
                    <table style="width:100%; margin: 0px 0px 5px 0px; ">
                        <tr>
                            <td width="5%"><input type="checkbox" name="" value="" ></td>                               
                            <td width="95%" style="text-align:left; font-style:normal; border-bottom: 0px solid black">Updating my Livelihood from FARMER TO FARMWORKER (RSBSA Updating Slip B)</td>
                        </tr>
                    </table>

                    <table style="width:100%; margin: 0px 0px 20px 0px ">
                        <tr>
                            <td width="5%"><input type="checkbox" name="" value="" checked></td>                               
                            <td width="95%" style="text-align:left; font-style:normal; border-bottom: 0px solid black">Deactivating my RSBSA record (RSBSA Updating Slip A)</td>
                        </tr>
                    </table>

                    @endif


                    


                

                    <p style="text-align: left; text-justify: inter-word"> 
                        I am attaching this Declaration with my fully accomplished RSBSA Updating Slip.
                    </p>
<!-- 
                    <p style="text-align: left; text-justify: inter-word"> 
                    In witness hereof, I hereby set my hand this <b><span>{{$dd}}<sup>{{$ddsup}}</sup></span></b> day of <b><span>{{$mmyy}}</span></b>.
                    </p> -->

                    <table style="width:100%;text-align:left; margin: 0px 0px 30px 0px">
                         <tr style="font-style:normal;text-align:left">
                            <td width="45%" style="font-style:normal;text-align:left">In witness hereof, I hereby set my hand this</td>
                            <td width="5%" style="font-style:bold; border-bottom: 1px solid black">{{$dd}}<sup>{{$ddsup}}</sup></td>
                            <td width="10%">day of</td>
                            <td width="20%" style="font-style:bold; border-bottom: 1px solid black;text-align:center">{{$mmyy}}.</td>
                            <td width="20%"></td>
                        </tr>
                    </table>
                    
                    <table style="width:100%; margin: 0px 0px 0px 0px ">
                        <tr>
                            <td width="50%"></td>                               
                            <td width="50%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->first_name }} {{ $rsbsa_ucr_no[0]->middle_name }} {{ $rsbsa_ucr_no[0]->last_name }}</td>
                        </tr>

                        <tr>
                            <td width="60%"></td>                               
                            <td width="40%" style="font-style:normal">RSBSA Registrant</td>
                        </tr>
                    </table>

                    <span style="font-style:normal">Verified by:</span>
                    <br/>
                    <br/>
                    <br/>



                    <table style="width:100%; margin: 0px 0px 25px 0px ">
                        <tr>
                            <td width="45%" style="font-style:bold; border-bottom: 1px solid black">{{ $rsbsa_ucr_no[0]->EncodedBy }}</td>                               
                            <td width="55%" style="font-style:bold"></td>                        
                        </tr>

                        <tr>
                            <td width="45%" style="font-style:normal;">RSBSA Regional PMO Staff</td>                               
                            <td width="55%"></td>
                        </tr>
                    </table>

                    <table style="width:100%; margin: 0px 0px 20px 0px ">
                        <tr>
                            <td width="5%" style="text-align:left">Date:</td>
                            <td width="40%" style="font-style:bold; border-bottom: 1px solid black">{{$mm}}/{{$dd}}/{{$yyyy}}</td>                               
                            <td width="55%" style="font-style:bold"></td>                        
                        </tr>

                        <tr>
                            <td width="5%" style="text-align:left"></td>
                            <td width="40%" style="font-style:normal;">(mm/dd/yyyy)</td>                               
                            <td width="55%"></td>
                        </tr>
                    </table>

            </div>



            @endforeach
           
</body>

</html>
