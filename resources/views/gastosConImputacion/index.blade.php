@extends('layouts.app', ['activePage' => 'gastosConImp', 'titlePage' => __('Comprobantes')])

@section('content')
    <div class="card">
        <div class="card-header-blue">
			<h4 class="card-title text-center">{{ __('COMPROBANTE GASTO CON IMPUTACIÓN') }}</h4>
      	</div>
			<livewire:gastos-con-imp>
      	</div>
   	</div>  
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#show').modal('hide');
        $('#create').modal('hide');
        $('#edit').modal('hide');
        $('#delete').modal('hide');
    })
</script>

<script>
   function liquidoPagable(){
    var t_autorizado = parseFloat($("#t_autorizado").val());
    var t_multas     = $('#t_multas').val();
    var t_garantias  = $('#t_garantia').val();

    var valiue = parseFloat($('#iue').val());
    var valit  = $('#it').val();
    var valret = parseFloat($('#t_retencion').val());

    var liquido = $("#liquidoP").val();  
    var factura = $('#factura').val();

    var temp_liquido = t_autorizado - t_multas - t_garantias;

    if (factura == 'SI'){
        temp_iue = 0;
        temp_it  = 0;
        temp_retencion = 0;
    }else {
        var temp_iue1 = t_autorizado * 0.125;
        var temp_iue  = temp_iue1.toFixed(2);

        var temp_it1 = t_autorizado * 0.03;
        var temp_it  = temp_it1.toFixed(2);

        temp_retencion1 = temp_iue1 + temp_it1;
        var temp_retencion = temp_retencion1.toFixed(2);
    
    }
        $('#iue').val(temp_iue);
        valiue = $('#iue').val();
    
        $('#it').val(temp_it);
        valit = $('#it').val();
    
        $('#t_retencion').val(temp_retencion);
        valret = $('#t_retencion').val();

        var  temp_liquido = temp_liquido - valret;
        var  temp_liquido = temp_liquido.toFixed(2) 

        $("#liquidoP").val(temp_liquido); 
    }

    function closeModal(){
        $('#iue').val(0);
        $('#it').val(0);
        $('#t_retencion').val(0);
        $('#liquidoP').val(0);
    }
</script>
@endsection
