<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<div class="container">

    <div class="row">
        
        <div class="col-md-7">
                <h1>{{ $cliente }} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Estimado (a) xxx
            <p>Le enviamos la liquidación de DTH, correspondiente al periodo: {{$mes}} / {{$anio}}</p>
            <br>
            <p>Por favor acceder al link y validar la liquidación, de no recibir comentarios durante los próximos tres días hábiles, de recibido este correo, procederemos a facturar.</p>
            <br>
            <p>URL = http://34.218.188.217/invoice/indexstatus/{{ $statusVideoId }}</p>
            <br>
            <p>Quedamos atentos a sus comentarios.</p>
            <p>Saludos.</p>
            
        </div>
    </div>
    <div class="row">

        <div class="col-md-5">
            <img src="https://s3-us-west-2.amazonaws.com/bifrosttdp/image/medialogo.jpeg" alt="" class="img-responsive" style="width: 12.5%; height: 12.5%">
        </div>
    </div>

</div>

