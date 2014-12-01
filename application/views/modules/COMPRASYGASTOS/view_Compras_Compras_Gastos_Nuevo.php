<div class="row">
    <?= isset($this->SubMenu) && !empty($this->SubMenu) ? $this->SubMenu : ''; ?>
    
    <div class="row col-xs-12 col-sm-8 col-md-9 col-lg-10">
        <div class="row siderbar_content">
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Buscar</a></li>
                <li class="inactive"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
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
                                    <form class="form-horizontal" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-xs-2">Tip. Doc. :</label>
                                            <div class="col-xs-2">
                                                <select class="form-control" required>
                                                    <option>DNI</option>
                                                    <option>C.E.</option>
                                                    <option>Pasaporte</option>
                                                    <option>RUC</option>
                                                </select>
                                            </div>

                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="num_documento" placeholder="Documento" required>
                                            </div>

                                            <label class="control-label col-xs-2">Razon Social :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required>
                                                    <option>Persona Natural</option>
                                                    <option>Persona Juridica</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2">Nombre:</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" id="inputPassword" placeholder="Nombres" required>
                                            </div>

                                            <label class="control-label col-xs-2">Apellidos:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="inputPassword" placeholder="Apellidos" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2">Correo Elec. :</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" placeholder="E-mail" required>
                                            </div>
                                            <label class="control-label col-xs-1">Celular:</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" placeholder="Celular" required>
                                            </div>
                                            <label class="control-label col-xs-2">Tel. Empresa :</label>
                                            <div class="col-xs-3">
                                                <input type="tel" class="form-control" placeholder="telefono" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-2" >Direc. Actual:</label>
                                            <label class="control-label col-xs-10" ><span class="label label-info col-xs-12" style="padding-top:4px;text-align:left;">direccion</span></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-2" >Direccion:</label>
                                            <div class="col-xs-10">
                                                <input type="text" class="form-control" placeholder="direccion">
                                            </div>    
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-2">Dto. :</label>
                                            <div class="col-xs-2">
                                                <select class="form-control" required>
                                                    <option value="-1" selected>Seleccione</option>
                                                    <option value="1">Ancash</option>
                                                    <option value="2">Ancash</option>
                                                    <option value="3">Ancash</option>
                                                    <option value="4">Ancash</option>
                                                </select>
                                            </div>
                                            <label class="control-label col-xs-2">Provincia :</label>
                                            <div class="col-xs-2">
                                                <select class="form-control">
                                                    <option value="-1" selected>Seleccione</option>
                                                    <option>Casma</option>
                                                    <option>Casma</option>
                                                    <option>Casma</option>
                                                </select>
                                            </div>
                                            <label class="control-label col-xs-2">Distrito :</label>
                                            <div class="col-xs-2">
                                                <select class="form-control">
                                                    <option value="-1" selected>Seleccione</option>
                                                    <option>VMT</option>
                                                    <option>San Isidro</option>
                                                    <option>Mira Flawers</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
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
        </div>
    </div>
</div>

<div style="color:silver;position:fixed;bottom:0px;left:0px;rigth:0px;height:20px;margin:7px;padding-right:20px;text-align:right;width:100%;"><span>view_Compras_Compras_Gastos_Nuevo.php</span></div>


