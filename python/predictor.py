import sys
import pymysql
import pandas as pd
import numpy as np

# ID del producto
id_producto = int(sys.argv[1])

# Conexión BD
conexion = pymysql.connect(
    host="localhost",
    user="root",
    password="",
    database="Predic"
)

# Consulta mensual
consulta = """
SELECT
    DATE_FORMAT(fecha, '%%Y-%%m') AS mes,
    SUM(cantidad) AS ventas
FROM movimiento
WHERE tipo='SALIDA'
AND id_producto=%s
GROUP BY DATE_FORMAT(fecha, '%%Y-%%m')
ORDER BY mes;
"""

# Cargar datos
df = pd.read_sql(consulta, conexion, params=(id_producto,))
conexion.close()

# Validación
if len(df) < 3:
    print("ERROR: No hay suficientes datos")
    sys.exit()

# Convertir a numérico
df["ventas"] = df["ventas"].astype(float)

# =========================
# 🔥 PREDICCIÓN MEJORADA
# =========================

# 1. Promedio últimos 3 meses
promedio = df["ventas"].tail(3).mean()

# 2. Tendencia simple (crecimiento)
tendencia = df["ventas"].iloc[-1] - df["ventas"].iloc[-2]

# 3. Predicción final (mezcla inteligente)
prediccion = promedio + (tendencia * 0.5)

print(round(float(prediccion), 2))  