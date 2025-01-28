import requests
import concurrent.futures
import time

base_url = 'http://127.0.0.1:8000/api/'

endpoints = [
    {'url': f"{base_url}bandas", 'tipo': 'Carga'},
    {'url': f"{base_url}bandas/1", 'tipo': 'Estrés'},
    {'url': f"{base_url}generos", 'tipo': 'Capacidad'},
    {'url': f"{base_url}generos/1", 'tipo': 'Carga'},
]

resultados = []

def realizar_solicitud(endpoint, peticion, resultados):
    """
    Realiza una solicitud HTTP GET al endpoint especificado y mide su rendimiento.
    """
    inicio = time.time()
    try:
        respuesta = requests.get(endpoint['url'])
        fin = time.time()
        tiempo_respuesta = (fin - inicio) * 1000
        
        if respuesta.status_code == 200:
            resultados['exitos'] += 1
            resultados['tiempos_respuesta'].append(tiempo_respuesta)
        else:
            resultados['fallos'] += 1
    except requests.exceptions.RequestException:
        fin = time.time()
        resultados['fallos'] += 1

        # Registrar un tiempo ficticio en caso de fallo
        resultados['tiempos_respuesta'].append((fin - inicio) * 1000)

def pruebas_carga_estres_capacidad():
    num_peticiones = 30 
    resumen = []

    for endpoint in endpoints:
        print(f"Realizando prueba de {endpoint['tipo']} para el endpoint: {endpoint['url']}")

        resultados = {
            'endpoint': endpoint['url'],
            'prueba': endpoint['tipo'],
            'concurrentes': num_peticiones,
            'exitos': 0,
            'fallos': 0,
            'tiempos_respuesta': []
        }

        with concurrent.futures.ThreadPoolExecutor(max_workers=num_peticiones) as ejecutor:
            tareas_pendientes = [
                ejecutor.submit(realizar_solicitud, endpoint, i, resultados)
                for i in range(num_peticiones)
            ]

            for tarea in tareas_pendientes:
                tarea.result()

        if resultados['tiempos_respuesta']:
            tiempo_promedio = sum(resultados['tiempos_respuesta']) / len(resultados['tiempos_respuesta'])
            tiempo_maximo = max(resultados['tiempos_respuesta'])
        else:
            tiempo_promedio = tiempo_maximo = 0

        tasa_exito = (resultados['exitos'] / num_peticiones) * 100

        resumen.append({
            'Endpoint': resultados['endpoint'],
            'Prueba': resultados['prueba'],
            'Usuarios Concurrentes Soportados': resultados['concurrentes'],
            'Tiempo de Respuesta Promedio (ms)': round(tiempo_promedio, 2),
            'Tiempo de Respuesta Máximo (ms)': round(tiempo_maximo, 2),
            'Tasa de Éxito (%)': round(tasa_exito, 2)
        })

    print("\nResultados de las pruebas:")
    for resultado in resumen:
        print(resultado)

pruebas_carga_estres_capacidad()
