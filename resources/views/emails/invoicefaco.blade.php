<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">

    <div>

        <div class="col-md-8">
            <p>Estimado gestor de facturación<p>
            <p>Ha sido remitida la liquidación a su bandeja de facturación, por favor emitir las facturas/boletas correspondientes:</p>

            <p> Cliente: {{$clientLegalName}}</p>
            <p> Servicio: {{$servicio}}</p>
            <p> Glosa: {{$glosa}}</p>
            <p> Subtotal: {{$subtotalFormat}}</p>

            <p> Saludos. </p>

        </div>

    </div>

    <div class="row">

         <div class="col-md-5">
            <img src="https://s3-us-west-2.amazonaws.com/bifrosttdp/image/medialogo.jpeg" alt="" class="img-responsive" style="width: 12.5%; height: 12.5%">
        </div>

    </div>

</div>