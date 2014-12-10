
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Datos Principales</a></li>
                <li class="inactive"><a href="#tab_02" data-toggle="tab" style="min-width:140px;margin-right:10px;">Datos Laborales</a></li>
                <li class="inactive"><a href="#tab_03" data-toggle="tab" style="min-width:140px;margin-right:10px;">Datos Adicionales</a></li>
                <li class="inactive"><a href="#tab_04" data-toggle="tab" style="min-width:140px;margin-right:10px;">Datos Vinculados</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Datos Personales</div>
                            <!-- error message -->
                            <div id="message_resume" style="display:none;">
                                <a class="icn-close errormessagex">x</a>
                                <div resumen></div>
                            </div>
                            <!-- error message -->

                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" method="post" action="<?=site_url('RecursosHumanos/Personal/Agregar/add_datospersonales');?>" name="form_datospersonales" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <!-- <input type="hidden" value="" data-id="" name="datos-principales-personal-id"> -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Documento :</label>
                                            <div class="col-lg-3 mtop-7">
                                                <select data-tipodoc="" data-for="#agre_per_DNI" class="form-control" name="agre_per_TipoDocume" id="agre_per_TipoDocume">
                                                    <?=isset($this->TiposDocumento) ? $this->TiposDocumento : '<option>-</option>';?>
                                                </select>
                                            </div>

                                            <div class="col-lg-7 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_DNI" name="agre_per_DNI" maxlength="8" placeholder="EJM: 46780390" required value="<?=isset($this->numerodocumento) ? $this->numerodocumento : '';?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Sexo :</label>
                                            <div class="col-lg-3 mtop-7">
                                                <select class="form-control" name="agre_per_sexo" id="agre_per_sexo">
                                                    <option value="1" <?= isset($this->sexo) && !empty($this->sexo) && $this->sexo == 1 ? 'selected=""' : ''; ?> >MASCULINO</option>
                                                    <option value="0" <?= isset($this->sexo) && !empty($this->sexo) && $this->sexo == 0 ? 'selected=""' : ''; ?> >FEMENINO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">1er Nombre :</label>
                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_name1" name="agre_per_name1" placeholder="EJM: Juan" required value="<?= isset($this->nombre) ? $this->nombre : ''; ?>">
                                            </div>

                                            <label class="control-label col-lg-4 col-md-1 mtop-7">2do Nombre :</label>
                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_name2" name="agre_per_name2" placeholder="" value="<?=isset($this->name2s) ? $this->name2s : ''; ?>">
                                            </div>    

                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Ape. Paterno :</label>
                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_apePat" name="agre_per_apePat" placeholder="EJM: CALDERON" required value="<?=isset($this->appat) ? $this->appat : ''; ?>">
                                            </div>

                                            <label class="control-label col-lg-4 col-md-1 mtop-7">Ape. Materno :</label>
                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_apeMat" name="agre_per_apeMat" placeholder="EJM: DE LA CRUZ" required value="<?=isset($this->apmat) ? $this->apmat : ''; ?>">
                                            </div>    

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Correo Elec. :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_emailPersonal" name="agre_per_emailPersonal" placeholder="EJM: JUAN.CALDERON@GMAIL:COM" required validate="e-mail" value="<?=isset($this->email) ? $this->email : '';?>">
                                            </div>  
                                        </div>


                                        <div class="form-group">
                                            
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Tel. Casa :</label>
                                            <div class="col-lg-3 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_fijo" name="agre_per_fijo" placeholder="EJM: 01-3882715" maxlength="9" validate="tel" value="<?=isset($this->numfijo) ? $this->numfijo : ''; ?>">
                                            </div>

                                            <label class="control-label col-lg-1 col-md-1 mtop-7">Celular:</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select class="form-control" name="agre_tipo_operador" id="agre_tipo_operador">
                                                    <?= isset($this->OperadoresCelular) ? $this->OperadoresCelular : '<option>-</option>'?>
                                                </select>
                                            </div>

                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_celular" name="agre_per_celular" maxlength="9" placeholder="EJM: 947854512" required validate="cel" value="<?=isset($this->numcel) ? $this->numcel : ''; ?>">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1">Estado Civil:</label>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="agre_per_estadoCivil" id="input" value="soltero" <?= isset($this->estadocivil) && !empty($this->estadocivil) ? $this->estadocivil == 'soltero' || $this->estadocivil == '1' ? 'checked="checked"' : '' : 'checked="checked"'; ?> >
                                                    Soltero
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="agre_per_estadoCivil" id="input" value="casado" <?= isset($this->estadocivil) && ($this->estadocivil == 'casado' || $this->estadocivil == '2') ? 'checked="checked"' : ''; ?> >
                                                    Casado
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="agre_per_estadoCivil" id="input" value="viudo" <?= isset($this->estadocivil) && ($this->estadocivil == 'viudo' || $this->estadocivil == '3') ? 'checked="checked"' : ''; ?> >
                                                    Viudo
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="agre_per_estadoCivil" id="input" value="divorciado" <?= isset($this->estadocivil) && ($this->estadocivil == 'divorciado' || $this->estadocivil == '4') ? 'checked="checked"' : ''; ?> >
                                                    Divorciado
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="agre_per_estadoCivil" id="input" value="otros" <?= isset($this->estadocivil) && ($this->estadocivil == 'otros' || $this->estadocivil == '5') ? 'checked="checked"' : ''; ?> >
                                                    Otros
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Foto:</label>
                                            <div class="col-lg-5 col-md-12 mtop-7">
                                                <input type="file" id="imagen_foto" name="imagen_foto" data-preview-file-type="any" data-initial-caption="Seleccione una imagen">
                                                <div id="errorBlock" class="help-block"></div>
                                            </div>
                                        </div>


                                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Nacimiento</div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Fec. de Nac. :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select class="form-control" name="agre_per_anoNac" id="agre_per_anoNac">
                                                    <?= isset($this->AnoNacimiento) ? $this->AnoNacimiento : '<option value="-1">Año</option>'; ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 mtop-7">
                                                <select class="form-control" name="agre_per_mesNac" id="agre_per_mesNac">
                                                    <?= isset($this->MesNacimiento) ? $this->MesNacimiento : '<option value="-1">Mes</option>'; ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 mtop-7">
                                                <select class="form-control" name="agre_per_diaNac" id="agre_per_diaNac">
                                                    <?= isset($this->DiaNacimiento) ? $this->DiaNacimiento : '<option value="-1">Día</option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Departamento:</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-departamentoslist data-provinciasid="#agre_per_ProvNac" data-distritosid="#agre_per_DistNac" class="form-control" name="agre_per_DepaNac" id="agre_per_DepaNac">
                                                    <?= isset($this->Departamentos_01) ? $this->Departamentos_01 : isset($this->Departamentos) ? $this->Departamentos : '<option>-</option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Provincia :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-provinciaslist data-distritosid="#agre_per_DistNac" class="form-control" name="agre_per_ProvNac" id="agre_per_ProvNac">
                                                    <?= isset($this->Provincias_01) ? $this->Provincias_01 : '<option></option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Distrito :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-distritoslist class="form-control" name="agre_per_DistNac" id="agre_per_DistNac">
                                                    <?= isset($this->Distritos_01) ? $this->Distritos_01 : '<option></option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Dirección Actual</div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Dirección :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_direccionCasa" name="agre_per_direccionCasa" placeholder="Ejm: JR. LAS FLORES 154 ALT. OBELISCO DE LOS PROCERES" required value="<?= isset($this->direccion) ? $this->direccion : ''; ?>">
                                            </div>  
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Departamento:</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-departamentoslist data-provinciasid="#agre_per_ProvCasa" data-distritosid="#agre_per_DistCasa" class="form-control" name="agre_per_DepaCasa" id="agre_per_DepaCasa">
                                                    <?= isset($this->Departamentos_02) ? $this->Departamentos_02 : isset($this->Departamentos) ? $this->Departamentos : '<option>-</option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Provincia :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-provinciaslist data-distritosid="#agre_per_DistCasa" class="form-control" name="agre_per_ProvCasa" id="agre_per_ProvCasa">
                                                    <?= isset($this->Provincias_02) ? $this->Provincias_02 : '<option></option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Distrito :</label>
                                            <div class="col-lg-2 mtop-7">
                                                <select data-distritoslist class="form-control" name="agre_per_DistCasa" id="agre_per_DistCasa">
                                                    <?= isset($this->Distritos_02) ? $this->Distritos_02 : '<option></option>'; ?>
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
                <div class="tab-pane fade" id="tab_02">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" action="<?=site_url('RecursosHumanos/Personal/Agregar/add_datoslaborales');?>" method="post" name="form_datoslaborales">
                            <input type="hidden" value="" data-id="" name="datos-principales-personal-id">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Datos Laborales </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Sist. Pensión :</label>
                                            <div class="col-lg-4 mtop-7">
                                                <select sistemapensiones data-for="#agre_dl_afp" class="form-control" name="agre_per_SistPension" id="agre_per_SistPension">
                                                    <?=isset($this->SisPensiones) ? $this->SisPensiones : '<option>-</option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">AFP :</label>
                                            <div class="col-lg-4 mtop-7">
                                                <select class="form-control" name="agre_dl_afp" id="agre_dl_afp" <?=isset($this->afpdes) && !empty($this->afpdes) ? $this->afpdes == 'ONP' ? 'disabled' : '' : 'disabled';?>>
                                                    <option value="<?=isset($this->afpnum) ? $this->afpnum : '0'; ?>"><?=isset($this->afpdes) ? $this->afpdes : ' - '; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">NÚMERO AFP :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_NumeroAFP" name="agre_per_NumeroAFP" placeholder="" value="<?=isset($this->numafp) ? $this->numafp : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Cta. Haber:</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select ctabanco="#agre_per_ctaHaber" id="agre_per_BancoHaber" name="agre_per_BancoHaber" class="form-control" required>
                                                    <?= isset($this->haberes) ? $this->haberes : isset($this->bancos) ? $this->bancos : '<option value="0">-</option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Num. Cta.</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_ctaHaber" name="agre_per_ctaHaber" placeholder="" required disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Cta. CTS:</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select ctabanco="#agre_per_ctaCTS" id="agre_per_BancoCTS" name="agre_per_BancoCTS" class="form-control" required>
                                                    <?= isset($this->cts) ? $this->cts : isset($this->bancos) ? $this->bancos : '<option value="0">-</option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Num. Cta.</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_ctaCTS" name="agre_per_ctaCTS" placeholder="" required disabled value="<?=isset($this->numerocuentahaberes) ? $this->numerocuentahaberes : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">EPS :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select class="form-control" required id="agre_per_EPS" name="agre_per_EPS" required>
                                                    <option value="0" <?= isset($this->eps) && $this->eps == '0' ? 'selected="selected"' : ''; ?> >NO</option>
                                                    <option value="1" <?= isset($this->eps) && $this->eps == '1' ? 'selected="selected"' : ''; ?> >SI</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Local :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select class="form-control" name="agre_per_Local" id="agre_per_Local" required>
                                                    <?=isset($this->loacales) ? $this->loacales : '<option value="0">-</option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Email Trab. :</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_emailTrabajo" name="agre_per_emailTrabajo" placeholder="EJM: JCALDERONP@INVERSOL.COM.PE" required validate="trim|email" value="<?=isset($this->email) ? $this->email : '';?>">
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Usuario :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="agre_per_Usuario" name="agre_per_Usuario" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Estado :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select name="agre_per_EstadoPersonal" id="agre_per_EstadoPersonal" class="form-control" required>
                                                    <option value="1">ACTIVO</option>
                                                    <option value="0">INACTIVO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Contratos &nbsp;<a  apointer  class="btn-mas" id="btn-additem-contratos"></a></div>
                                        
                                        <div style="padding:4px;" id="datos_contratos" class="row">
                                            <div style="margin:4px;border:1px solid silver;">
                                                <div class="row">
                                                    <div class="header" style="display:none;">
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">SUELDO</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">INICIO</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FIN</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">CARGO</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">CONF?</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">PLAN?</span>
                                                        <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">x</span>
                                                    </div>
                                                    <div class="result">
                                                        <?= isset($this->contratos) ? $this->contratos : ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" class="btn btn-reset" value="Limpiar">
                                                <input id="submit-datoslaborales" type="submit" class="btn btn-send" value="Guardar">
                                            </div>
                                        </div>     
                                        
                                </div>
                            </div>

                            <!-- <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Item : <a id="btn-additem" class="btn-mas" href="#"></a></div> -->
                


                        </form>
                            <!-- Formulario -->
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_03">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" action="<?=site_url('RecursosHumanos/Personal/Agregar/add_datosvivienda');?>" method="post" name="form_datosvivienda">
                            <input type="hidden" value="" data-id="" name="datos-principales-personal-id">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Datos de Vivienda </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-1">Vivienda :</label>
                                        <div class="radio col-lg-2 col-md-12 mtop-7">
                                            <label>
                                                <input type="radio" name="agre_per_TipoVivi" id="input" value="1">
                                                Alquilada
                                            </label>
                                        </div>
                                        <div class="radio col-lg-2 col-md-12 mtop-7">
                                            <label>
                                                <input type="radio" name="agre_per_TipoVivi" id="input" value="2">
                                                Padres
                                            </label>
                                        </div>
                                        <div class="radio col-lg-2 col-md-12 mtop-7">
                                            <label>
                                                <input type="radio" name="agre_per_TipoVivi" id="input" value="3" checked="checked">
                                                Propia
                                            </label>
                                        </div>
                                        <div class="radio col-lg-2 col-md-12 mtop-7">
                                            <label>
                                                <input type="radio" name="agre_per_TipoVivi" id="input" value="4">
                                                Pensión
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" >Estudios &nbsp;<a  apointer  class="btn-mas" id="btn-additem-cursos"></a></div>
                                    
                                    <div style="padding:4px;" id="datos_estudios" class="row">
                                        <div style="margin:4px;border:1px solid silver;">
                                            <div class="row">
                                                <div class="header" style="display:none;">
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-4 col-md-12">CURSO</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">NIVEL</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">INICIO</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FIN</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">OBS</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">x</span>
                                                </div>
                                                <div class="result">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" >Hobbie y deportes que practica : &nbsp;</div> <!-- <a id="btn-additem" class="btn-mas" href="#"></a>  &nbsp; <a id="btn-additem" class="btn-menos" href="#"></a> -->

                                    <div class="form-group" id="observaciones">
                                        <div class="fila">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">1.-</label>
                                            <div class="col-lg-10 col-md-12 mtop-7">
                                                <textarea id="agre_per_Hobbie" name="agre_per_Hobbie" cols="105" rows="2" placeholder="" ></textarea>                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                            <input type="reset" class="btn btn-reset" value="Limpiar">
                                            <input id="submit-datosvivienda" type="submit" class="btn btn-send" value="Guardar">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Formulario -->
                        </form>
                    </div>

                </div>
                <div class="tab-pane fade" id="tab_04">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" action="<?=site_url('RecursosHumanos/Personal/Agregar/add_datosvinculados');?>" method="post" name="form_datosvinculados" id="form_datosvinculados">
                            <input type="hidden" value="" data-id="" name="datos-principales-personal-id">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Datos de Vivienda </div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    
                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Conyuge :</label>
                                        <div class="col-lg-4 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="cony_nombre" name="cony_nombre" placeholder="" required>
                                        </div>

                                        <label class="control-label col-lg-2 col-md-1 mtop-7">D.N.I :</label>
                                        <div class="col-lg-3 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="cony_dni" name="cony_dni" placeholder="" maxlength="8" required validate="number">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Fecha de nacimiento :</label>
                                        <div class="col-lg-2 col-md-12 mtop-7">
                                            <select id="cony_ano" name="cony_ano" class="form-control" required>
                                                <?= isset($this->AnoNacimiento) ? $this->AnoNacimiento : '<option value="-1">Año</option>'; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mtop-7">
                                            <select id="cony_mes" name="cony_mes" class="form-control" required>
                                                <?= isset($this->MesNacimiento) ? $this->MesNacimiento : '<option value="-1">Mes</option>'; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mtop-7">
                                            <select id="cony_dia" name="cony_dia" class="form-control" required>
                                                <?= isset($this->DiaNacimiento) ? $this->DiaNacimiento : '<option value="-1">Día</option>'; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Datos de hijos  &nbsp; <a id="btn-additem-hijo" class="btn-mas"  apointer ></a>  <!-- &nbsp;&nbsp; <a id="btn-additem" class="btn-menos" href="#"></a> --></div>

                                    <div class="row" id="datos_hijos" style="padding:4px;">
                                        <div style="margin:4px;border:1px solid silver;">
                                           <div class="row">
                                                <div class="header" style="display:none;">
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-5 col-md-12">NOMBRE HIJO :</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">D.N.I :</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">FECHA NACIMIENTO :</span>
                                                    <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">x</span>
                                                </div>
                                                <div class="result">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> Datos de Padres  <!-- &nbsp; <a id="btn-additem" class="btn-mas" href="#"></a>  &nbsp;&nbsp; <a id="btn-additem" class="btn-menos" href="#"></a> --></div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Nombre Padre :</label>
                                        <div class="col-lg-4 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="nompadre" name="nompadre" placeholder="" required>
                                        </div>

                                        <label class="control-label col-lg-2 col-md-1 mtop-7">D.N.I :</label>
                                        <div class="col-lg-3 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="dnipadre" name="dnipadre" maxlength="8" placeholder="" required validate="number" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Nombre Madre:</label>
                                        <div class="col-lg-4 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="nommadre" name="nommadre" placeholder="" required>
                                        </div>

                                        <label class="control-label col-lg-2 col-md-1 mtop-7">D.N.I :</label>
                                        <div class="col-lg-3 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="dnimadre" name="dnimadre" maxlength="8" placeholder="" required validate="number">
                                        </div>
                                    </div>

                                    <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12"> En caso de emergencia llamar a: &nbsp; <!-- <a id="btn-additem-contactoemergencias" class="btn-mas" href="#"></a>  --> <!-- &nbsp;&nbsp; <a id="btn-additem" class="btn-menos" href="#"></a> --></div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Nombre :</label>
                                        <div class="col-lg-9 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="nomemer" name="nomemer" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-3 col-md-1 mtop-7">Teléfono :</label>
                                        <div class="col-lg-4 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="telemer" name="telemer" placeholder="" maxlength="9" required validate="tel">
                                        </div>

                                        <label class="control-label col-lg-2 col-md-1 mtop-7">Parentesco :</label>
                                        <div class="col-lg-3 col-md-12 mtop-7">
                                            <input type="text" class="form-control" id="paremer" name="paremer" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                            <input type="reset" class="btn btn-reset" value="Limpiar">
                                            <input id="submit-datosvinculados" type="submit" class="btn btn-send" value="Guardar">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
          </div>

          <!-- seccion de popups -->
          <div style="display:none;">
              <div id="popup-addcontratos">
                  
                  <!-- aqui agregar contratos. -->

                                <div class="row">
                                    <form class="form-horizontal" method="post" action="#" name="form_datocontratos" style="padding:2px 2px 2px 2px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">SUELDO :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="add-popup-sueldo" name="add-popup-sueldo" placeholder="" required validate="trim|xss_clean|float">
                                            </div>  
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">FECHA INICIO :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="date" class="form-control" fechamin-to="#add-popup-fechacese" data-fechamin="<?=date('d-m-Y');?>" id="add-popup-fechainicio" name="add-popup-fechainicio" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">FECHA CESE :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="date" class="form-control" data-fechamin="<?=date('d-m-Y');?>" id="add-popup-fechacese" name="add-popup-fechacese" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">CARGO :</label>
                                            <div class="col-lg-8 mtop-7">
                                                <select class="form-control" name="add-popup-cargo" id="add-popup-cargo">
                                                    <?= isset($this->cargo) ? $this->cargo : '<option value="0">-</option>'; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1">Cargo Conf. :</label>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="add-popup-cargoconf" id="cargoconf1" value="1" checked="checked">
                                                    NO
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="add-popup-cargoconf" id="cargoconf2" value="2">
                                                    SI
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1">Esta Planilla? :</label>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="add-popup-estaplanilla" id="cargoplan1" value="1" checked="checked">
                                                    NO
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12 mtop-7">
                                                <label>
                                                    <input type="radio" name="add-popup-estaplanilla" id="cargoplan2" value="2">
                                                    SI
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                  <!-- aqui agregar contratos. -->
              
              </div>
              <div id="popup-addhijos">
                  
                  <!-- aqui agregar contratos. -->

                                <div class="row">
                                    <form class="form-horizontal" method="post" action="#" name="form_datohijos" style="padding:2px 2px 2px 2px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">NOMBRE HIJO :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="add-popup-nombrehijo" name="add-popup-nombrehijo" placeholder="" required validate="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">D.N.I :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="add-popup-dnihijo" name="add-popup-dnihijo" maxlength="8" placeholder="" required validate="number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4 col-md-1 mtop-7">FECHA NACIMIENTO :</label>
                                            <div class="col-lg-8 col-md-12 mtop-7">
                                                <input type="date" class="form-control" data-fechamax="<?=date('d-m-Y');?>" id="add-popup-fechanacimiento" name="add-popup-fechanacimiento" placeholder="" required datepicker>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                  <!-- aqui agregar contratos. -->
              
              </div>
              <div id="popup-addcursos">
                  
                  <!-- aqui agregar contratos. -->

                                <div class="row">
                                    <form class="form-horizontal" method="post" action="#" name="form_datohijos" style="padding:2px 2px 2px 2px;">
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Cursos :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input type="text" class="form-control" id="add-popup-cursonombre" name="add-popup-cursonombre" placeholder="" required>
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Niveles :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <select id="add-popup-cursonivel" name="add-popup-cursonivel" class="form-control" required="">
                                                    <option value="1">BASICO</option>
                                                    <option value="2">INTERMEDIO</option>
                                                    <option value="3">AVANZADO</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="form-group">                                       
                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Inicio :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input fechamin-to="#add-popup-cursofechafin" data-fechamin="<?=date('d-m-Y');?>" class="form-control" id="add-popup-cursofechainicio" name="add-popup-cursofechainicio" placeholder="" required datepicker type="date">
                                            </div>

                                            <label class="control-label col-lg-2 col-md-1 mtop-7">Fin :</label>
                                            <div class="col-lg-4 col-md-12 mtop-7">
                                                <input class="form-control" data-fechamin="<?=date('d-m-Y');?>" id="add-popup-cursofechafin" name="add-popup-cursofechafin" placeholder="" required datepicker type="date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-12 col-md-1 mtop-7 text-left">Observación :</label>
                                            <div class="col-lg-12 col-md-12 mtop-7">
                                                <textarea id="add-popup-cursoobs" name="add-popup-cursoobs" cols="105" rows="8" placeholder="Escribe aquí algunas observaciones"></textarea>                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                  <!-- aqui agregar contratos. -->
              
              </div>
          </div>
          <!-- seccion de popups -->

