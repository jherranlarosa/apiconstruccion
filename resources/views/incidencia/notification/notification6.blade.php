
<div class="email-ontainer">

        <div class="head-email" style="padding: 20px; font-family: Roboto; width: 100%; display: flex; align-items: center; justify-content: center; background-color: #354B62;">
            
            <div class="logo" style=" float:left; width:40%; overflow:hidden; padding-left: 6%;"> 
                <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto 0px;" alt="">
            </div>
    
            <div class="head-email__info" style="float:left; width:60%; overflow:hidden; text-align: right; padding-right: 8%;">
                <h3 style="margin: 0px; color: white;">Cambio de Estado</h3>
                <h3 style="margin: 0px; color: white;">Ticket {{$dato->numticket}}</h3>
            </div>
        </div>    
    
        <div class="body-email" style="font-family: Roboto; color: #7A7878; padding: 15px;">
    
                <h5 style="color: #444141; margin-bottom: 5px;">{{$dato->fecha}}</h5>
                <h3 style="color: #444141; margin: 0px;">Estimado cliente,</h3>
                <br>
    
    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Tenga en cuenta que el ticket ha cambiado de estado a PENDIENTE por cliente.</p>
    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Quedamos atentos a la informacion solicitada para continuar brindandole soporte al problema reportado.</p>

                    <br>
        
                    <div class="data-email" style="padding: 10px; border-radius: 8px; border: 1px solid  #E8E8E8;">
                            <ul>
                                <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Site ID:</p> {{$dato->siteid}}</li>
                                <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Tipo de problema:</p> {{$dato->problema}}</li>
                                <li style="font-size: 13px;"><p style="font-weight: bold; color: #444141; margin: 0px; display: inline;">Descripcion:</p> {{$dato->descripcion}}</li>
                            </ul>
                        </div>


            <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Cordialmente,</p>   
    
            <h3 style="color: #006476; margin-bottom: 5px;">BIFROST</h3>
                <br>
    
    
            </div>
                    <div class="footer" style="width: 100%; display: flex; height: 70px; align-items: center; justify-content: center; background-color: #354B62;">
                        <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto;" alt="">
                    </div>
    
        </div>
    