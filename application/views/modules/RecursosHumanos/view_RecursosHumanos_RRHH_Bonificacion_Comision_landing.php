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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Buscar Bonificación </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_buscar_bonificaciones" name="form_buscar_bonificaciones" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            
                                            <label name="agre_bonificacion_motivo" id="agre_bonificacion_motivo" class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Motivo :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select name="bonificacion_motivo" id="bonificacion_motivo" required="" class="form-control">
                                                    <option value="1">COMISION</option>
                                                    <option value="2">BONIFICACION</option>
                                                    <option value="5">MOVILIDAD</option>
                                                    <option value="4">ALIMENTO</option>
                                                </select>
                                            </div>
    
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="buscar_bonificacion_DNI" name="buscar_bonificacion_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a id="buscarbonificaciones" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="row">
                                            <div class="header">
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">DOCUMENTO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">NOMBRE</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FECHA</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">MOTIVO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">MONTO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">x</span>
                                            </div>
                                            <div class="result">
                                                
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>

                <div class="tab-pane fade" id="tab_02">
                        
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Nuevo Bonificación</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_agregar_bonificacion" name="form_agregar_bonificacion" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_bonificacion_DNI" name="agre_bonificacion_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a searchinamexdni="#agre_bonificacion_DNI" data-for="#agre_bonificacion_Nombre" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Nombre :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_bonificacion_Nombre" name="agre_bonificacion_Nombre" placeholder="" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="date" class="form-control" id="bonificacion_fecha" name="bonificacion_fecha" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7" id="agre_bonificacion_motivo" name="agre_bonificacion_motivo">Motivo :</label>
                                            <div class="col-lg-4 mtop-7">
                                                <select class="form-control" required id="bonificacion_motivo" name="bonificacion_motivo">
                                                    <option value="1">COMISION</option>
                                                    <option value="2">BONIFICACION</option>
                                                    <option value="5">MOVILIDAD</option>
                                                    <option value="4">ALIMENTO</option>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Monto :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_bonificacion_monto" name="agre_bonificacion_monto" placeholder="" required validate="float">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Observación :</label>
                                            <div class="col-lg-10 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <textarea class="form-control" cols="50" rows="4" placeholder="Escribe aquí algunas observaciones" id="agre_bonificacion_obs" name="agre_bonificacion_obs"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group mtop-7">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
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
        // boton buscar lupa.
        $('#buscarbonificaciones').on('click',function(){
            $('form#form_buscar_bonificaciones').submit();
        });

        // submit buscar bonificaciones y comisiones
        $('form#form_buscar_bonificaciones').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Bonificacion_Comision/Buscar')?>",
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

        // formulario Agregar Bonificacion
        $('form#form_agregar_bonificacion').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Bonificacion_Comision/Agregar')?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0] != 'ERROR' && $data[0] !='00'){
                                if($data[0]=='OK'){
                                    alert($data[1][1]);
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
        }) 
    })(jQuery);

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
</script>