  <div class="modal fade modal_protesis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Protesis</h4>
                </div>
               
                 <div class="modal-body">
                    <select id="select2-1" class="form-control">
                        @foreach($protesis as $protesi)   
                            <option value="">Seleccionar Protesis</option>
                            <option value="{{$protesi->id}}" data-protesis-name="{{$protesi->fullname}}">{{$protesi->fullname}}</option>
                        @endforeach
                    </select>
                             

                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_protesis" data-dismiss="modal" >Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

            </div>
        </div>
    </div>