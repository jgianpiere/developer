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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Buscar Préstamo </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_buscar_prestamos" name="form_buscar_prestamos" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="prestamo_bus_DNI" name="prestamo_bus_DNI" maxlength="8" placeholder="EJM: 46780390">
                                            </div>

                                            <a id="buscarprestamos" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>
                    
                                        <div class="row">
                                            <div class="header">
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">DOCUMENTO</span>
                                                <span class="col-lg-3 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">NOMBRE</span>
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">FECHA</span>
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">CUOTAS</span>
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">MONTO</span>
                                                <span class="col-lg-1 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">x</span>
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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Nuevo Préstamo</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;" id="form_agregar_prestamo" name="form_agregar_prestamo">
                                        <input type="hidden" name="id" id="id" value="">

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="prestamo_agreg_DNI" name="prestamo_agreg_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a searchinamexdni="#prestamo_agreg_DNI" data-for="#prestamo_agreg_Name" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Nombre :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="prestamo_agreg_Name" name="prestamo_agreg_Name" placeholder="" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="date" class="form-control" id="prestamo_fecha" name="prestamo_fecha" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Monto :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="prestamo_agreg_monto" name="prestamo_agreg_monto" placeholder="" required>
                                            </div>                                            

                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Cuotas :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="prestamo_agreg_cuotas" name="prestamo_agreg_cuotas" placeholder="1 CUOTA" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Observación :</label>
                                            <div class="col-lg-10 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <textarea class="form-control" cols="50" rows="4" id="prestamo_agreg_observacion" maxlength="250" name="prestamo_agreg_observacion" placeholder="Escribe aquí algunas observaciones"></textarea>
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
        $('#buscarprestamos').on('click',function(){
            $('form#form_buscar_prestamos').submit();
        });

        // submit buscar bonificaciones y comisiones
        $('form#form_buscar_prestamos').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Prestamos/Buscar')?>",
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

        // formulario Agregar Prestamo
        $('form#form_agregar_prestamo').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            if(1==1){
                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize(),
                    url         : "<?=site_url('RecursosHumanos/Prestamos/Agregar')?>",
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