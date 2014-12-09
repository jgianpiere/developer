
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab">Buscar Producto</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Búsqueda de Producto</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;" id="form_buscar_productos" name="form_buscar_productos">
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-4 col-md-3 col-lg-2 mtop-7">Buscar Por :</label>
                                            <div class="col-xs-12 col-sm-10 col-md-3 col-lg-2 mtop-7">
                                                <select data-tipodoc="" class="form-control" id="proveedorBusPor" name="proveedorBusPor" data-for="#buscar_producto_valor">
                                                    <?=isset($this->TiposDocumento) ? $this->TiposDocumento : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-7 mtop-7">
                                                <input type="text" class="form-control" id="buscar_producto_valor" name="buscar_producto_valor" placeholder="Buscar.." required>
                                            </div>
                                            
                                            <a data-type="submit" class="btn btn-search control-label col-xs-1 mtop-7"></a>

                                        </div>
                                        
                                        <div class="row">
                                            <div style="display:none;" class="header">
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">CODIGO</span>
                                                <span class="col-lg-4 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">DESCRIPCION</span>
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">PRECIO</span>
                                                <span class="col-lg-3 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">STOCK</span>
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
          </div>
        
        <script>
            (function(){
                $('[data-type="submit"]').on('click',function(e){
                    $this = $(this);
                    e.preventDefault();
                    $$ = $($this.parent().parent()).submit();
                });
            })('lupasubmit',jQuery);

            (function(){
        $('form#form_buscar_productos').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            $.ajax({
                type        : 'POST',
                data        : $form.serialize(),
                url         : "<?=site_url('Compras/Producto/Buscar/buscar');?>",
                success     : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0] != 'ERROR' && $data[0] != '00'){
                            $('.result').html($data[2]);
                            $('.header').show(0);
                        }else{
                            alert($data[2]);
                            $('.header').hide(0);
                        }
                    }catch(e){
                        $('.header').show(0);
                    }
                },
                error       : function(){

                }
            });
        });
    })(jQuery);
        </script>




<script>
    (function(){
        // validar tipo documento x formato.
        $('[data-tipodoc]').on('change',function(){ $id = this.id; $$ = $(this);
            $input = $$.attr('data-for');
            $dataopt = $('#'+$id+' option[value="'+$$.val()+'"]');

            var maxdig = $($dataopt).attr('max-dig');
            var format = $($dataopt).attr('data-format');

            maxdig!== undefined && maxdig!= '' ? $($input).attr('maxlength',maxdig).val('') : $($input).removeAttr('maxlength').val('');
            
            $($input).attr('placeholder','EJM: '+format.replace('?','A').replace('?','B').replace('?','C'));
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