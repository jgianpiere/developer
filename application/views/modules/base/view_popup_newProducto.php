
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Nuevo Producto</h4>
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
    $.noConflict();
    jQuery(document).ready(function($){
      // Code that uses jQuery's $ can follow here.
    });
</script>

<script>
    (function(){
      var popup$ = jQuery.sub();

        popup$('#form_popup_newProveedor').on('submit',function(e){ $$ = this; $this = $(this);
            popup$.ajax({
                type    : 'POST',
                data    : $this.serialize(),
                url     : "<?=site_url('newProductoxpopup');?>",
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
    })();
</script>

<script>/*$('.loadresultpopup').removeClass('loadresultpopup');*/</script>