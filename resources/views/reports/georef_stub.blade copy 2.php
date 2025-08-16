<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Georeferencing Stub</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<style>
      @page {
            margin: 10 !important;
            padding: 1 !important;
        }
body{
    /* background: url("{{ public_path('storage/images/da_letter_head_rsbsa1.png')}}");
    background-repeat: no-repeat;
    background-size: 100%; */
}




/* .box{
  width: 5rem;
  background: yellow;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
 */



 .flex {
      display: -ms-flexbox;     /* TWEENER - IE 10 */
      display: inline-flex; 
      max-width: 1200px; 
      -ms-flex-pack: distribute;
      justify-content: space-around;
      margin: 40px auto;
      
  }





</style>


<body>

<!--
<img src="{{ public_path('storage/images/cr_bg.png')}}"/>
<img src="{{ asset('storage/images/cr_bg.png') }}"/>
-->

<div style="display:flex;flex-wrap">
    <div class="div_first">1</div>
    <div class="div_second">2</div>
    <div class="div_third">3</div>
</div>

<div class="flex">
@foreach ($gs->groupBy('rsbsa_no') as $rsbsa_ca_no)

<div style="width:450px; height:340px; background-color:pink; margin:10px 10px 10px 10px; text-align: justify; font-family: Cambria; font-size:16px;
                        text-align: justify; text-justify: inter-word">
                    <p style="text-align: center;"><b>THIS IS TO CERTIFY</b> that MR./MS <b><u>{{ $rsbsa_ca_no[0]->name }}</u></b> of  <b><u>{{$rsbsa_ca_no[0]->office}}</u></b>
                    personally appeared at the <u>Department of Agriculture Regional Field Office VIII</u> on <u><span>{{$receivedate}}</span></u> for the <u>{{ $rsbsa_ca_no[0]->purpose }}</u>

                    </p>

                    <br>

    </div>
     
@endforeach


</div>


            
           
</body>

</html>
