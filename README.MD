# 🚀 FizzBuzz - Desarrollo Iterativo

## 📖 Estrategia de Desarrollo

Este proyecto se desarrolla de manera iterativa. 
Aunque podría haberse implementado desde el inicio utilizando **CQRS**, he optado por un enfoque progresivo, comenzando con 
una arquitectura basada en **MVC** y evolucionando gradualmente hacia una **arquitectura hexagonal**. 
En futuras iteraciones, se podrá integrar CQRS para seguir mejorando la solución.

> **Nota:** Aunque la implementación de CQRS no se abordará en esta fase debido a limitaciones de tiempo, el diseño del proyecto
> ha sido estructurado para facilitar su integración en futuras iteraciones. Si se considera oportuno, estaré encantado de explicar
> en detalle todo el proceso de desarrollo iterativo, incluyendo las decisiones tomadas que no se expresen claramente en makefile,
> commits y este propio README y los pasos siguientes para la evolución del proyecto. 🚀

El objetivo es demostrar la capacidad de desarrollo incremental, organizando el proceso en dos fases de refinamiento:

---

## 🏗️ Refinamiento Estratégico

En esta fase, el equipo de producto o negocio define el problema a resolver.

### **Descripción del problema**
Dado un rango de números enteros, se deben imprimir siguiendo estas reglas:

✅ Múltiplos de **3** → **Fizz**  
✅ Múltiplos de **5** → **Buzz**  
✅ Múltiplos de **3 y 5** → **FizzBuzz**

---

## ⚙️ Refinamiento Táctico

En esta fase se identifican posibles bloqueos y se definen las tareas necesarias para la implementación.

Se ha definido una **épica** (ficticia) llamada `FizzBuzz`, con sus respectivas tareas.
Se utilizará el prefijo `PR-` para relacionar los commits del proyecto con cada tarea (ficticia).

---

## 📌 Tareas del Desarrollo

### **🔹 PR-1: Configuración inicial**
- Instalación de dependencias esenciales:
    - `Makefile`
    - `Docker`
    - `Docker Compose`
    - `Symfony LTS`
    - `Composer`
        - `Doctrine ORM`
        - `PHPUnit`

### **🔹 PR-2: Implementación del servicio FizzBuzz**
- Desarrollo del servicio que aplicará las reglas de negocio.
- Implementación de **tests unitarios**.

### **🔹 PR-3: Creación de la entidad y migraciones**

| Campo        | Tipo       |
|-------------|-----------|
| `id`        | `UUID`    |
| `init_number` | `int`     |
| `final_number` | `int`     |
| `created_at` | `datetime` |
| `result`    | `string`   |

### **🔹 PR-4: Creación del repositorio**
- Implementación del repositorio.
- Aplicación de **tests de integración**.

### **🔹 PR-5: Creación del servicio de aplicación**
- Obtener resultado del servicio.
- Guardar los datos en la base de datos.
- Aplicación de **tests de integración**.

### **🔹 PR-6: Implementación del controlador**
- Creación del endpoint `POST /desafio/fizz/buzz`.
- Parámetros esperados en formato JSON:

```json
{
  "init_number": 1,
  "final_number": 100
}
```  
- Aplicación de **tests E2E**.

### **🔹 PR-7: Pipeline Github**

---

## ▶️ Pasos para ejecutar el proyecto

```sh
make menu        # Muestra las opciones del proyecto
make start       # Inicializa el proyecto con el servidor web
make test        # Ejecuta tests unitarios e integración
make execute     # Lanza una petición al endpoint usando CURL
```

---

## 🔜 Próximas Iteraciones

- ✅ Migración a **arquitectura hexagonal**

> **Nota:** El proyecto ha sido diseñado considerando la transición a una arquitectura hexagonal, la cual se desarrollará en una rama separada (arq-hex) para permitir una comparación clara entre las implementaciones.
