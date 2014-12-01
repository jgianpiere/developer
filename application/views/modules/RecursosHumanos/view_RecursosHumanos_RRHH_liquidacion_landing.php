        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Buscar</a></li>
                <li class="inactive"><a href="#tab_02" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
            </ul>
            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">

                <div class="tab-pane fade active in" id="tab_01">
                    
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Buscar Liquidación</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;" id="form_buscar_liquidaciones" name="form_buscar_liquidaciones">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Periodo :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="buscar_liquidaciones_DNI" name="buscar_liquidaciones_DNI" maxlength="8" placeholder="EJM: 46780390">
                                            </div>

                                            <a id="buscarliquidaciones" name="buscarliquidaciones" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>

                <div class="tab-pane fade" id="tab_02">
                        
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Agregar Liquidación</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form action="<?=site_url('RecursosHumanos/Liquidacion/BuscarLiquidacionDatosTruncos');?>" method="POST"  class="form-horizontal"  id="form_buscarxdni" name="form_buscarxdni">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input primarysl type="date" class="form-control" id="liquidaciones_fecha" name="liquidaciones_fecha" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="liquidaciones_agreg_DNI" maxlength="8" name="liquidaciones_agreg_DNI" placeholder="" required>
                                            </div>

                                            <a id="buscar_truncas" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>
                                    </form>
                                    
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;" id="form_agregar_liquidaciones" name="form_agregar_liquidaciones">
                                        <input type="hidden" id="id" name="id" value="" required>
                                        <input type="hidden" data-fecha id="liquidaciones_fecha_f" name="liquidaciones_fecha_f" required>
                                        <input type="hidden" data-dni id="liquidaciones_agreg_DNI_f" name="liquidaciones_agreg_DNI_f" required>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Nombre :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input data-name type="text" class="form-control" placeholder="" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Vac. Truncas :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input data-vacaciones type="text" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">CTS Truncas :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input data-cts type="text" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Grati. Trunca :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input data-grati type="text" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Suma Adicional :</label>
                                            <div class="col-lg-5 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="liquidaciones_agreg_adicional" name="liquidaciones_agreg_adicional" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group mtop-7">
                                            <div class="col-lg-offset-3 col-lg-9 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" value="Limpiar" class="btn btn-reset">
                                                <input type="submit" value="Guardar" class="btn btn-send">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>
          </div>

<script type="text/javascript">
    (function(){

        // Loquidacion buscar datos truncos.
        $('#buscar_truncas').on('click',function(){
            $('form#form_buscarxdni').submit();
        });

        // Seleccion de Fecha Reset Primary fech.
        $('[primarysl]').on('change',function(){ $$ = this; $this = $(this);
            $fecha = $this.data('fecha');
            if($fecha != $this.val()){
                $this.data('fecha',$this.val());
                $('#id,[data-dni],[data-fecha],[data-name],[data-vacaciones],[data-cts],[data-grati]').val('');
            }
        });

        // Buscar truncas por dni
        $('form#form_buscarxdni').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : $form.attr('method'),
                    data        : $form.serialize(),
                    url         : $form.attr('action'),
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0] != 'ERROR' && $data[0] != '00'){
                                // llenamos los datos en el formulario.
                                if($data[0] == 'OK' && $data[1][1] != undefined){
                                    $('#id').val($data[1][0]);
                                    $('[data-name]')        .val($data[1][1]);
                                    $('[data-vacaciones]')  .val($data[1][2]);
                                    $('[data-cts]')         .val($data[1][3]);
                                    $('[data-grati]')       .val($data[1][4]);
                                    $('[data-dni]')         .val($('#liquidaciones_agreg_DNI').val());
                                    $('[data-fecha]')       .val($('#liquidaciones_fecha').val());
                                }else{
                                    alert($data[1]);
                                }
                            }else{
                                console.warn('codigo de error: '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){}
                    },
                    error       : function(){

                    }
                });
            }
        });



        // boton buscar lupa.
        $('#buscarliquidaciones').on('click',function(){
            $('form#form_buscar_liquidaciones').submit();
        });

        // submit buscar vacaciones
        $('form#form_buscar_liquidaciones').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Liquidacion/Buscar')?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR' && $data[0]!='00'){
                                if($data[0]=='OK'){
                                    $('.result').html($data[1]);
                                }else{
                                    alert('NO HAY RESULTADOS');
                                }
                            }else{
                                console.warn('codigo de error : '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){
                            console.error('ERROR AJAX : '+e);
                        }
                    },
                    error       : function(){

                    },
                    complete    : function(){

                    }
                })
            }
        });

        // formulario Agregar vacaciones
        $('form#form_agregar_liquidaciones').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Liquidacion/Agregar')?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0] != 'ERROR' && $data[0] !='00'){
                                if($data[0]=='OK'){
                                    alert($data[1]);
                                    $('.btn-reset').trigger('click'); $('input[type="hidden"]').val('');
                                }else{
                                    alert('ERROR AL GUARDAR.');
                                }
                            }else{
                                console.warn('codigo de error : '+$data[1]);
                            }
                        }catch(e){
                            console.error('ERROR AJAX : '+e);
                        }
                    },
                    error       : function(){
                        console.log('error');
                    },
                    complete    : function(){

                    }
                });
            }
        }); 

        // Buscar el nombre por el DNI.
        $('[searchinamexdni]').on('click',function(e){ $$ = this; $this = $(this);
            e.preventDefault();
            $.ajax({
                type    : 'POST',
                data    : 'dni='+$($this.attr('searchinamexdni')).val(),
                url     : "<?=site_url('DNItoName');?>",
                success : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0]!='ERROR'&&$data[0]!='00'){
                            $($this.attr('data-for')).val($data[1]);
                            $('#id').val($data[0]);
                        }else if($data[0] == '00'||$data[0]=='ERROR'){
                            console.warn('codigo de error: '+$data[1]);
                            alert($data[2]);
                        }
                    }catch(e){}
                },
                error   : function(){

                },
                complete: function(){

                }
            });
        });

    })(jQuery);
</script>