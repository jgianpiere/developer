
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <style type="text/css">
                .fila:hover{
                    background: rgba(200, 2, 2, 0.2);
                }
            </style>
            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="inactive"><a href="#tab_02" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_02">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" id="form_agregarAFP" name="form_agregarAFP">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Registro de AFP</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
										
										<div class="form-group">
                                            <label class="control-label col-xs-2">RUC:</label>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" id="agre_ruc" name="agre_ruc" placeholder="RUC" required validate="ruc">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-2">AFP:</label>
                                            <div class="col-xs-9">
                                                <input type="text" class="form-control" id="agre_afp" name="agre_afp" placeholder="Nombre" required  validate="afp">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-2">Comision:</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="agre_comision" name="agre_comision" placeholder="Direccion" validate="alpha_numeric">
                                            </div>

                                            <label class="control-label col-xs-2">Seguro:</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="agre_seguro" name="agre_seguro" placeholder="Direccion" validate="alpha_numeric">
                                            </div>

                                            <label class="control-label col-xs-2">Aporte:</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="agre_aporte" name="agre_aporte" placeholder="Direccion" validate="float">
                                            </div>
                                        </div>

										<div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 text-right">Tipo: </label>
                                            <div class="radio col-lg-2 col-md-12">
                                                <label>
                                                    <input type="radio" checked="" name="tipo" id="tipo_1" value="1">
                                                    Mixto
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12">
                                                <label>
                                                    <input type="radio" name="tipo" id="tipo_2" value="0">
                                                    Flujo
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12">
                                                <label>
                                                    <input type="radio" name="tipo" id="incluye_impuesto_2" value="0">
                                                    ONP
                                                </label>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="form-group mtop-7">
                                <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                    <input type="reset" value="Limpiar" class="btn btn-reset">
                                    <input type="submit" value="Guardar" class="btn btn-send">
                                </div>
                            </div>

                            <div class="form-group mtop-7">&nbsp;</div>

                        </form>
                            <!-- Formulario -->
                    </div>
                </div>
          </div>

<script type="text/javascript">
	(function(){
		$('form#form_agregarAFP').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){
                
                $.ajax({
                    type    : 'POST',
                    data    : $form.serialize(),
                    url     : "<?=site_url('/Administracion/rrhh/Locales/Agregar');?>",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0][0] != 'ERROR' && $data[0][0] != '00'){
                                if($data[0][0] == 'OK'){
                                    // alert($data[0][2]);
                                    alert("el Local se guardo correctamente.");
                                }
                            }else{
                                alert($data[2]);
                            }
                        }catch(e){
                            console.log(data);
                        }
                        console.log(data);
                    },
                    error   : function(){

                    }
                });
                
            }
        });
        
    })('FormsAJAX',jQuery);
</script>