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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Buscar Descansos Médicos </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="buscar_descansomedico" name="buscar_descansomedico" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="buscar_descansomedico_dni" name="buscar_descansomedico_dni" maxlength="8" placeholder="EJM: 46780390" validate="number">
                                            </div>
                                            <a id="buscardescansomedico" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="row">
                                            <div class="header" style="display:none;">
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">DOCUMENTO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-5 col-md-12">NOMBRE</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FECHA INICIO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FECHA FIN</span>
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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Nuevo Descanso Médico</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" name="form_descanso_medico" id="form_descanso_medico" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <input type="hidden" id="id" name="id" required value="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agrega_DescaMedico_DNI" name="agrega_DescaMedico_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a searchinamexdni="#agrega_DescaMedico_DNI" data-for="#agrega_DescaMedico_Nombre" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Nombre :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agrega_DescaMedico_Nombre" name="agrega_DescaMedico_Nombre" placeholder="" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha Inicio :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Documento" required datepicker>
                                            </div>

                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha Fin :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="Documento" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Observación :</label>
                                            <div class="col-lg-10 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <textarea class="form-control" cols="50" rows="4" placeholder="" id="observacion" name="observacion" maxlength="250" ></textarea>
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

<script>
    (function(){
        if($('input').prop('type') != 'date' ) {
          $('[datepicker]').removeClass('hasDatepicker');
          $('[datepicker]').datepicker({ dateFormat: 'dd-mm-yy' });
        }

        $(document).on('ready','input[type="date"],[datepicker]',function(){ $$ = this; $this = $(this);
            $type = $this.attr('type');
            // en caso sea un date. 
            if($type == 'date' && $($this).prop('type') != 'date' ) {
              $('[datepicker]').removeClass('hasDatepicker');
              $('[datepicker]').datepicker({ dateFormat: 'dd-mm-yy' });
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

        // Buscar descanso medico
        $('#buscardescansomedico').on('click',function(e){ $$ = this; $this = $(this);
            e.preventDefault();
            $('form#buscar_descansomedico').submit();
        });

        // form agregar descanso medico
        $('form#form_descanso_medico').on('submit',function(e){ $$ = this; $this = $(this);
            e.preventDefault();
            $.ajax({
                type    : 'POST',
                data    : $this.serialize(),
                url     : "<?=site_url('RecursosHumanos/DescansoMedico/Agregar');?>",
                success : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0] != 'ERROR' && $data[0] != '00'){
                            alert($data[1]);
                            $('[type="reset"]').trigger('click');
                        }else{
                            console.warn($data[1]);
                            alert($data[2]);
                        }
                    }catch(e){
                        console.warn('codigo de error : '+e);
                    }
                },
                error   : function(){
                    console.error('error AJAX');
                },
                complete: function(){

                }
            });
        });

        // form buscar descanso medico
        $('form#buscar_descansomedico').on('submit',function(e){ $$ = this; $this = $(this);
            e.preventDefault();
            $.ajax({
                type    : 'POST',
                data    : $this.serialize(),
                url     : "<?=site_url('RecursosHumanos/DescansoMedico/Buscar');?>",
                success : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0]!='ERROR' && $data[0]!='00'){
                            if($data[1]!=''){
                                $('.header').fadeIn('fast',function(){
                                    $('.result').html($data[2]);
                                });
                            }else{
                                $('.header').fadeOut('fast');
                            }
                        }else{
                            console.warn('codigo de error: '+$data[1]);
                            if($data[2]==undefined){
                                alert('NO EXISTEN REGISTROS O EL DNI ES INCORRECTO');
                            }else{
                                alert($data[2]);
                            }
                        }
                    }catch(e){
                        console.error('ERROR AJAX'+e);
                    }
                },
                error   : function(){

                },
                complete: function(){

                }
            });
        })


        // Delete row
        $('.result').on('click','.fila .delete_row',function(){ $$ = this; $this = $(this); $fila = $($this.parent());
            var params = {
                title : 'Confirmar',
                texto : '¿ Realmente deseas eliminar este descanso medico ?'
            };

            $('html').prepend('<div id="dialog-confirm" title="'+params.title+'"><p style="height:auto;min-height:50px;"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;z-index:1010;"></span>'+params.texto+'</p></div>');

            $("#dialog-confirm").dialog({
              resizable: false,
              height:'auto',
              modal: true,
              buttons: {
                "Eliminar": function() {
                    $dataid = $fila.attr('data-id');
                    if($dataid>0){
                        $.ajax({
                            type    : 'POST',
                            data    : 'id='+$fila.attr('data-id'),
                            url     : "<?=site_url('RecursosHumanos/DescansoMedico/Eliminar');?>",
                            success : function(data){
                                try{
                                    $data = $.parseJSON(data);
                                    if($data[0]!='ERROR' && $data[0]!= '00'){
                                        alert($data[1]);
                                    }else{
                                        console.warn('codigo de error: '+$data[1]);
                                        alert($data[2]);
                                    }
                                }catch(e){
                                    console.error(e);
                                }
                            },
                            error   : function(){

                            },
                            complete: function(){

                            }
                        })

                        $fila.remove();
                        $(this).dialog("close");
                    }else{
                        console.warn('error!, registro invalido');
                        alert('el registro Ya no existe');
                        $fila.remove();
                        $(this).dialog("close");
                    }

                },
                Cancel: function() {
                  $(this).dialog("close");
                }
              }
            });
        });
    })(jQuery);
</script>