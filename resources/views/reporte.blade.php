<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #4a90e2; color: white; padding: 10px; }
        td { padding: 8px 10px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f5f5f5; }
        .filtros { display: flex; gap: 16px; margin-bottom: 10px; }
        select, button { padding: 8px 12px; border-radius: 4px; border: 1px solid #ccc; }
        button { background: #4a90e2; color: white; border: none; cursor: pointer; }
        .total { font-weight: bold; text-align: right; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Reporte de Ventas</h2>

    <form method="GET" action="/reporte" class="filtros">
        <select name="producto">
            <option value="">— Todos los productos —</option>
            @foreach($productos as $p)
                <option value="{{ $p }}" {{ $filtroProducto == $p ? 'selected' : '' }}>{{ $p }}</option>
            @endforeach
        </select>

        <select name="cliente">
            <option value="">— Todos los clientes —</option>
            @foreach($clientes as $c)
                <option value="{{ $c }}" {{ $filtroCliente == $c ? 'selected' : '' }}>{{ $c }}</option>
            @endforeach
        </select>

        <button type="submit">Filtrar</button>
        <a href="/reporte"><button type="button">Limpiar</button></a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Producto</th><th>Referencia</th><th>Cliente</th>
                <th>Apellido</th><th>Cantidad</th><th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ordenes as $o)
            <tr>
                <td>{{ $o->producto }}</td>
                <td>{{ $o->referencia }}</td>
                <td>{{ $o->cliente }}</td>
                <td>{{ $o->apellido }}</td>
                <td>{{ $o->cantidad }}</td>
                <td>$ {{ number_format($o->total, 0, ',', '.') }}</td>
            </tr>
            @empty
                <tr><td colspan="6" style="text-align:center">Sin resultados</td></tr>
            @endforelse
        </tbody>
    </table>

    <p class="total">
        Total general: $ {{ number_format($ordenes->sum('total'), 0, ',', '.') }}
    </p>
</body>
</html>