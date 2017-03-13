@if(is_null($elConc))
    <br>
    <h5> No hay Concentrado que Mostrar</h5>
@else
    <table class="table table-striped" style="font-size:8pt;">
        <thead>
        <tr>
            <th>Informa</th>
            <th>Periodo</th>
            <th>Sintesis</th>
        </tr>
        </thead>
        <tbody>
        @foreach($elConc as $Conc)
            <tr class="gradeA">
                <td>{{$Conc->testigo}}</td>
                <td>{{$Conc->perido}}</td>
                <td>{{$Conc->sintesis}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="separator"></div>
    <script type="text/javascript">
        $("#dvResultados").niceScroll();
    </script>
@endif