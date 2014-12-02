<link rel="stylesheet" href="<?=JS;?>modernizr/modernizr.js">

<script type="text/javascript">
    $.HTML_error_msg = function(msg,$id){ $id = ($id || 'msg_error');
      return '<div id="'+$id+'" class="alert alert-danger alert-dismissible" open-easing="easeInBounce" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+msg+'</div>';
    }
</script>
<!-- get Boostrap query -->
<script src="<?=JS;?>bootstrap/bootstrap.js"></script>

<script src="<?=JS;?>bootstrap/fileinput.js" type="text/javascript"></script>

<script src="<?=JS;?>tokeninput/jquery.tokeninput.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="<?=JS;?>jquery-ui/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?=JS;?>jquery-ui/jquery-ui.theme.css">
<link rel="stylesheet" type="text/css" href="<?=JS;?>jquery-ui/jquery-ui.structure.css">
<script type="text/javascript" src="<?=JS;?>jquery-ui/jquery-ui.js"></script>

<script type="text/javascript">

/*String.prototype.replaceAll = function (find, replace) {
    var str = this;
    return str.replace(new RegExp(find, 'g'), replace);
};*/

$.fn.okResult = function(){ $this = $(this);
  $($this).prepend('<div class="okresult" align="center"><i>&nbsp;</i></div>');
}

  // hash uri load ajax
  /*  
  (function(){
    $$hash = window.location.hash;
    if($$hash!=undefined){
      $.ajax({
        type    : 'POST',
        data    : '',
        url     : $.site_url('login')[0],
        success : function(data){
          // window.location.href = $.site_url('login')[1];
          console.log('sssss');
        },
        error   : function(){

        }
      });
    }
  })(jQuery);
*/
</script>

<script>
  jQuery.extend({
    stringify  : function stringify(obj){
        if ("JSON" in window) {
            return JSON.stringify(obj);
        }

        var t = typeof(obj);
        if (t != "object" || obj === null){
            // simple data type
            if (t == "string") obj = '"' + obj + '"';

            return String(obj);
        }else{
            // recurse array or object
            var n, v, json = [], arr = (obj && obj.constructor == Array);

            for (n in obj) {
                v = obj[n];
                t = typeof(v);
                if (obj.hasOwnProperty(n)) {
                    if (t == "string") {
                        v = '"' + v + '"';
                    } else if (t == "object" && v !== null){
                        v = jQuery.stringify(v);
                    }

                    json.push((arr ? "" : '"' + n + '":') + String(v));
                }
            }

            return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
        }
    }
  });
</script>



<script type="text/javascript" src="<?=JS;?>general/validation.js"></script>


<script type="text/javascript">
  (function(){

    $('.btn-close').on('click',function(){ $this = $(this);
      $act = $this.attr('for');
      $($act).stop(true).animate({'background-color':'gold'},'fast','easeOutQuad',function(){ $($act).removeAttr('style'); });
    });

  	/*$('.easing-menu-efect li a')
  		.on('mouseover',function(){ $this = $(this);
  			$('.easing-menu-efect li a');
  			$this.stop(true).animate({'padding':'30px auto 20px auto','background-color':'#FFFFFF'},'fast','easeOutQuad',function(){});
  		})
  		.on('mouseleave',function(){
        $this.stop(true).animate({'background-color':'transparent'},'fast','easeOutQuad',function(){$this.removeAttr('style');});
  		})
  	;*/

    // Funcion que permite mostrar la lista. 
    $('.sbmn').on('click',function(){ $this = $(this);
      $sbmn = $this.attr('btn-sbmn');
      $('[data-sbmn]').stop(true).slideUp('slow','easeInQuart',function(){});
      $('[data-sbmn='+$sbmn+']').stop(true).slideToggle('slow','easeInQuart',function(){});
    });

    // mostrar el foco
    $('input[focus]').focus();

    // mostrar mensajes de error
    if(window.location.hash == '#login_error'){
      var message = "<?=lang('error.login_error');?>";
      $('[message-resume]').html($.HTML_error_msg(message,'msg-loginerror'));
      window.location.hash = '';
    }

    $.open_easing = function(){
      $('[open-easing]').each(function(i,e){
          $this_efect = ($(e).attr('open-easing') || 'easeOutQuad');
          $(e).fadeIn($this_efect,function(){});
      });
    }
    $.open_easing();
    
  })(jQuery);
    
</script>


<script>
  _fnVerificCalc = function(){
    $('[calc-cant],[calc-prec],[calc-tota]').on('keyup',function(){ total_suma = 0;
      if(!$('[calc-cant]').length > 0){ $('[all-total]').val(0); return false; }
      $('[calc-cant]').each(function(i,e){ $$ = $(this);
        var cant = parseInt($(e).val() || 0);
        var pric = parseFloat($(e).parent().next().children('input').val() || 0);
        var total = parseFloat(cant * pric);
        $(e).parent().next().next().children('input').val(total);

        total_suma += total;
        $('[all-total]').val(total_suma);
        
        try{
        $impuesto = (parseFloat($('#impuesto').val())||0);
        $('[all-totalimpuesto]').val((total_suma / 100) * $impuesto);
        $('[all-subtotal]').val(total_suma - ((total_suma / 100) * $impuesto));
        }catch(e){

        }

      });
    });
  };
