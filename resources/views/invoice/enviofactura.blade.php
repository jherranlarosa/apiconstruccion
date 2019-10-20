<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">
    <div>
        <div class="col-md-8">
            <p>Estimado gestor<p>
            <p>Se han enviado las siguientes facturas:</p>
            <table>
                <thead>
                    <tr>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Item</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Negocio</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Servicio</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Cliente</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Concepto</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">SubTotal</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">IGV</td>
                        <td  class="p-3" style="background-color:#0089C7;color:white;padding:20px;">Total</td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($dato->data as $key=>$invoice)
                    <tr>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $key + 1 }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->business }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->subbusiness }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->client }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->glosa }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->totalFormat }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->igvFormat }}
                        </td>
                        <td class="p-3" style="border-width:1px;border-style:solid;border-color:#F2F2F2;padding:20px;">
                            {{ $invoice->totalIgvFormat }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
         <div class="col-md-5">
            <img src="https://s3-us-west-2.amazonaws.com/bifrosttdp/image/medialogo.jpeg" alt="" class="img-responsive" style="width: 12.5%; height: 12.5%">
        </div>
    </div>
</div>
