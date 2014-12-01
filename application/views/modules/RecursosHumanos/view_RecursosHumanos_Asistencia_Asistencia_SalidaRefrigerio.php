<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Asitencia Entrada</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<style type="text/css">
    body{
        margin: 0px;
        padding: 0px;
        height: 100%;
        display: block;
        background: url('/statics/IMG/img/despertador.png') no-repeat right center, #d02e10;
    }

    *{max-width: 100%; max-height: 100%;}
    div,input,label,h1,h2,h3,.content,.row,section{max-width: 100%; max-height: 100%;}

    .wrap{
        margin: 5% auto;
        width: 500px;
    }

    h1{
        color: white;
        font-size: 15px;
    }

    h2{
        background: rgba(250,250,250,.4);
        width: 200px;
        padding: 15px;
        color: white;
        font-weight: bold;
        margin: 0 auto;
        position: relative;
        font-size: 34px;
        text-align: center;
        margin:10px;
        border-radius: 10px;
        margin-bottom: 20px; 
    }
    
    input[type="text"]{
        background: rgba(250,250,250,.35);
        font-size: 20px;
        width: 98%;
        padding: 8px;
        border-radius: 3px;
        color: white;
        border: none;
    }

    input[readonly]{
        background: rgba(250,250,250,.3);
        color: white;
        border: none;
        cursor: none;
    }

    label{
        color: white;
        font-size: 13px;
        margin: 0px 0px 2px 0px;
        display: block;
    }

    .group-input{
        margin-top: 7px;
        margin-bottom: 4px;
    }

    .text-right{
        text-align: right;
    }
</style>
<body>
    <div class="wrap">
        <section>
            <header>
                <h1>FIN DEL REFRIGERIO</h1>
                <div align="center">
                    <h2 class="date"><?=date('H:i:s');?></h2>
                </div>
                <form action="" method="POST" name="" id="">
                    <label for="">DNI : </label>
                    <input type="text" maxlength="8" validate="number" id="dni" name="dni" placeholder="Ingrese un numero de DNI">
                </form>
            </header>
            <div class="content">
                <div class="row">
                    <div class="group-input">
                        <label for="">NOMBRE : </label>
                        <input type="text" value="" id="nombre" name="nombre" readonly />
                    </div>
                    <div class="group-input">
                        <label for="">HORA : </label>
                        <input type="text" value="" id="hora" name="hora" readonly class="text-right" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<script type="text/javascript">
    var SumateDate = {horas:null,minutos:null,segundos:null};
    var unix_pc;

    function _sumarTiempo($date){
        var UnSegundo = 1; // segundos
        if($date.segundos >= 59){$date.segundos = 0; $date.minutos +=1;}else{$date.segundos+=UnSegundo;}
        if($date.minutos  >= 60){$date.minutos = 0; $date.horas +=1;}
        if($date.horas==24){$date.horas=0;}

        return $date;
    }

    (function(){
        var unix_server = "<?=time();?>";      
            unix_pc     = Math.round((new Date()).getTime() / 1000);

        var $date = {
            server : new Date(unix_server * 1000),
            equipo : new Date(unix_pc * 1000)
        };

        hours   = String($date.server.getHours());
        minutes = String($date.server.getMinutes());
        seconds = String($date.server.getSeconds());

        SumateDate = $.extend({},{horas:parseInt(hours),minutos:parseInt(minutes.substr(minutes.length-2)),segundos:parseInt(seconds.substr(seconds.length-2))});
        $newTime = _sumarTiempo(SumateDate);

        var MostrarFecha = setInterval(function(){
            $newTime = _sumarTiempo($newTime);
            $FormatT = [("00"+$newTime.horas).slice(-2),("00"+$newTime.minutos).slice(-2),("00"+$newTime.segundos).slice(-2)];
            // var TimeComplete = hours+':'+minutes.substr(minutes.length-2)+':'+seconds.substr(seconds.length-2);
            $('.date').html($FormatT.join(':'));
        },1000);

        // formulario.

        $('form').on('submit',function(e){ $$ = this; $this = $(this);
            e.preventDefault();
            var fechafrezze = String($('.date').text());
            if(1==1){
                $.ajax({
                    type    : 'POST',
                    data    : $this.serialize()+'&unixpc='+unix_pc,
                    url     : $this.attr('action'),
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]=='ERROR'||$data[0]=='00'){
                                console.warn('codigo de error: '+$data[1]);
                                alert($data[2]+"\n INGRESE SU DNI NUEVAMENTE.");
                                $('#dni').val('');
                            }else{
                                $('#nombre').val($data[0]);
                                $('#hora').val(fechafrezze);
                                
                                alert($data[0]+", \n hora de marcacion: "+fechafrezze+"\n MARCACION CORRECTA!\n"+$data[2]);

                                // se refrescara el navegador para coger nuevamente la fecha del servidor,
                                // recomendacion aprobada.

                                window.location.reload();

                                $('#dni').fadeIn(800).delay(100).fadeIn(800,function(){
                                    $('#nombre').val('');
                                    $('#hora').val('');
                                    $('#dni').val('');
                                });
                                

                            }
                        }catch(e){
                            console.warn('ERROR'+e);
                        }
                    },
                    error   : function(){

                    },
                    complete: function(){

                    }
                });
            }
        });
    })(jQuery);


</script>