_fnVerificCalc();
</script>

<script>
  // menu principal ajax form
  /*$('.menu-principal * a[href]').on('click',function(e){ $$ = $(this); $data = $$.attr('href');
    e.preventDefault();
    $.ajax({
      type    : 'POST',
      data    : '',
      url     : $data,
      success : function(data){
        if(data.status == 200){
          try{
            $result = $.parseJSON(data);
          }catch(e){
            $('#internal_body').html(data);
          }
        }
      },
      error   : function(){
        console.error('algo salio mal..');
      }
    });
  });*/


  // ejecutar link
  $('#latmenu * .submenu-lat-result a[href][target="_top"]').off('click').on('click',function(e){ $this = $(this);
    e.preventDefault();
    $.ajax({
      type      : 'POST',
      data      : '',
      url       : $this.attr('href'),
      success   : function(data){
        window.location.hash = '';
        $Ihref = window.location.href;
        $Ilink = $this.attr('href');

        $left  = $Ihref.split('#')[0];
        $RLink = $Ilink.substr($left.length,$Ilink.length);
        window.location.hash = $RLink;
        $('.siderbar_content').html(data);
      },
      error     : function(){

      }

    });
    
    return false;
  });

  // ejecutar URL
  WLhash = window.location.hash;

  if(WLhash!=''){
    $url = window.location.href.replace('#','');
    $.ajax({
      type    : 'POST',
      data    : '',
      url     : $url,
      success : function(data){
        if(data){
          $('.siderbar_content').html(data);

          $sbmn = $('a[href="'+$url+'"]').parent().attr('data-sbmn');
          $('a[href="'+$url+'"]').parent().fadeIn(0);
        }
      } 
    });
  }

</script>

<script>
  (function(){
    // fancy alert
    $.mialert = function(){
      
    };
  })(jQuery);
</script>

<script>
  /*$(document).on('mouseover','input',function(){
    if($('input').prop('type') != 'date' ) {
        // $('input[type="date"]').datepicker();
        $('.datepicker').datepicker();
    }
  });*/
</script>

