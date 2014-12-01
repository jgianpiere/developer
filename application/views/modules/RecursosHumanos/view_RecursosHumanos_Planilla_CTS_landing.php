        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">                

                <div class="tab-pane fade active in" id="tab_01">
                        
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">CTS</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;">

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Periodo :</label>
                                            <div class="col-lg-4 mtop-7">
                                                <select class="form-control" required>
                                                    <option>2014-1</option>
                                                    <option>2014-2</option>
                                                    <option>2014-3</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4 mtop-7">
                                                <input type="submit" value="Generar" class="btn btn-send">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                
                </div>
          </div>

