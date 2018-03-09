<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal">
    <em class="fa fa-plus-square text-success"></em>
    Crear Nota
</button>



@section('modal')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalles de la prestación cancelada </h4>
            </div>
            {!! Form::open(['route'=>'prestaciones.cancelar']) !!}
            <div class="modal-body">
              {!! Form::label('Observación') !!}
              {!! Form::textarea('observaciones',null,['class'=>'form-control observaciones']) !!}
              {!! Form::hidden('prestacion_id') !!}
            </div>
            <div class="modal-footer">
                {!! Form::submit('Guardar',['class'=>'btn ']) !!}
            </div>
             {!! Form::close() !!}
        </div>
    </div>
</div>    

<div  id="modal" class="modal fade" tabindex="" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Nota</h4>
            </div>
            <div class="modal-body">
                {!!  Form::open(['route'=>'casos.nueva.nota'])!!}
                {!!  Form::hidden('casos_id', $caso->id) !!}

                <div class="form-group">
                    {!!  Form::label('Detalle') !!}
                    {!!  Form::textArea('msg',null,['class'=>'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                {!!  Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection






@section('javascript')
<script type="text/javascript">
  $('#myModal').on('show.bs.modal', function(e) {
   
    //get data-id attribute of the clicked element
    var prestacion_id = $(e.relatedTarget).data('id');
    //populate the textbox
    $(e.currentTarget).find('input[name="prestacion_id"]').val(prestacion_id);

    $.ajax({
      url:  'prestaciones/getObservacion',
      type: 'post',
      data: 'prestacion_id='+prestacion_id,
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(result){
          $('.observaciones').empty();
          $('.observaciones').append().val(result.observaciones);
        }
    });

  });
  /*
    $('.msgCerrar').click(function(){
       if(!confirm('Desea Cerrar este caso?'))
           return false;  
    });
    $('.msgAnular').click(function(){
       if(!confirm('Desea Anular este caso?'))
           return false;  
    });
    */

</script>
@endsection