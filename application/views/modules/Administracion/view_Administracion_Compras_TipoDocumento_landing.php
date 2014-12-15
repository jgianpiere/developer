
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
                        <form class="form-horizontal" id="form_agreArea" name="form_agreArea">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Registro Tipo de Documento</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
										
										<div class="form-group">
                                            <label class="control-label col-xs-3">Codigo:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_codigo" name="agre_codigo" placeholder="Codigo" required validate="codigo">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Descripcion:</label>
                                            <div class="col-xs-9">
                                                <input type="text" class="form-control" id="agre_descripcion" name="agre_descripcion" placeholder="descripcion" required  validate="descripcion">
                                            </div>
                                        </div>
	
										<div class="form-group">
                                            <label class="control-label col-xs-3">N<s>°</s> Digitos:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_longitud" name="agre_longitud" placeholder="" required  validate="number">
                                            </div>

                                            <label class="control-label col-xs-3">Formato:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_formato" name="agre_formato" placeholder="formato" required  validate="formato">
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
		$('form#form_agreArea').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){
                
                $.ajax({
                    type    : 'POST',
                    data    : $form.serialize(),
                    url     : "<?=site_url('/Administracion/rrhh/TipoDocumento/Agregar');?>",
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

    (function(){
    	$('#agre_longitud')
    	.on('keyup',function(){ $$ = this; $this = $(this); $cant = $this.val().length;
    		$('#agre_formato').attr('maxlength',$cant);
    	})
    	.on('focusout',function(){ $$ = this; $this = $(this);
    		$('#agre_formato').val('');
    	})
    	;
    })(jQuery);
</script>