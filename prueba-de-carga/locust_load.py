from locust import HttpUser, task, between

class ApiUser(HttpUser):
    wait_time = between(1, 3)  # Tiempo de espera entre solicitudes (1-3 segundos)

    def on_start(self):
        """Se ejecuta al iniciar el usuario virtual."""
        self.headers = {
            "Content-Type": "application/json",
            "X-API-Key": "PhyImTT6rIJE2BfydEYaeED9dY0B0"  # Reemplaza con tu clave real
        }
        self.base_data = {"name": "test"}  # Datos base para los POST

    @task(3)  # Peso de esta tarea (se ejecuta más frecuentemente)
    def get_categories(self):
        """Realiza una solicitud GET al endpoint /api/categories_all."""
        response = self.client.get("/api/categories_all", headers=self.headers)
        if response.status_code != 200:
            print(f"GET /api/categories_all falló con {response.status_code}")

    @task(1)  # Peso menor que la tarea GET
    def post_categories(self):
        """Realiza una solicitud POST al endpoint /api/categories_all."""
        response = self.client.post("/api/categories_all", json=self.base_data, headers=self.headers)
        if response.status_code != 201:  # Suponiendo que el POST retorna 201
            print(f"POST /api/categories_all falló con {response.status_code}")
