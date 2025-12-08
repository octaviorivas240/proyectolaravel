<!DOCTYPE html>
<html>
<head>
    <title>Calcular Valor del Producto</title>
</head>
<body>
    <h1>Calcular Valor del Producto</h1>

    <form method="POST" action="/calcular-producto">
        @csrf

        <label>Precio inicial:</label>
        <input type="number" step="0.01" name="precioInicial" required><br><br>

        <label>Tipo de cálculo:</label>
        <select name="tipoCalculo" required>
            <option value="depreciacion">Depreciación (10% por año)</option>
            <option value="iva">IVA (16%)</option>
            <option value="descuento">Descuento (%)</option>
            <option value="comision">Comisión (%)</option>
        </select><br><br>

        <div>
            <label>Años de uso (solo depreciación):</label>
            <input type="number" name="anos">
        </div><br>

        <div>
            <label>Descuento (%):</label>
            <input type="number" name="descuento">
        </div><br>

        <div>
            <label>Comisión (%):</label>
            <input type="number" name="comision">
        </div><br>

        <button type="submit">Calcular</button>
    </form>
</body>
</html>
