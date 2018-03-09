<div>
    <div class="slimScrollDiv">
        <div class="media-box">
            @if (count($documentos) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($documentos as $documento)

                                <tr>
                                    <td><a target="_blank" href='{{route('casos.documento.download', [$documento->id,$documento->file_extension] )}}'  class="fa fa-download"></a>
                                    </td>
                                    <td> {{$documento->descripcion}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p><em class="fa fa-times-circle"></em> No hay documentos en este caso.</p>
            @endif
        </div>
    </div>
</div>









