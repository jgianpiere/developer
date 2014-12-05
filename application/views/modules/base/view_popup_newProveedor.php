<div id="newProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Nuevo Producto</h4>
        </div>
        <div class="modal-body">
            <!-- <img src="//placehold.it/1000x600" class="img-responsive"> -->
            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_popup_newProveedor" name="form_popup_newProveedor" style="margin-top:30px;">
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
                                        
                                        <!-- <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" class="btn btn-reset" value="Limpiar">
                                                <input type="submit" class="btn btn-send" value="Guardar">
                                            </div>
                                        </div> -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
            <!-- <img src="//placehold.it/1000x600" class="img-responsive"> -->
        </div>
    </div>
  </div>
</div>