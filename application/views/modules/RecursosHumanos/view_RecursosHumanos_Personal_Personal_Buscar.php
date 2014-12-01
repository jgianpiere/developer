        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Datos Personales</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" action="<?=site_url('RecursosHumanos/Personal/Buscar')?>" method="post" name="form_buscarpersona" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Documento :</label>
                                            <div class="col-lg-3 mtop-7">
                                                <select class="form-control" name="buscar_per_TipoDocume" id="buscar_per_TipoDocume" data-for="#buscar_per_DNI" data-tipodoc>
                                                    <option value="1" data-format="00000000" max-dig="8">DNI</option>
                                                    <option value="2" data-format="*??" max-dig="">Nombre</option>
                                                    <option value="3" data-format="*??" max-dig="">Estado</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="buscar_per_DNI" name="buscar_per_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a data-type="submit" class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="header">
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">DOCUMENTO</span>
                                                <span class="col-lg-4 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">NOMBRE</span>
                                                <span class="col-lg-3 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">CARGO</span>
                                                <span class="col-lg-2 col-md-12" style="background:red;color:white;border:1px solid white;padding:2px;">USUARIO</span>
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

<script type="text/javascript">
    (function(){
        $('[data-type="submit"]').on('click',function(e){
            $this = $(this);
            e.preventDefault();
            $$ = $($this.parent().parent());

            $.ajax({
                type    : $$.attr('method'),
                data    : $$.serialize(),
                url     : $$.attr('action'),
                success : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0] == 0){
                            console.info($data);
                            alert($data[1]);
                        }
                    }catch(e){
                        $('.result').html(data);
                        $('.header').show();
                    }
                },
                error   : function(){
                    console.warn('error');
                }

            })
        });

        // Eliminar Fila js
        $('.result').on('click','.fila .delete_row',function(){ $$ = this; $this = $(this);
            var params = {
                title : 'Confirmar',
                texto : '¿Realmente deseas eliminar a esta Persona?'
            };

            $('html').prepend('<div id="dialog-confirm" title="'+params.title+'"><p style="height:auto;min-height:50px;"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;z-index:1010;"></span>'+params.texto+'</p></div>');

            $("#dialog-confirm").dialog({
              resizable: false,
              height:'auto',
              modal: true,
              buttons: {
                "Eliminar": function() {
                    $dataID = $this.attr('data-id');
                    if($dataID>0){
                        $.ajax({
                            type    : 'POST',
                            data    : 'empleadoid='+$dataID,
                            url     : "<?=site_url('/RecursosHumanos/Personal/Eliminar')?>",
                            success : function(data){
                                try{
                                    $data = $.parseJSON(data);
                                    $this.parent().fadeOut('slow',function(){
                                        $this.parent().remove();
                                    });

                                    alert($data[0][0]);
                                }catch(e){
                                    alert(e);
                                }
                            },
                            error   : function(){
                                console.log('error');
                            }
                        })
                    }

                    $(this).dialog("close");

                  console.log($this.attr('data-id'));
                },
                Cancel: function() {
                  $(this).dialog("close");
                }
              }
            });
        });

        // editar resultado seleccionado
        // editar Personal.
        $('.result').on('dblclick','.fila',function(){ $$ = this; $this = $(this);
            $dataID = $this.attr('data-id');
            console.log($dataID);
            window.location.hash = '/Personal/Agregar';
            if($dataID > 0){
                $.ajax({
                    type    : 'POST',
                    data    : 'empleadoid='+$dataID,
                    url     : "<?=site_url('/RecursosHumanos/Personal/Editar');?>",
                    success : function(data){
                        $('.siderbar_content').html(data);
                    },
                    error   : function(){
                        
                    },
                    complete: function(){

                    }
                });
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


    })(jQuery);
</script>