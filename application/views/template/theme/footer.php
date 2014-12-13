<script>
	function centerModal(){
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
	_reloadpopup = function(){
		// reload popup.
	}
</script>

<script>
	function ajaxpopup_nuevoProducto(){
		if($('.loadresultpopup').length > 0){
			$.ajax({
				type 	: 'POST',
				url 	: "<?=site_url('PopupNuevoProveedor');?>",
				success : function(data){
					$('.loadresultpopup').html(data);
					_reloadpopup();
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
    <div class="modal-content loadresultpopup">
        	Cargando..
    </div>
  </div>
</div>