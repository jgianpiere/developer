
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">

            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Importar Ordenes de Compra</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="margin-top:30px;">

                                        <div class="form-group">
                                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 mtop-7">
                                            <label class="btn btn-send left">
                                                <input type="file" value="" id="ordendecomprafile" name="ordendecomprafile" style="opacity:0;" />
                                            </label>
                                                <!-- <input type="reset" class="btn btn-send left" value="Importar Ordenes de Compra" /> -->
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 mtop-7">
                                                <input type="submit" class="btn btn-submit" value="Descargar Formato">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                </div>
          </div>