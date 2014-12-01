
<!DOCTYPE html>
<html lang="es" id="CA">
<head>
	<title><?= isset($this->title) && !empty($this->title) ? $this->title : '';?><?= lang('appendtitle'); ?></title>
	<?= $this->load->view($seo); ?>
	<?= $this->load->view($header,$data); ?>
</head>
<body>
	<!-- menu -->
	<?= $this->load->view($menu); ?>
	<!-- menu -->
	<div id="internal_body" class="container">
		<?= $this->load->view($view); ?>
	</div>
			
	<!-- footer -->
	<div id="footer">
		<?= $this->load->view($footer); ?>
	</div>

	<footer role="contentinfo" id="p-footer" class="clear">
		<?= $this->load->view($FinalFooter); ?>
	</footer>
	<!-- footer -->

</body>
<?= $this->load->view($plugins);?>
</html>