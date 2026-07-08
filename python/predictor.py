import sys
import pyodbc
import pandas as pd

id_producto = int(sys.argv[1])

conexion = pyodbc.connect(
    'DRIVER={ODBC Driver 18 for SQL Server};'
    'SERVER=tu-servidor.database.windows.net;'
    'DATABASE=Predic;'
    'UID=usuario;'
    'PWD=franco102211@;'
    'Encrypt=yes;'
    'TrustServerCertificate=no;'
)

consulta = """
SELECT
    FORMAT(fecha, 'yyyy-MM') AS mes,
    SUM(cantidad) AS ventas
FROM movimiento
WHERE tipo='SALIDA'
AND id_producto=?
GROUP BY FORMAT(fecha, 'yyyy-MM')
ORDER BY mes;
"""

df = pd.read_sql(consulta, conexion, params=(id_producto,))
conexion.close()

if len(df) < 3:
    print("ERROR: No hay suficientes datos")
    sys.exit()

df["ventas"] = df["ventas"].astype(float)

promedio = df["ventas"].tail(3).mean()
tendencia = df["ventas"].iloc[-1] - df["ventas"].iloc[-2]
prediccion = promedio + (tendencia * 0.5)

print(round(float(prediccion), 2))