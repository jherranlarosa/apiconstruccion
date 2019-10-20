
<div class="email-ontainer">

        <div class="head-email" style="padding: 20px; font-family: Roboto; width: 100%; display: flex; align-items: center; justify-content: center; background-color: #354B62;">
            
            <div class="logo" style=" float:left; width:40%; overflow:hidden; padding-left: 6%;"> 
                <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto 0px;" alt="">
            </div>
    
            <div class="head-email__info" style="float:left; width:60%; overflow:hidden; text-align: right; padding-right: 8%;">
                <h3 style="margin: 0px; color: white;">Revisión de ticket</h3>
                <h3 style="margin: 0px; color: white;">{{$dato->numticket}}</h3>
            </div>
        </div>    
    
        <div class="body-email" style="font-family: Roboto; color: #7A7878; padding: 15px;">
    
                <h5 style="color: #444141; margin-bottom: 5px;">Jueves 17 de enero de 2019</h5>
                <h3 style="color: #444141; margin: 0px;">NOC TIWS</h3>
                <br>
    
    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Ha transcurrido 02 Horas sin actualizacion de la averia masiva TT {{$dato->numticket}}</p>
    
                <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Ingrese a Bifrost y actualize sobre el problema reportado en el TT {{$dato->numticket}}</p>

                    <br>
        
            <p style="line-height: 1.5rem; margin-bottom: 15px; font-size: 14px;">Cordialmente,</p>   
    
            <h3 style="color: #006476; margin-bottom: 5px;">BIFROST</h3>
                <br>
    
    
            </div>
                    <div class="footer" style="width: 100%; display: flex; height: 70px; align-items: center; justify-content: center; background-color: #354B62;">
                        <img src="https://www.telefonica.com/image/company_logo?img_id=4585436&t=1547207049557" style="width: 130px; margin: auto;" alt="">
                    </div>
    
        </div>
    