<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Migration - Treni</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold text-primary">🚆 Elenco Treni</h1>
                <p class="text-muted">Informazioni aggiornate sui treni</p>
            </div>
        </div>

        @if ($trains->count() > 0)
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Azienda</th>
                            <th>Partenza</th>
                            <th>Arrivo</th>
                            <th>Orario Partenza</th>
                            <th>Orario Arrivo</th>
                            <th>Codice Treno</th>
                            <th>Puntuale</th>
                            <th>Cancellato</th>
                            <th>Carrozze</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trains as $train)
                            <tr>
                                <td>{{ $train->id }}</td>
                                <td>{{ $train->company }}</td>
                                <td>{{ $train->departure_station }}</td>
                                <td>{{ $train->arrival_station }}</td>
                                <td>{{ \Carbon\Carbon::parse($train->departure_time)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($train->arrival_time)->format('H:i') }}</td>
                                <td>{{ $train->train_code }}</td>
                                <td>
                                    @if ($train->on_time)
                                        <span class="badge bg-success">Sì</span>
                                    @else
                                        <span class="badge bg-warning text-dark">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($train->cancelled)
                                        <span class="badge bg-danger">Sì</span>
                                    @else
                                        <span class="badge bg-success">No</span>
                                    @endif
                                </td>
                                <td>{{ $train->carriages }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                Nessun treno disponibile al momento.
            </div>
        @endif
    </div>

</body>
</html>
