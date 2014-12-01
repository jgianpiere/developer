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
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Buscar Días Trabajados </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_DNI" name="agre_per_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>

                <div class="tab-pane fade" id="tab_02">
                        
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Agregar Días Trabajados</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-md-1 mtop-7">DNI :</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_DNI" name="agre_per_DNI" maxlength="8" placeholder="EJM: 46780390" required>
                                            </div>

                                            <a class="btn btn-search control-label col-xs-1 mtop-7"></a>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-md-1 mtop-7">Nombre :</label>
                                            <div class="col-lg-9 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_DNI" name="agre_per_DNI" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Periodo :</label>
                                            <div class="col-lg-4 mtop-7">
                                                <select class="form-control" required>
                                                    <option>2014-1</option>
                                                    <option>2014-2</option>
                                                    <option>2014-3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-md-1 mtop-7">Dias Trabajados :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="number" class="form-control" id="agre_per_DNI" name="agre_per_DNI" placeholder="" required>
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

