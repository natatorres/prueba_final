# 🏨 Hotel App – Sistema de gestión para Decameron

Bienvenid@ 👋 Esta es una aplicación para registrar hoteles, habitaciones y configuraciones según los criterios de negocio de Decameron Colombia.

## 📦 Tecnologías usadas

- ✅ Laravel (PHP)
- ✅ React (Frontend)
- ✅ PostgreSQL (Base de datos)
- ✅ Docker + Docker Compose (entorno completo)
- ✅ API RESTful

---

## 🚀 ¿Cómo ejecutar el proyecto paso a paso?...........

> Como si lo hiciera mi abuelita 👵

### 1️⃣ Prerrequisitos

Asegúrate de tener instalado:

- 🐳 [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- Git

---

### 2️⃣ Clona el repositorio

```bash
git clone https://github.com/tuusuario/hotel-app.git
cd hotel-app


cd backend
cp .env.example .env

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=hotel_db
DB_USERNAME=hotel_user
DB_PASSWORD=secret
