
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab">Datos Principales</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Datos Proveedor</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_nuevoproveedor" name="form_nuevoproveedor" style="margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 2mtop-7">Tip. Doc. :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-tipodoc="" data-for="#agre_pro_DNI" class="form-control" id="agre_pro_TipoDocume" name="agre_pro_TipoDocume" >
                                                    <?=isset($this->TiposDocumento) ? $this->TiposDocumento : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_DNI" maxlength="8" name="agre_pro_DNI" placeholder="Documento" required>
                                            </div>

                                            <!-- <label class="control-label col-lg-2 mtop-7">Razon Social :</label>
                                            <div class="col-lg-3 mtop-7">
                                                <select class="form-control">
                                                    <option>Persona Natural</option>
                                                    <option>Persona Juridica</option>
                                                </select>
                                            </div> -->

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 mtop-7">Nombre:</label>
                                            <div class="col-lg-5 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_nombre" name="agre_pro_nombre" placeholder="Nombres" validate="alpha" required>
                                            </div>

                                            <label class="control-label col-lg-2 mtop-7">Apellidos:</label>
                                            <div class="col-lg-3 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_apellido" name="agre_pro_apellido" placeholder="Apellidos" validate="alpha" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 mtop-7">Correo Elec. :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_email" name="agre_pro_email" placeholder="E-mail" validate="e-mail" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
                                            </div>
                                            <label class="control-label col-lg-1 mtop-7">Celular:</label>
                                            <div class="col-lg-2 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_celular" name="agre_pro_celular" placeholder="Celular" validate="cel" maxlength="9">
                                            </div>
                                            <label class="control-label col-lg-2 mtop-7">Tel. Empresa :</label>
                                            <div class="col-lg-3 mtop-7">
                                                <input type="tel" class="form-control" id="agre_pro_fijo" maxlength="9" name="agre_pro_fijo" placeholder="telefono" validate="tel">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group hidden-lg hidden-xs hidden-md hidden-sm">
                                            <label class="control-label col-lg-2 mtop-7" >Direc. Actual:</label>
                                            <label class="control-label col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7" ><span class="label label-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:4px;text-align:left;">direccion</span></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 mtop-7" >Direccion:</label>
                                            <div class="col-lg-10 mtop-7">
                                                <input type="text" class="form-control" id="agre_pro_direccionCasa" name="agre_pro_direccionCasa" validate="alpha_numeric" placeholder="direccion">
                                            </div>    
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Departamento:</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-departamentoslist data-provinciasid="#agre_per_ProvNac" data-distritosid="#agre_pro_Dist" class="form-control" id="agre_per_DepaNac">
                                                    <?= isset($this->Departamentos_01) ? $this->Departamentos_01 : isset($this->Departamentos) ? $this->Departamentos : '<option>-</option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Provincia :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-provinciaslist data-distritosid="#agre_pro_Dist" class="form-control" id="agre_per_ProvNac">
                                                    <?= isset($this->Provincias_01) ? $this->Provincias_01 : '<option></option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Distrito :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-distritoslist class="form-control" name="agre_pro_Dist" id="agre_pro_Dist">
                                                    <?= isset($this->Distritos_01) ? $this->Distritos_01 : '<option></option>'; ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" class="btn btn-reset" value="Limpiar">
                                                <input type="submit" class="btn btn-send" value="Guardar">
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
            $('form#form_nuevoproveedor').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
                e.preventDefault();
                if(1==1){
                    $.ajax({
                        type        : 'POST',
                        data        : $form.serialize(),
                        url         : "<?=site_url('Compras/Proveedor/Agregar/Nuevo');?>",
                        success     : function(data){
                            try{
                                $data = $.parseJSON(data);
                                if($data[0]!='ERROR' && $data[0]!='00'){
                                    if(String($data[0]).toLowerCase() =='ok'){
                                        alert('El Proveedor se guardo Correctamente.');
                                        $('[type="reset"]').trigger('click');
                                    }else{
                                        console.log($data.join(' '));
                                    }
                                }else{
                                    console.log('codigo de error: '+$data[1]);
                                    alert($data[2]);
                                }
                            }catch(e){
                                console.warn('error: '+e);
                            }
                        },
                        error       : function(){
                            console.error('error AJAX');
                        }
                    })
                }
            });

        // Recargar Departamentos 
        $('[data-departamentoslist]').on('change',function(){ 
            $$ = $(this);

            $provincias = $$.attr('data-provinciasid');
            $distritos  = $$.attr('data-distritosid');

            $($distritos).html('').attr('disabled','disabled');

            $data = $($provincias).data($$.val());
            if($data != undefined){
                $($provincias).html($data).removeAttr('disabled');
            }else if($$.val() > 0){
                $.ajax({
                    type    :  'POST',
                    data    : "departamento="+$$.val(),
                    url     : "<?= site_url('ListarProvincias');?>",
                    success : function(data){
                        $($provincias).data($$.val(),data).html(data).removeAttr('disabled');
                    },
                    error   : function(){

                    }
                })
            }else{
                $($provincias).html('').attr('disabled','disabled');
            }
        });

        // Reargar Provincias
        $('[data-provinciaslist]').on('change',function(){ $$ = $(this);
            $distritos = $$.attr('data-distritosid');
            $data = $($distritos).data($$.val());
            if($data !=undefined){
                $($distritos).html($data).removeAttr('disabled');
            }else if($$.val()>0){
                $.ajax({
                    type    : 'POST',
                    data    : "provincia="+$$.val(),
                    url     : "<?=site_url('ListarDistritos')?>",
                    success : function(data){
                        $($distritos).data($$.val(),data).html(data).removeAttr('disabled');  
                    },
                    error   : function(){

                    }
                });
            }else{
                $($distritos).html('').attr('disabled','disabled');
            }
        });

        // validar tipo documento x formato.
        $('[data-tipodoc]').on('change',function(){ $id = this.id; $$ = $(this);
            $input = $$.attr('data-for');
            $dataopt = $('#'+$id+' option[value="'+$$.val()+'"]');

            var maxdig = $($dataopt).attr('max-dig');
            var format = $($dataopt).attr('data-format');

            maxdig!== undefined && maxdig!= '' ? $($input).attr('maxlength',maxdig).val('') : $($input).removeAttr('maxlength').val('');
            
            $($input).attr('placeholder','EJM: '+format.replace('?','A'));
            $($input).off('keypress').on('keypress',function(e){
                $inp = $(this);
                
                $especiales = [8,9,35,36,37,39,46];
                if(jQuery.inArray(e.keyCode,$especiales) > -1){
                    return true;
                }

                if(maxdig===undefined||maxdig==''){}else if(maxdig <= $inp.val().length){return false;}

                // Patrones de comparacion 
                letrasynumeros  = /[a-zA-Z0-9]/;
                letras          = /[a-zA-Z]/;
                numeros         = /[0-9]/;

                if(format == '*' || format == '' || format == undefined){return true;}else 
                if((format == '*?0' || format == '*0?') && (letrasynumeros.test(e.key)) ){return true;}else 
                if(format == '*00' && (numeros.test(e.key)) ){return true;}else 
                if(format == '*??' && (letras.test(e.key)) ){return true;}else
                if(format == '*??' || format == '*00' || format == '*?0' || format == '*0?' || format == '*'){
                    return false;
                }

                if(parseInt(e.key)>=0 && format.substr($inp.val().length,1) == '0'){
                    return true;
                }else if(parseInt(e.key)>=0 && format.substr($inp.val().length,1) == '?'){
                    return false;
                }else if(format.substr($inp.val().length,1) != '?' && format.substr($inp.val().length,1) != '0'){                    
                    console.log('es especial');
                }else if(format.substr($inp.val().length,1) == '?'){
                    return true;
                }else{
                    return false;
                }

            });

        });

        $('[data-tipodoc]').trigger('change');


        // validar opcion RUC.
        $('#agre_pro_TipoDocume').on('change',function(){ $$ = this; $this = $(this);
            if($this.val() == 3){
                $('#agre_pro_apellido').val('').attr('readonly','true').removeAttr('required');
            }else{
                $('#agre_pro_apellido').removeAttr('readonly','true').attr('required','true');
            }
        });

        })(jQuery);
        </script>