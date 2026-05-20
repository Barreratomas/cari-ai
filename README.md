# Reporte de Ventas — Laravel + Docker

Reporte de ventas desarrollado en Laravel. Se optó por este framework por su simplicidad para levantar un proyecto web con conexión a base de datos de forma rápida. El código está desarrollado de manera directa y funcional, sin aplicar patrones avanzados ni capas adicionales (sin controladores, repositorios, etc.) dado que el objetivo es demostrar el reporte en sí, no la arquitectura.

---

## Requisitos

- Docker Desktop instalado y corriendo
- Docker Compose

---

## Instrucciones para correr el proyecto

**1. Clonar o descomprimir el proyecto**

```bash
cd laravel-reporte
```

**2. Crear el `.dockerignore`** en la raíz con el siguiente contenido:

```
vendor
node_modules
.git
.env
```

**3. Levantar los contenedores**

```bash
docker compose up --build
```

Esto construye la imagen, instala dependencias, genera el `APP_KEY` y levanta MySQL con los datos de prueba automáticamente.

**4. Abrir el reporte en el navegador**

```
http://localhost:8000/reporte
```

---

## Funcionalidades del reporte

- Lista todas las órdenes con producto, referencia, cliente y total
- Filtro por producto
- Filtro por cliente
- Total general al pie de la tabla

---

## Estructura relevante

```
├── Dockerfile
├── docker-compose.yml
├── database/
│   └── init.sql          # Crea tablas e inserta datos de prueba
├── routes/
│   └── web.php           # Lógica de la consulta y filtros
└── resources/views/
    └── reporte.blade.php # Vista del reporte
```

---

## Notas

- La lógica de consulta está directamente en `routes/web.php` por simplicidad. En un proyecto real aplicaría arquitecturas.
- No se usa Eloquent ni modelos, se trabaja directamente con el Query Builder de Laravel.
- Las credenciales de base de datos están definidas en el `docker-compose.yml`.