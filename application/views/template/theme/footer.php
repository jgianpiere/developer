<script>
	function centerModal() {
	    $(this).css('display', 'block');
	    var $dialog = $(this).find(".modal-dialog");
	    var offset = ($(window).height() - $dialog.height()) / 2;
	    // Center modal vertically in window
	    $dialog.css("margin-top", offset);
	}

	$('.modal').on('show.bs.modal', centerModal);
	$(window).on("resize", function () {
	    $('.modal:visible').each(centerModal);
	});

</script>

<script>
	function ajaxpopup_nuevoProducto(){
		console.log($('.loadresultpopup').length);
		if($('.loadresultpopup').length > 0){
			$.ajax({
				type 	: 'POST',
				url 	: "<?=site_url('PopupNuevoProducto');?>",
				success : function(data){
					$('.loadresultpopup').html(data).removeClass('loadresultpopup');
				},
				error 	: function(){
					console.log('error');
				}
			});
		}else{
			console.log('esto es un error..');
		}
	}
</script>

<div id="newProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body loadresultpopup">
        	Cargando..
        </div>
    </div>
  </div>
</div>