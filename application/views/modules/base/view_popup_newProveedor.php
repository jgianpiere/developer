
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Nuevo Proveedor</h4>
        </div>
        <div class="modal-body">
            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_popup_newProveedor" name="form_popup_newProveedor" style="margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-6 col-md-1  text-left">Tip. Doc. :</label>
                                            <label class="control-label col-lg-6 col-md-1  text-left">Num. Doc. :</label>
                                            <div class="col-lg-6">
                                                <select data-tipodoc="" data-for="#popup_agre_pro_DNI" class="form-control" id="agre_pro_TipoDocume" name="agre_pro_TipoDocume" >
                                                    <?=isset($this->TiposDocumento) ? $this->TiposDocumento : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <input type="text" class="form-control" id="popup_agre_pro_DNI" maxlength="8" name="popup_agre_pro_DNI" placeholder="Documento" required>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-6 text-left">Nombre:</label>
                                            <label class="control-label col-lg-6 text-left">Apellidos:</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="popup_agre_pro_nombre" name="popup_agre_pro_nombre" placeholder="Nombres" validate="alpha" required>
                                            </div>

                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="popup_agre_pro_apellido" name="popup_agre_pro_apellido" placeholder="Apellidos" validate="alpha" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-12 text-left">Correo Elec. :</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="popup_agre_pro_email" name="popup_agre_pro_email" placeholder="E-mail" validate="e-mail" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-6 text-left">Celular:</label>
                                            <label class="control-label col-lg-6 text-left">Tel. Empresa :</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="popup_agre_pro_celular" name="popup_agre_pro_celular" placeholder="Celular" validate="cel" maxlength="9">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="tel" class="form-control" id="popup_agre_pro_fijo" maxlength="9" name="popup_agre_pro_fijo" placeholder="telefono" validate="tel">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-12 text-left" >Direccion:</label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" id="popup_agre_pro_direccionCasa" name="popup_agre_pro_direccionCasa" validate="alpha_numeric" placeholder="direccion">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 text-left">Departamento:</label>
                                            <label class="control-label col-lg-4 col-md-1 text-left">Provincia :</label>
                                            <label class="control-label col-lg-4 col-md-1 text-left">Distrito :</label>
                                            
                                            <div class="col-lg-4">
                                                <select data-departamentoslist data-provinciasid="#popup_agre_per_ProvNac" data-distritosid="#popup_agre_pro_Dist" class="form-control" id="popup_agre_per_DepaNac">
                                                    <?= isset($this->Departamentos_01) ? $this->Departamentos_01 : isset($this->Departamentos) ? $this->Departamentos : '<option>-</option>'; ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select data-provinciaslist data-distritosid="#popup_agre_pro_Dist" class="form-control" id="popup_agre_per_ProvNac">
                                                    <?= isset($this->Provincias_01) ? $this->Provincias_01 : '<option></option>';?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select data-distritoslist class="form-control" name="popup_agre_pro_Dist" id="popup_agre_pro_Dist">
                                                    <?= isset($this->Distritos_01) ? $this->Distritos_01 : '<option></option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
            <!-- <img src="//placehold.it/1000x600" class="img-responsive"> -->
        </div>

<script>
    (function(){
      var popup$ = jQuery.sub();

        popup$('#form_popup_newProveedor').on('submit',function(e){ $$ = this; $this = $(this); e.preventDefault();
            popup$.ajax({
                type    : 'POST',
                data    : $this.serialize(),
                url     : "<?=site_url('newProveedorxpopup');?>",
                success : function(data){
                    try{
                        $data = popup$.parseJSON(data);
                        if($data[0]!='ERROR' && $data[0]!='00'){
                            if($data[0]=='OK'){
                                alert($data[2]);
                            }
                        }else{
                            alert($data[2]);
                        }
                    }catch(e){
                        console.log('error: '+e);
                    }
                },
                error   : function(){

                }
            });
        });








        // Recargar Departamentos 
        popup$('[data-departamentoslist]').on('change',function(){ 
            $$ = popup$(this);

            $provincias = $$.attr('data-provinciasid');
            $distritos  = $$.attr('data-distritosid');

            popup$($distritos).html('').attr('disabled','disabled');

            $data = popup$($provincias).data($$.val());
            if($data != undefined){
                popup$($provincias).html($data).removeAttr('disabled');
            }else if($$.val() > 0){
                popup$.ajax({
                    type    :  'POST',
                    data    : "departamento="+$$.val(),
                    url     : "<?= site_url('ListarProvincias');?>",
                    success : function(data){
                        popup$($provincias).data($$.val(),data).html(data).removeAttr('disabled');
                    },
                    error   : function(){

                    }
                })
            }else{
                popup$($provincias).html('').attr('disabled','disabled');
            }
        });

        // Reargar Provincias
        popup$('[data-provinciaslist]').on('change',function(){ $$ = popup$(this);
            $distritos = $$.attr('data-distritosid');
            $data = popup$($distritos).data($$.val());
            if($data !=undefined){
                popup$($distritos).html($data).removeAttr('disabled');
            }else if($$.val()>0){
                popup$.ajax({
                    type    : 'POST',
                    data    : "provincia="+$$.val(),
                    url     : "<?=site_url('ListarDistritos')?>",
                    success : function(data){
                        popup$($distritos).data($$.val(),data).html(data).removeAttr('disabled');  
                    },
                    error   : function(){

                    }
                });
            }else{
                popup$($distritos).html('').attr('disabled','disabled');
            }
        });

        // validar tipo documento x formato.
        popup$('[data-tipodoc]').on('change',function(){ $id = this.id; $$ = popup$(this);
            $input = $$.attr('data-for');
            $dataopt = popup$('#'+$id+' option[value="'+$$.val()+'"]');

            var maxdig = popup$($dataopt).attr('max-dig');
            var format = popup$($dataopt).attr('data-format');

            maxdig!== undefined && maxdig!= '' ? popup$($input).attr('maxlength',maxdig).val('') : popup$($input).removeAttr('maxlength').val('');
            
            popup$($input).attr('placeholder','EJM: '+format.replace('?','A'));
            popup$($input).off('keypress').on('keypress',function(e){
                $inp = popup$(this);
                
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

        popup$('[data-tipodoc]').trigger('change');


        // validar opcion RUC.
        popup$('#agre_pro_TipoDocume').on('change',function(){ $$ = this; $this = popup$(this);
            if($this.val() == 3){
                popup$('#agre_pro_apellido').val('').attr('readonly','true').removeAttr('required');
            }else{
                popup$('#agre_pro_apellido').removeAttr('readonly','true').attr('required','true');
            }
        });




        
    })(jQuery);
</script>