<script>
// plugin validacion de campos x tipo y por data-validate=
(function(){
  $(document).on('mouseenter','[type="date"],[datepicker]',function(){ $$ = this; $this = $(this); 
    $type = $this.attr('type');
    // en caso sea un date. 

    $val = $this.val();

    if($type == 'date' && $($this).prop('type') != 'date' ) {
      $('[datepicker]').removeClass('hasDatepicker');
      $('[datepicker]').datepicker({ dateFormat: 'dd-mm-yy',minDate: ($this.attr('data-fechamin') || null), maxDate: ($this.attr('data-fechamax') || null) });
      // $('[datepicker]').datepicker('option', {dateFormat: 'dd/mm/yy'}); // {changeMonth: true,changeYear: true}
    }

    if($this.val() == ''){$this.val($val);}

  });

  $(document).on('change','input[type="checkbox"]',function(){ $$ = this; $this = $(this); to = $this.attr('active-to'); $to = $(to);
    $this.is(':checked') ? $to.removeAttr('disabled') : $to.attr('disabled','disabled'); $this.val($this.is(':checked') ? 1 : 0);
  });

  $(document).on('keypress','[type="number"]',function(e){ $$ = this; $this = $(this);
    $especiales = [8,9,35,36,37,39,46,13,186];
    if(jQuery.inArray(e.keyCode,$especiales) > -1){
        return true;
    }

    numeros         = /[0-9]/;
    console.log(numeros.test(e.key));
    return parseInt(e.key) >= 0 ? true : false;
  });

  $(document).on('keypress','[validate]',function(e){ $$ = this; $this = $(this);
    arrRules = $this.attr('validate').split('|');
    $inp     = $this;

    if(jQuery.inArray('float',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46,13,32,186];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      if(parseInt(e.key)>=0){
          return true;
      }else if(e.key == '.' && $inp.val().indexOf('.')<0){
          return true;
      }else{
          return false;
      }
    }

    if(jQuery.inArray('number',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46,13,32,186];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      numeros         = /[0-9]/;
      console.log(numeros.test(e.key));
      return parseInt(e.key) >= 0 ? true : false;

    }

    if(jQuery.inArray('alpha',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46,13,32,186];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      alpha         = /[A-Za-záéíóúñÑ ]/;
      return alpha.test(e.key) ? true : false;
    }

    if(jQuery.inArray('alpha_numeric',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46,13,32,186];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      alpha_numeric         = /[0-9A-Za-z #°-]/;
      return alpha_numeric.test(e.key) ? true : false;
    }



    if(jQuery.inArray('tel',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      if(parseInt(e.key)>=0){
          return true;
      }else{
          return false;
      }
    }

    if(jQuery.inArray('cel',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }

      if(parseInt(e.key)>=0){
          return true;
      }else{
          return false;
      }
    }

    if(jQuery.inArray('e-mail',arrRules)>-1){
      $especiales = [8,9,35,36,37,39,46,13,32,186];
      if(jQuery.inArray(e.keyCode,$especiales) > -1){
          return true;
      }


      if($this.val() =='' && e.charCode == 64){
        return false;
      }else if($this.val().length<1){  console.log('meno q 1');
        email         = /[A-Za-z]/;
        return email.test(e.key) ? true : false;
      }else if($this.val().indexOf('@')>-1){ console.log('ya existe @');
        email         = /[A-Za-z0-9.-_]/;
        return email.test(e.key) ? true : false;
      }else if($this.val().length>=1){ console.log('puedo @');
        email         = /[A-Za-z0-9.-_@]/;
        return email.test(e.key) ? true : false;
      }else{ return false; }
      
    }



  });

  /*$(document).on('keyup','[validate]',function(){ $$ = this; $this = $(this);
    arrRules = $this.attr('validate').split('|');
    $inp     = $this;

    if(jQuery.inArray('e-mail',arrRules)>-1){
      if($inp.val()=='@'){
        $inp.val('');
      }
    }
  });*/

  $(document).on('focusout','[validate]',function(){ $$ = this; $this = $(this);
    arrRules = $this.attr('validate').split('|');
    $inp     = $this;

    if(jQuery.inArray('trim',arrRules)>-1){
      $inp.val($.trim($this.val()));
    }

  });

// Insert Valie Checed 1 - 0

$(document).on('change','[type="checkbox"][ischeck]',function(){ $$ = this; $this = $(this); 
	$this.val($this.is(':checked') ? 1 : 0);
});

})(jQuery,document,window);


(function(){
	$(document).on('change','[fechamin-to]',function(){ $$ = this; $this = $(this);
		$to = $($this.attr('fechamin-to'));
		$to.attr('data-fechamin',$this.val());

		fechaIn 	= parseInt($this.val().split('-').join(''));
		fechaOut	= parseInt($to.val().split('-').join(''));

		if(fechaIn > fechaOut){ $to.val($this.val()); }
	});

  $(document).on('change','[fechamax-to]',function(){ $$ = this; $this = $(this);
    $to = $($this.attr('fechamax-to'));
    $to.attr('data-fechamax',$this.val());

    fechaIn   = parseInt($this.val().split('-').join(''));
    fechaOut  = parseInt($to.val().split('-').join(''));

    if(fechaIn < fechaOut){ $to.val($this.val()); }

  });
})(jQuery,document,window);
  
</script>

<script>
  (function(){
    $(document).on('keyup','[data-maxcant]',function(e){ $$ = this; $this = $(this);
      $value    = parseInt($this.val()||0);
      $maxvalue = parseInt($this.attr('data-maxcant')||0);
      console.log([$value,$maxvalue]);
      if($maxvalue > 0 && (parseInt($maxvalue) <= parseInt($value))){
        return true;
      }else if($maxvalue<=0){
        return true;
      }else{ alert("La Cantidad supera el Stock Actual\n ingresa una cantidad menor o igual a: "+$maxvalue); $this.val($maxvalue).focus().select(); return false; }

    });      
  })(jQuery);
</script>

<script> // cambio de plan
  (function(){
    $(document).on('mousedown','[plan-selected] option',function(e){ $this = $(this);
      $exist_items = $('[item]').length;
      if($exist_items > 0){
        if(confirm('existen items creados, al Cambiar de Plan, se eliminaran.\nDeseas continuar?')){
          $('[item]').remove();
          $this.parent().children('[selected]').removeAttr('selected');
          $this.attr('selected','selected').select();
          $('#btn-additem').focus();
          $("[plan-selected]").selectedIndex($this.val());
        }else{
          e.preventDefault();
          $('#btn-additem').focus();
          return false;
        }
      }
    });

    /*$(document).on('change','[plan-selected]',function(e){ $$ = this; $this = $(this); console.log($this); e.preventDefault();
      
    });*/
  })(jQuery);
</script>

<script>
  function _popup(tipo){
    switch(tipo){
      case 'newProveedor' : 
            alert('en construccion..');
            break;
      default             : return false;
    }
  }
</script>


<script> // developer use script
  (function(){
    $(document).on('submit','form',function(){ $this = $(this);
      var action = $this.attr('action');
      console.log([action]);
      console.log([$this.serializeArray()]);
    });
  });
</script>