<script>
  (function(){
    $("#imagen_foto").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-sm",
        allowedFileExtensions : ['jpg', 'png','gif'],
        fileType: "any",
        elErrorContainer: '#errorBlock',
        maxFileSize: 1000,
        maxFilesNum: 1,
        browseLabel: 'Buscar &hellip;',
        browseIcon: '',// '<i class="glyphicon glyphicon-folder-open"></i> &nbsp;'
        removeLabel: 'Eliminar',
        removeIcon: '',//'<i class="glyphicon glyphicon-ban-circle"></i> ',
        removeClass: 'btn btn-default btn-sm'
    });

  })(jQuery);
</script>
        
<script type="tex/javascript">
    (function(){
        /*$('form').on('submit',function(e){ $this = $(this);
            e.preventDefault();
            try{
                if(1==1){
                    $.ajax({
                        type    : $this.attr('method'),
                        data    : $this.serialize(),
                        url     : $this.attr('action'),
                        success : function(data){
                            console.log(data);
                        },
                        error   : function(){
                            console.warn('error');
                        },
                        beforeSend : function(){
                            // .. agregar gif
                            // .. revisar validation
                        },
                        complete    : function(){}
                    });
                }else{
                    alert('ERROR');
                }
            }catch(e){}
        });*/

    
        // Grabar Datos Principales
        $('form[name="form_datospersonales"]').on('submit',function(e){ $this = $(this);
            e.preventDefault();
            try{
                if(1==1){
                    $.ajax({
                        type    : $this.attr('method'),
                        data    : $this.serialize(),
                        url     : $this.attr('action'),
                        success : function(data){
                            try{
                                $data = $.parseJSON(data);
                                if(parseInt($data[0]) > 0){
                                    $('[name="datos-principales-personal-id"]').val($data[0]).attr('data-id',$data[0]);
                                    $('#tab_01').okResult();
                                }else{
                                    alert($data[0]);
                                    console.log($data);
                                }
                            }catch(e){
                                $('[resumen]').html(data);
                                $('#message_resume').fadeIn(0);
                            }
                            // console.log(data);
                        },
                        error   : function(){
                            console.warn('error');
                        },
                        beforeSend : function(){
                            // .. agregar gif
                            // .. revisar validation
                        },
                        complete    : function(){}
                    });
                }else{
                    console.log(e);
                }
            }catch(e){}
        });

        // Grabar Datos Laborales
        $('form[name="form_datoslaborales"]').on('submit',function(e){ $this = $(this);
            e.preventDefault();
            try{
                if(1==1){
                    // cargar hijos.
                    var $Contratos = [];
                    var arrContrato = new Object();
                    $('#datos_contratos div .row .result .fila').each(function(i,e){
                        arrContrato = {
                            contrato : {
                                sueldo  : parseFloat($($(e).children('span').get(0)).text()),
                                inicio  : $($(e).children('span').get(1)).text(),
                                fin     : $($(e).children('span').get(2)).text(),
                                cargo   : parseInt($($(e).children('span').get(3)).attr('data-id')),
                                conf    : parseInt($($(e).children('span').get(4)).text()),
                                plan    : parseInt($($(e).children('span').get(5)).text())
                            }
                        }; $Contratos.push(arrContrato);
                    });

                    $.ajax({
                        type        : 'POST',
                        data        : $this.serialize()+'&contratos='+jQuery.stringify($Contratos),
                        url         : $this.attr('action'),
                        success     : function(data){
                            console.log(data);
                            $('#tab_02').okResult();
                        },
                        error       : function(){

                        },
                        complete    : function(){

                        }
                    });

                }else{
                    console.log(e);
                }
            }catch(e){}
        });

        // Grabar Datos Vivienda
        $('form[name="form_datosvivienda"]').on('submit',function(e){ $this = $(this);
            e.preventDefault();
            try{
                if(1==1){
                    // cargar estudios
                    var $Estudios = [];
                    var arrCursos = new Object();
                    $('#datos_estudios div .row .result .fila').each(function(i,e){
                        arrCurso = {
                            curso : {
                                nombre  : $($(e).children('span').get(0)).text(),
                                nivel   : $($(e).children('span').get(1)).attr('data-id'),
                                inicio  : $($(e).children('span').get(2)).text(),
                                fin     : $($(e).children('span').get(3)).text(),
                                obs     : $($(e).children('span').get(4)).attr('title')
                            }
                        }; $Estudios.push(arrCurso);
                    });

                    $.ajax({
                        type        : 'POST',
                        data        : $this.serialize()+'&cursos='+jQuery.stringify($Estudios),
                        url         : $this.attr('action'),
                        success     : function(data){
                            try{
                                $data = $.parseJSON(data);
                                alert($data[0]);
                            }catch(e){
                                console.log(e);
                            }
                            $('#tab_03').okResult();
                        },
                        error       : function(){

                        },
                        complete    : function(){

                        }
                    });
                }
            }catch(e){
                console.log(e);
            }
        });

        // Grabar Datos Vinculados
        $('form[name="form_datosvinculados"]').on('submit',function(e){ $this = $(this);
            e.preventDefault();
            try{
                if(1==1){
                    // cargar hijos
                    var $Hijos = [];
                    var arrHijos = new Object();
                    $('#datos_hijos div .row .result .fila').each(function(i,e){
                        arrHijos = {
                            hijo : {
                                nombre  : $($(e).children('span').get(0)).text(),
                                dni     : $($(e).children('span').get(1)).text(),
                                fechnac : $($(e).children('span').get(2)).text()
                            }
                        }; $Hijos.push(arrHijos);
                    });

                    $.ajax({
                        type        : 'POST',
                        data        : $this.serialize()+'&hijos='+jQuery.stringify($Hijos),
                        url         : $this.attr('action'),
                        success     : function(data){
                            try{
                                $data = $.parseJSON(data);
                                alert($data[0]);
                            }catch(e){
                                console.log(e);
                            }

                            $('#tab_04').okResult();
                        },
                        error       : function(){

                        },
                        complete    : function(){

                        }
                    });
                }
            }catch(e){
                console.log(e);
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


        // validar sistema de pensiones.
        $('select[sistemapensiones]').on('change',function(){ $id = this.id; $$ = $(this);
            $dataafp = $('#'+$id+' option[value='+$$.val()+']');
            $valor   = $$.val();
            var afpactive = $($dataafp).attr('data-afp'); // console.log([afpactive,$$.attr('data-for')]);
            if(parseInt(afpactive) == 1){
                $data = $($$.attr('data-for')).data($$.val());
                if($data != undefined){
                    $($$.attr('data-for')).html($data).removeAttr('disabled');
                }else{
                    $.ajax({
                        type    : 'POST',
                        data    : 'sispen='+$valor,
                        url     : "<?=site_url('ListarAFPxSisPe')?>",
                        success : function(data){
                            $($$.attr('data-for')).data($$.val(),data).html(data).removeAttr('disabled');
                        },
                        error   : function(){

                        }
                    });
                }

                $($$.attr('data-for')).removeAttr('disabled');
            }else if(afpactive == '0'){
                $($$.attr('data-for')).html('').attr('disabled','disabled');

            }else{
                $($$.attr('data-for')).html('') .removeAttr('required');
            }
        });

        // validar input de cuenta de banco
        $('[ctabanco]').on('change',function(){ $$ = $(this);
            $inp = $($$.attr('ctabanco'));
            if($$.val()>0){
                $inp.removeAttr('disabled');
            }else{
                $inp.attr('disabled','disabled');
            }
        });
        

    })(jQuery);
</script>

<script type="text/javascript">
        function _deletePopup(){
            $('.bg-fancy').fadeOut('slow',function(){
                $('.bg-fancy').remove();
            });
        }

        function _activepopup(){
            // dragable popup
            if($(window).innerWidth()<=648){
                $(".uidragrable").css('left','4px');
            }

            $( ".uidragrable" ).draggable({ containment: ".bg-fancy", scroll: false });

            $(window).on('resize',function(){
                $w = $(window).innerWidth();
                $c = $( ".uidragrable" ).innerWidth();
                if($w > 648){
                    $( ".uidragrable" ).css('left','calc(50%-'+($( ".uidragrable" ).innerWidth()/2)+')');
                }else{
                    $( ".uidragrable" ).css({'left':'4px'});
                }
            });

            // eliminar ventana.
            $('modal-x').on('click',function(){
                _deletePopup();
            });
        }

        function _onsubmit($submit){
            try{
                typeof $submit === 'function' ? $submit() : false;
            }catch(e){console.log(e)}
        }

    (function(){
        $.fn.fancyPopup = function($content,options){ $this = $(this); $MYHTML = $($content).html();
            var defaults = {
                title       : '',
                textaceptar : 'Enviar',
                textcancel  : 'cancelar',
                onsubmit    : null,
                oncancel    : '_deletePopup()'
            }; var o = $.extend(defaults,options);

            var $popup = _CompileHTML(o.title,$MYHTML,o);
            $this.on('click',function(){
                $('html').prepend($popup);
                _activepopup();
            });

        }

        $.fancyPopup = function($content,options,callback){ $MYHTML = $($content).html();
            var defaults = {
                title       : '',
                textaceptar : 'Enviar',
                textcancel  : 'cancelar',
                onsubmit    : null,
                oncancel    : '_deletePopup()'
            }; var o = $.extend(defaults,options);

            
            var $popup = _CompileHTML(o.title,$MYHTML,o);
            $('html').prepend($popup);
            typeof callback === 'function' ? callback() : false;
            _activepopup();

        }

        function _CompileHTML($title,$content,opt){

            html = '';
            html += '<div class="bg-fancy" align="center">';
            html += '    <div style="width: 640px; position: absolute; top: 90px; z-index:1002;" id="modal" class="uidragrable">';
            html += '        <div id="modal-box">';
            html += '            <a  apointer  id="modal-x" onclick="javascript:_deletePopup();">x</a>';
            html += '            <h2 id="modal-title">'+$title+'</h2>';
            html += '            <div id="modal-content" style="height: auto;">';
            html += '                <div>';
            html +=                     $content;
            html += '                </div>';
            html += '                <div>';
            //html +=                     '<div style="text-align: left;" id="upload-running-buttons" class="modal-buttons"><input style="float: left;" type="button" id="cancel-popup" value="Cancelar" class="freshbutton-lightblue" onclick="javascript:_deletePopup();"><div style="float: right;"><input style="" value="Aceptar" class="freshbutton-blue" onclick="" type="button" id="done-button"></div><div class="clear"></div></div>';
            html +=                     '<div><input type="reset" class="btn btn-reset" value="'+opt.textcancel+'" onclick="'+opt.oncancel+'"><input type="submit" class="btn btn-send" value="'+opt.textaceptar+'" onclick="'+opt.onsubmit+'"></div>';
            html += '                </div>';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '</div>';

            return html;
        }

    })(jQuery);
</script>

<script> 
    /**
    * Funciones del popup.
    */
    
    // funcion agregar contratos
    fn_agregarContrato = function($this){ $this = $($this);
        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();
        $html = _NUEVOCONTRATO($data);
        $('#datos_contratos div .row .header').fadeIn(0);
        $('#datos_contratos div .row .result').prepend($html);

        // modificar lista de cursos.
        $('#datos_contratos div .row .result .fila').off('dblclick').on('dblclick',function(){ $this = $(this); $this.attr('id','contrato'+Math.floor(Math.random()*100000));
            $chil = $this.children('span');
            $data = [$($chil.get(0)).text(),$($chil.get(1)).text(),$($chil.get(2)).text(),[$($chil.get(3)).attr('data-id'),$($chil.get(3)).text()],$($chil.get(4)).text(),$($chil.get(5)).text()];
            // console.log($data);
            var dataid = String($this.attr('id'));
            $.fancyPopup('#popup-addcontratos',
                {
                    title       : 'Editar Contrato',
                    textaceptar : 'Guardar',
                    textcancel  : 'cancelar',
                    onsubmit    : 'fn_modificarContrato(this,'+"'#"+dataid+"'"+')'
                },function(){
                    $('#add-popup-sueldo')              .val( $data[0]);
                    $('#add-popup-fechainicio')         .val( $data[1]);
                    $('#add-popup-fechacese')           .val( $data[2]);
                    $('#add-popup-cargo option[value="'+$data[3][0]+'"]').attr('selected','selected');               //.prop("selectedIndex",$data[3]);
                    $('#cargoconf'+String($data[4])).prop('checked',true);
                    $('#cargoplan'+String($data[5])).prop('checked',true);
                }
            );
        });

        //  eliminar curso registrado.
        $('.row-menos').off('click').on('click',function(){ $this = $(this);
            var params = {
                title : 'Confirmar',
                texto : 'Realmente deseas eliminar este contrato'
            };

            $('html').prepend('<div id="dialog-confirm" title="'+params.title+'"><p style="height:auto;min-height:50px;"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;z-index:1010;"></span>'+params.texto+'</p></div>');

            $("#dialog-confirm").dialog({
              resizable: false,
              height:'auto',
              modal: true,
              buttons: {
                "Eliminar": function() {
                  $this.parent().parent().remove();
                  $rows = $('#datos_contratos div .row .result .fila').length;
                  if($rows <= 0){ $('#datos_contratos div .row .header').fadeOut(0); }
                  $(this).dialog("close");
                },
                Cancel: function() {
                  $(this).dialog("close");
                }
              }
            });

        });

        _deletePopup();
    
    }

    fn_modificarContrato = function($this,$row){
         $$ = $($row); $this = $($this);

        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();

        $cargo3desc = $($('#add-popup-cargo option[value="'+$data[3].value+'"]').get(0)).text();

        $($$.children('span').get(0)).text($data[0].value);
        $($$.children('span').get(1)).text($data[1].value);
        $($$.children('span').get(2)).text($data[2].value);
        $($$.children('span').get(3)).text(($cargo3desc.length > 20 ? ($cargo3desc.substr(0,20)+'..') : $cargo3desc)).attr('data-id',$data[3]).attr('title',$cargo3desc).attr('onclick','javascript:alert('+"'"+$cargo3desc+"'"+');');
        $($$.children('span').get(4)).text($data[4].value);
        $($$.children('span').get(5)).text($data[5].value);

        $$.removeAttr('id');

        _deletePopup();
    }

    // funcion que agregar el html respectivo de la fila en la lista de cursos agregados.
    _NUEVOCONTRATO = function($data){
        $cargo3desc = $($('#add-popup-cargo option[value="'+$data[3].value+'"]').get(0)).text();
        $html = '';
        $html += '<div class="fila">';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12">'+$data[0].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12">'+$data[1].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12">'+$data[2].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-3 col-md-12" data-id="'+$data[3].value+'" onclick="javascript:alert('+"'"+$cargo3desc+"'"+');" title="'+$cargo3desc+'">'+($cargo3desc.length > 20 ? $cargo3desc.substr(0,20)+'..' : $cargo3desc) +'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12">'+$data[4].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12">'+$data[5].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12"><a class="btn-menos row-menos"  apointer ></a></span>    ';
        $html += '</div>';

        return $html;
    }

    // funcion agregar hijo
    fn_agregarHijo     = function($this){ $this = $($this);
        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();
        $html = _NUEVOHIJO($data);
        $('#datos_hijos div .row .header').fadeIn(0);
        $('#datos_hijos div .row .result').prepend($html);

        // modificar lista de hijos.
        $('#datos_hijos div .row .result .fila').off('dblclick').on('dblclick',function(){ $this = $(this); $this.attr('id','hijo'+Math.floor(Math.random()*100000));
            $chil = $this.children('span');
            $data = [$($chil.get(0)).text(),$($chil.get(1)).text(),$($chil.get(2)).text()];
            // console.log($data);
            var dataid = String($this.attr('id'));
            $.fancyPopup('#popup-addhijos',
                {
                    title       : 'Editar Hijo',
                    textaceptar : 'Guardar',
                    textcancel  : 'cancelar',
                    onsubmit    : 'fn_modificarHijo(this,'+"'#"+dataid+"'"+')'
                },function(){
                    $('#add-popup-nombrehijo')          .val( $data[0]);
                    $('#add-popup-dnihijo')             .val( $data[1]);
                    $('#add-popup-fechanacimiento')     .val( $data[2]);
                }
            );
        });

        //  eliminar hijo registrado.
        $('.row-menos').off('click').on('click',function(){ $this = $(this);
            var params = {
                title : 'Confirmar',
                texto : 'Realmente deseas eliminar este curso'
            };

            $('html').prepend('<div id="dialog-confirm" title="'+params.title+'"><p style="height:auto;min-height:50px;"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;z-index:1010;"></span>'+params.texto+'</p></div>');

            $("#dialog-confirm").dialog({
              resizable: false,
              height:'auto',
              modal: true,
              buttons: {
                "Eliminar": function() {
                  $this.parent().parent().remove();
                  $rows = $('#datos_hijos div .row .result .fila').length;
                  if($rows <= 0){ $('#datos_hijos div .row .header').fadeOut(0); }
                  $(this).dialog("close");
                },
                Cancel: function() {
                  $(this).dialog("close");
                }
              }
            });

        });

        _deletePopup();


    }

    // function modificar hijo
    fn_modificarHijo = function($this,$row){ $$ = $($row); $this = $($this);

        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();

        $($$.children('span').get(0)).text($data[0].value);
        $($$.children('span').get(1)).text($data[1].value);
        $($$.children('span').get(2)).text($data[2].value);

        $$.removeAttr('id');

        _deletePopup();
    }

    // funcion que agregar el html respectivo de la fila en la lista de cursos agregados.
    _NUEVOHIJO = function($data){
        $html = '';
        $html += '<div class="fila">';
        $html += '    <span style="padding:2px;" class="col-lg-5 col-md-12">'+$data[0].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-3 col-md-12">'+$data[1].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-3 col-md-12">'+$data[2].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12"><a class="btn-menos row-menos"  apointer ></a></span>    ';
        $html += '</div>';

        return $html;
    }

    // funcion agregar curso
    fn_agregarCurso     = function($this){ $this = $($this);
        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();
        $html = _NUEVOCURSO($data);
        $('#datos_estudios div .row .header').fadeIn(0);
        $('#datos_estudios div .row .result').prepend($html);

        // modificar lista de cursos.
        $('#datos_estudios div .row .result .fila').off('dblclick').on('dblclick',function(){ $this = $(this); $this.attr('id','curso'+Math.floor(Math.random()*100000));
            $chil = $this.children('span');
            $data = [$($chil.get(0)).text(),$($chil.get(1)).attr('data-id'),$($chil.get(2)).text(),$($chil.get(3)).text(),$($chil.get(4)).attr('title')];
            // console.log($data);
            var dataid = String($this.attr('id'));
            $.fancyPopup('#popup-addcursos',
                {
                    title       : 'Editar Curso',
                    textaceptar : 'Guardar',
                    textcancel  : 'cancelar',
                    onsubmit    : 'fn_modificarCurso(this,'+"'#"+dataid+"'"+')'
                },function(){
                    $('#add-popup-cursonombre')         .val( $data[0]);
                    $('#add-popup-cursonivel')          .prop("selectedIndex",$data[1]-1);
                    $('#add-popup-cursofechainicio')    .val( $data[2]);
                    $('#add-popup-cursofechafin')       .val( $data[3]);
                    $('#add-popup-cursoobs')            .val( $data[4]);
                }
            );
        });

        //  eliminar curso registrado.
        $('.row-menos').off('click').on('click',function(){ $this = $(this);
            var params = {
                title : 'Confirmar',
                texto : 'Realmente deseas eliminar este curso'
            };

            $('html').prepend('<div id="dialog-confirm" title="'+params.title+'"><p style="height:auto;min-height:50px;"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;z-index:1010;"></span>'+params.texto+'</p></div>');

            $("#dialog-confirm").dialog({
              resizable: false,
              height:'auto',
              modal: true,
              buttons: {
                "Eliminar": function() {
                  $this.parent().parent().remove();
                  $rows = $('#datos_estudios div .row .result .fila').length;
                  if($rows <= 0){ $('#datos_estudios div .row .header').fadeOut(0); }
                  $(this).dialog("close");
                },
                Cancel: function() {
                  $(this).dialog("close");
                }
              }
            });

        });

        _deletePopup();
    } 

    // function modificar curso
    fn_modificarCurso = function($this,$row){ $$ = $($row); $this = $($this);

        $form = $($this.parent().parent().prev().children('.row').children('form').get(0));
        $data = $form.serializeArray();

        $curso1desc = $($('#add-popup-cursonivel option[value="'+$data[1].value+'"]').get(0)).text();

        $($$.children('span').get(0)).text($data[0].value);
        $($$.children('span').get(1)).attr('data-id',$data[1].value).text($curso1desc).attr('title',$curso1desc);
        $($$.children('span').get(2)).text($data[2].value);
        $($$.children('span').get(3)).text($data[3].value);
        $($$.children('span').get(4)).attr('title',$data[4].value).attr('onclick','javascript:alert('+"'"+$data[4].value+"'"+');');

        $$.removeAttr('id');

        _deletePopup();
    }

    // funcion que agregar el html respectivo de la fila en la lista de cursos agregados.
    _NUEVOCURSO = function($data){
        $curso1desc = $($('#add-popup-cursonivel option[value="'+$data[1].value+'"]').get(0)).text();

        $html = '';
        $html += '<div class="fila">';
        $html += '    <span style="padding:2px;" class="col-lg-4 col-md-12">'+$data[0].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12" data-id="'+$data[1].value+'" title="'+$curso1desc+'">'+$curso1desc+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12">'+$data[2].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-2 col-md-12">'+$data[3].value+'</span>';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12" onclick="javascript:alert('+"'"+$data[4].value+"'"+')" title="'+$data[4].value+'">obs</span>    ';
        $html += '    <span style="padding:2px;" class="col-lg-1 col-md-12"><a class="btn-menos row-menos"  apointer ></a></span>    ';
        $html += '</div>';

        return $html;
    }
</script>

<script>
    (function(){
        // Agregar Contratos
        $('#btn-additem-contratos').fancyPopup('#popup-addcontratos',
            {
                title       : 'Nuevo Contrato',
                textaceptar : 'Crear',
                textcancel  : 'cancelar',
                onsubmit    : 'fn_agregarContrato(this)'
            }
        );

        // Agregar Hijos 
        $('#btn-additem-hijo').fancyPopup('#popup-addhijos',
            {
                title       : 'Nuevo Hijo',
                textaceptar : 'Crear',
                textcancel  : 'cancelar',
                onsubmit    : 'fn_agregarHijo(this)'
            }
        );

        $('#btn-additem-cursos').fancyPopup('#popup-addcursos',
            {
                title       : 'Nuevo Curso',
                textaceptar : 'Crear',
                textcancel  : 'cancelar',
                onsubmit    : 'fn_agregarCurso(this)'
            }
        );

    })(jQuery,document);
   
</script>


<script>
    // relacion de submits finales de la pestaña Nuevo Persona -> 
    
    (function(){
        $('#submit-datoslaborales').on('click',function(e){
            $id = parseInt($('[name="datos-principales-personal-id"]').val());
            if($id > 0){
                return true;
            }else{
                e.preventDefault();
                alert('debe guardar primero los datos principales');
                return false;
            }
        });

        $('#submit-datosvivienda').on('click',function(e){
            $id = parseInt($('[name="datos-principales-personal-id"]').val());
            if($id > 0){
                return true;
            }else{
                e.preventDefault();
                alert('debe guardar primero los datos principales');
                return false;
            }
        });

        $('#submit-datosvinculados').on('click',function(e){
            $id = parseInt($('[name="datos-principales-personal-id"]').val());
            if($id > 0){
                return true;
            }else{
                e.preventDefault();
                alert('debe guardar primero los datos principales');
                return false;
            }
        });

        // quitar los mensajes de error
        function _removemsgerror(){
            $('#message_resume').fadeOut('slow',function(){
                $('[message_resume]').html('');
            });
        }

        $('.errormessagex').on('click',function(){
            _removemsgerror();
        });

        $('input,select').on('click',function(){
           _removemsgerror();
        });

    })(jQuery);
</script>