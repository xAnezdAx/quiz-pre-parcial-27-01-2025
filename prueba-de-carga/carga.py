import requests
import concurrent.futures

# Base URL del API
base_url = 'http://127.0.0.1:8000/api/'

endpoints = [
    {'url': f"{base_url}bandas", 'tipo': 'bandas'},
    {'url': f"{base_url}bandas/1", 'tipo': 'bandas/{id}'},  # ID ejemplo
    {'url': f"{base_url}generos", 'tipo': 'generos'},
    {'url': f"{base_url}generos/1", 'tipo': 'generos/{id}'},  # ID ejemplo
]

def realizar_solicitud(endpoint, peticion):
    """
    Realiza una solicitud HTTP GET al endpoint especificado.
    """
    try:
        respuesta = requests.get(endpoint['url'])
        if respuesta.status_code == 200:
            print(f"Solicitud #{peticion} al endpoint {endpoint['tipo']} exitosa!")
        else:
            print(f"Error en solicitud #{peticion} al endpoint {endpoint['tipo']}: {respuesta.status_code}")
    except requests.exceptions.RequestException as e:
        print(f"Error en solicitud #{peticion} al endpoint {endpoint['tipo']}: {e}")

num_peticiones = 30

with concurrent.futures.ThreadPoolExecutor(max_workers=num_peticiones) as ejecutor:
    tareas_pendientes = []
    for i, endpoint in enumerate(endpoints):
        for j in range(num_peticiones // len(endpoints)):
            tarea_pendiente = ejecutor.submit(realizar_solicitud, endpoint, j)
            tareas_pendientes.append(tarea_pendiente)

    for tarea_pendiente in tareas_pendientes:
        tarea_pendiente.result()

print("Todas las solicitudes han sido enviadas.")
