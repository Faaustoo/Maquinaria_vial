<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignaciones Activas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Asignaciones activas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Máquina</th>
                <th>Tipo</th>
                <th>Proyecto</th>
                <th>Provincia</th>
                <th>Fecha inicio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->machine->serial_number }}</td>
                    <td>{{ $assignment->machine->machineType->name }}</td>
                    <td>{{ $assignment->project->name }}</td>
                    <td>{{ $assignment->project->province->name  }}</td>
                    <td>{{ \Carbon\Carbon::parse($assignment->start_date)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
