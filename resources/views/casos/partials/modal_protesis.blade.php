  <div class="modal fade modal_protesis"  role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Insumos</h4>
                </div>
               
                 <div class="modal-body">
                 
                    <select id="select2-1" class="form-control" style="width:100%;" name="select2-1">
                    <option value="">SELECCIONAR INSUMO </option>
                         @foreach($protesis as $protesi)
                         <option value="{{$protesi->id}}"> {{$protesi->fullname}}</option> 
                         @endforeach
                    </select>
                  
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_protesis" data-dismiss="modal" >Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>

            </div>
        </div>
    </div>
