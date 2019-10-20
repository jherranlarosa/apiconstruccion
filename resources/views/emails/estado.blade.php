<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<div class="container">



    <div>

        <div class="col-md-8">
            <p>{{$cliente}}</p>
           
            <p>Liquidación Mes {{$mesTexto}}, Año {{$anio}}</p>
            <p>Estado : {{$estado}}</p>
            <p>URL = http://34.218.188.217/invoice/indexstatus/{{ $statusVideoId }}</p>

            <br>

            <p>{{$comentario}}</p>

            <br>

        </div>

    </div>

    <div class="row">

        <div class="col-md-5">
            <img src="https://s3-us-west-2.amazonaws.com/bifrosttdp/image/medialogo.jpeg" alt="" class="img-responsive" style="width: 12.5%; height: 12.5%">
        </div>

    </div>

</div>