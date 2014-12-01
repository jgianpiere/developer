<?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Asistencia Entrada / Salida </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;">

                                        <div class="form-group">
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input data-form="entrada" type="submit" class="btn btn-send" value="ENTRADA" onclick="javascript:void(0);">
                                            </div>
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input data-form="salida" type="submit" class="btn btn-send" value="SALIDA" onclick="javascript:void(0);">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input data-form="entradarefrigerio" type="submit" class="btn btn-send" value="INICIO REFRIGERIO" onclick="javascript:void(0);">
                                            </div>
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input data-form="salidarefrigerio" type="submit" class="btn btn-send" value="FIN REFRIGERIO" onclick="javascript:void(0);">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <script type="text/javascript">
                                    $('[data-form]').on('click',function(e){ $this = $(this); e.preventDefault();
                                        window.open("<?=base_url('RecursosHumanos/Asistencia')?>/"+$this.attr('data-form')+"?token=<?=$this->asistenciaToken;?>",'_blank');
                                    });
                                </script>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>
          </div>
