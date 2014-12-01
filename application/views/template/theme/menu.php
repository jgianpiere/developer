<div class="header-admin row">
      <div class="logo_small col-xs-7 col-sm-6 col-md-6 col-lg-6 mt7">Bienvenidos a <b> SOFCA</b><span class="hidden-xs"> -</span><span id="fecha" class="hidden-xs"> <?= date('j').', de '. date('F').' de '.date('Y'); ?><!-- Lunes, 6 de Octubre de 2014 --></span>.</div>
      <form id="cerrar-session" class="cerrar col-xs-5 col-sm-6 col-md-6 col-lg-6 mt7" method="post" action="<?=site_url('logout')?>">
        <label class="end">
            <b><?=isset($this->profile) ? $this->profile : lang('msg.login');?>
                <?php if(isset($this->profile) && !empty($this->profile)): ?>
                <ul class="opt_profile">
                    <ol></ol>
                    <li class="cerrar-session" onclick="javascript:$('#cerrar-session').submit();">
                      cerrar session
                    </li>
                </ul>
                <?php endif; ?>
            </b>
        </label>
      </form>
  </div>

<?= isset($this->menu) && !empty($this->menu) ? $this->menu : ''; ?>