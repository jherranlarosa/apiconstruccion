
<div class="email-ontainer">

        <div class="head-email" style="padding: 20px; font-family: Roboto; width: 100%; display: flex; align-items: center; justify-content: center; background-color: #354B62;">
            
            <div class="logo" style=" float:left; width:40%; overflow:hidden; padding-left: 6%;"> 
                <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto 0px;" alt="">
            </div>
    
            <div class="head-email__info" style="float:left; width:60%; overflow:hidden; text-align: right; padding-right: 8%;">
                <h3 style="margin: 0px; color: white;">Nuevo ticket {{$dato->numticket}} </h3>
                <h3 style="margin: 0px; color: white;">Nombre de Operadora / {{$dato->cliente}}</h3>
            </div>
        </div>    
    
        <div class="body-email" style="font-family: Roboto; color: #7A7878; padding: 15px;">
    
                <h5 style="color: #444141; margin-bottom: 5px;">{{$dato->fecha}}</h5>
                <h3 style="color: #444141; margin: 0px;">Estimado cliente</h3>
                <br>
    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Se ha creado un nuevo ticket para usted en nuestros sistemas. Trabajaremos para resolver su problema lo más 
                    rápido posible. Un ingeniero del NOC en breve se estará comunicando con usted.</p>

    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Si desea proporcionar informacion adicional, contáctenos a través del número o correo electrónico que aparecen en la firma</p>

            <div class="data-email" style="padding: 10px; border-radius: 8px; border: 1px solid  #E8E8E8;">
                <ul>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Site ID:</p> {{$dato->siteid}}</li>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Cliente:</p> {{$dato->cliente}}</li>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Numero de ticket:</p> {{$dato->numticket}}</li>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Tipo de problema:</p> {{$dato->problema}}</li>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Descripcion:</p> {{$dato->descripcion}}</li>
                    <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Fecha Creacion:</p> {{$dato->fechaCreacion}}</li>
                </ul>
            </div>

            <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Cordialmente,</p>   
    
            <h3 style="color: #006476; margin-bottom: 5px;">NOC DISAT TELEFONICA</h3>
            <h4 style="color: #006476; margin: 0px;">Estación Terrena, Calle Estación Rastreo Satélite S/N </h4>
            <h4 style="color: #006476; margin: 0px;">Urb. Santa Genoveva (Alt. del KM 39.5 Antigua Panamericana Sur) Lurín, Lima - Perú </h4>
    
            <h4 style="color: #747474; margin-bottom: 5px;"> Toll Free </h4>
    
            <h4 style="color: #747474; margin: 0px;">Colombia: 18009171002 / Chile: 188800801015</h4>
            <h4 style="color: #747474; margin: 0px;">México: 18002832908 / Perú: 080055973</h4>
            <h4 style="color: #747474; margin: 0px;">Panamá: 8002035430 / Brasil: 8005914051</h4>
            <h4 style="color: #747474; margin: 0px;">Argentina: 8006660104</h4>
            <h4 style="color: #747474; margin: 0px;">nocmnla.fija.pe@telefonica.com</h4>
    
    
            </div>
                    <div class="footer" style="width: 100%; display: flex; height: 70px; align-items: center; justify-content: center; background-color: #354B62;">
                        <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto;" alt="">
                    </div>
    
        </div>
    