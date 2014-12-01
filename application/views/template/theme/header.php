<!-- Normalizr -->
<link rel="stylesheet" href="<?=CSS;?>normalize/normalize.css" />

<!-- get Boostrap styles -->
<link rel="stylesheet" href="<?=CSS;?>bootstrap/bootstrap.css" />
<link rel="stylesheet" href="<?=CSS;?>bootstrap/bootstrap-theme.css" />
<link rel="stylesheet" href="<?=CSS;?>bootstrap/fileinput.css" />
<link rel="stylesheet" href="<?=CSS;?>theme/style.css" />

<!-- load fonts & icons -->
<?= $this->load->view('template/theme/fonts.php'); ?>

<script type="text/javascript">
    var plugins_path = "<?=PLUGINS;?>";
</script>

<!--[if !IE]> -->
    <!-- <script src="<?=JS;?>jquery/jquery-2.1.0.min.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<![endif]-->



<script>
    (function(){
      $.site_url = function($uri){
        return ["<?=site_url('"+$uri+"');?>","<?=site_url('#"+$uri+"');?>"];
      }
    })(jQuery);
</script>