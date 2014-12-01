<div class="container">
	<div class="row">
		<div message-resume></div>
	</div>
	<div class="row col-lg-4 col-sm-6 col-md-6 col-xs-12 end">
		<form name="form_login" id="form_login" class="form-signin" id="form-signin" method="POST" action="<?=site_url('login');?>">
	        <h2 class="form-signin-heading">Iniciar session</h2>
			<div class="form-group">
				<input name="username" type="text" class="form-control m2" focus validation="required" required>
			</div>
			<div class="form-group">
				<input name="password" type="password" class="form-control m2" validation="required" required>
			</div>
			<!-- <div class="form-group">
	        	<label class="checkbox">
	          		<input type="checkbox" value="remember-me"> Recordar
	        	</label>
			</div> -->
	        <button class="btn btn-large btn-primary col-xs-12 col-sm-3 col-md-3 col-lg-3" type="submit">entrar</button>
	     </form>
	</div>

	<script>
		(function(){
			/*$('#form_login').on('submit',function(e){ $this = $(this);
				e.preventDefault();
				$.ajax({
					type	: 'POST',
					data 	: $this.serialize(),
					url		: $this.attr('action'),
					success	: function(data){
						
					},
					error 	: function(){

					}
				});
			});*/
		})(jQuery);
	</script>
</div>