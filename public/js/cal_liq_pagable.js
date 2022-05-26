function liquidoPagable(){
  var t_autorizado=parseFloat($("#t_autorizado").val());
  var t_multas=$('#t_multas').val();

  var valiue = parseFloat($('#iue').val());
  var valit = $('#it').val();
  var valret=parseFloat($('#t_retencion').val());

  var liquido = $("#liquidoP").val();  
  var factura= $('#factura').val();

  var temp_liquido = t_autorizado - t_multas;

  if (factura == 'SI'){
    temp_iue = 0;
    temp_it = 0;
    temp_retencion = 0;
  }else {
    var temp_iue1 = t_autorizado * 0.125;
    var temp_iue=temp_iue1.toFixed(2);

    var temp_it1 = t_autorizado * 0.03;
    var temp_it=temp_it1.toFixed(2);

    temp_retencion1= temp_iue1 + temp_it1;
    var temp_retencion=temp_retencion1.toFixed(2);
  
  }
    $('#iue').val(temp_iue);
    valiue = $('#iue').val();
   
    $('#it').val(temp_it);
    valit = $('#it').val();
  
    $('#t_retencion').val(temp_retencion);
    valret = $('#t_retencion').val();

    var  temp_liquido = temp_liquido - valret;
    var  temp_liquido=temp_liquido.toFixed(2) 

    // console.log(temp_liquido);
    $("#liquidoP").val(temp_liquido); 
}

function enviarCaja(){
  var a=document.getElementById('enviar_caja'); 
  if (a.checked){ 
    $('#msjCaja').css('color','green');
    $('#msjCaja').text('Comprobante listo para caja.');
  }else{
    $('#msjCaja').css('color','red');
    $('#msjCaja').text('Una vez enviado a caja no podra editar los campos.');
  } 
}


function archivarGci(){
  var a=document.getElementById('archivar_gci'); 
  if (a.checked){ 
     // console.log(1);
    $('#msjGci').css('color','green');
    $('#msjGci').text('Comprobante listo para Archivar.');
  }else{
    $('#msjGci').css('color','red');
    $('#msjGci').text('Archivar documento, una vez archivado no podra editar los campos.');
    // console.log(0);
  } 
}

function enviarArchivar(){
  var a=document.getElementById('enviar_archivar'); 
  if (a.checked){ 
    $('#msjArchivar').css('color','green');
    $('#msjArchivar').text('Comprobante listo para registrar foja.');
  }else{
    $('#msjArchivar').css('color','red');
    $('#msjArchivar').text('Una vez enviado par archivar no podra editar los campos.');
  } 
}


// $(document).ready(function () {   
//         $('#factura').on('change', function()
//         {
//             var factura=$(this).val();
//             console.log(factura);
//         });
//       });

