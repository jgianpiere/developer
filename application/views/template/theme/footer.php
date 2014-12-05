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

<div id="newProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body loadresultpopup">
        	Cargando..
            <!-- <img src="//placehold.it/1000x600" class="img-responsive"> -->
			<script>$('.loadresultpopup').removeClass('loadresultpopup').html('Cargando..');</script>
        </div>
    </div>
  </div>
</div>