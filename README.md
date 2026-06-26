<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

probando

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Reglas de negocio

- El usuario debe estar registrado y autenticado para iniciar el flujo de checkout.
- El stock se controla de manera dinámica por variante y talle de producto.
- Solo los usuarios con privilegios administrativos (`is_admin = 1`) pueden acceder a las rutas del panel de control.
- Los pedidos se inicializan de forma automatizada con el estado "Pendiente".

---

# Autor

Desarrollado por Axel Joel Gomez y Tiago Ivan Tomasella.


# Manual de Usuario y Documentación Técnica — STANLEE SIN
**Plataforma E-Commerce "Street-Tech" de Objetos de Diseño e Indumentaria**
Versión 1.0 | Junio 2026

---

## Índice

1. [Introducción](#1-introducción)
2. [Registro e Inicio de Sesión](#2-registro-e-inicio-de-sesión)
3. [Navegación General y Arquitectura](#3-navegación-general-y-arquitectura)
4. [Catálogo de Productos](#4-catálogo-de-productos)
5. [Detalle de Producto](#5-detalle-de-producto)
6. [Carrito de Compras](#6-carrito-de-compras)
7. [Proceso de Compra (Checkout)](#7-proceso-de-compra-checkout)
8. [Mis Pedidos (Cliente)](#8-mis-pedidos-cliente)
9. [Sistema Interno de Consultas](#9-sistema-interno-de-consultas)
10. [Panel de Administración (Crew)](#10-panel-de-administración-crew)
11. [Especificación de Requisitos de Software (ERS)](#11-especificación-de-requisitos-de-software-ers)
12. [Modelo de Datos y Arquitectura MVC](#12-modelo-de-datos-y-arquitectura-mvc)
13. [Políticas de Seguridad e Integridad de Datos](#13-políticas-de-seguridad-e-integridad-de-datos)
14. [Matriz de Trazabilidad de Requisitos](#14-matriz-de-trazabilidad-de-requisitos)
15. [Casos de Uso Principales](#15-casos- de-uso-principales)
16. [Instrucciones para Levantar el Proyecto](#16-instrucciones-para-levantar-el-proyecto)
17. [Rutas de la Aplicación y API Endpoints](#17-rutas-de-la-aplicación-y-api-endpoints)
18. [Resolución de Problemas Comunes](#18-resolución-de-problemas-comunes)

---

## 1. Introducción

**StanLee Sin** es una plataforma web de comercio electrónico bajo el concepto estético *Street-Tech*. El sistema permite la indexación dinámica de productos de diseño de alta resistencia (termos, vasos, indumentaria urbana), la persistencia de carritos de compra, la gestión de órdenes y un canal de comunicación directo donde el staff de administración puede interactuar con las consultas entrantes sin depender de clientes de correo externos.

El core de la aplicación se enfoca en brindar una experiencia de usuario rápida, robusta y altamente estilizada con tipografías monoespaciadas, paletas oscuras y detalles en neón magenta, rompiendo con el esquema clásico de los e-commerce convencionales.

**URL de acceso local:** `http://localhost:8000` o `http://127.0.0.1:8000`

---

## 2. Registro e Inicio de Sesión

### Registrarse
1. El usuario debe navegar al endpoint `/login` o presionar el control de acceso en la barra superior del sitio.
2. Completar los campos requeridos en el formulario de alta: Nombre Completo, Correo Electrónico (`email`), Contraseña y confirmación de contraseña.
3. Al procesar el formulario, el controlador intercepta la petición HTTP y valida la integridad de los datos (formato de correo, unicidad en la base de datos y longitud mínima de la clave).
4. El sistema aplica un algoritmo de hash criptográfico (Bcrypt) a la contraseña para su almacenamiento seguro, persiste el registro en la tabla correspondiente y genera la sesión automatizada, redirigiendo al home.

### Iniciar sesión
1. El usuario ingresa sus credenciales registradas (Email y Contraseña) en el formulario de Login de la ruta `/login`.
2. Al presionar el control de acceso, el framework valida las credenciales realizando una comparación de hashes en la base de datos.
3. Si los datos coinciden, el sistema inicializa la sesión activa del usuario y almacena el token de sesión en el ciclo de vida del navegador, habilitando los módulos de compra protegidos.

### Cerrar sesión
- El usuario presiona el control de desconexión en el menú superior. El controlador destruye la sesión en el servidor, invalida los tokens de seguridad y redirige a la raíz de la plataforma de forma segura.

---

## 3. Navegación General y Arquitectura

La interfaz pública emplea una plantilla base unificada que implementa Bootstrap y una hoja de estilos personalizada con identidad *Street-Tech*.

| Sección | Endpoint / Ruta | Descripción Funcional |
|---|---|---|
| Inicio | `/` | Vista principal, presentación de marca, banners estéticos y destacados. |
| Quiénes Somos | `/about` | Identidad corporativa, historia de la Crew de desarrollo y valores. |
| Catálogo | `/catalogo` | Despliegue de la grilla dinámica de productos disponibles en el sistema. |
| Comercialización | `/comercializacion` | Políticas de pago, logística de distribución, costos y tiempos de entrega. |
| Contacto / Consultas| `/contacto` | Interfaz interactiva de soporte con formulario de consultas directo. |

El **ícono de carrito** (🛍️) en la barra superior funciona de forma global. Muestra la cantidad de productos agregados en tiempo real y despliega el panel lateral interactivo sin recargar la página.

---

## 4. Catálogo de Productos

Desplegado en `/catalogo`, renderiza las tarjetas de productos de manera dinámica consumiendo los datos almacenados en el RDBMS MySQL.
- Cada tarjeta implementa la estética de la marca utilizando bordes de neón magenta y tipografía monoespaciada.
- Presenta de forma clara: Imagen del producto, nombre, categoría, precio formateado en moneda local y badges interactivos de disponibilidad.
- **Filtros interactivos:** El usuario puede filtrar de forma reactiva las camisetas u objetos de diseño por categoría: Todos, Termos, Vasos, Indumentaria y Ofertas.

---

## 5. Detalle de Producto

Al invocar `/detalle/{id}`, el controlador inyecta la instancia del modelo en la vista:
- **Selector de Variables (Talles/Medidas):** Renderiza dinámicamente las variantes con existencias. Aquellas variantes cuyo stock sea igual a cero (`0`) se deshabilitan por completo aplicando una línea diagonal visual para guiar al usuario.
- **Indicador de Stock Crítico:**
  - 🟢 Estado Verde: Disponibilidad normal (10+ unidades).
  - 🔴 Estado Rojo: Alerta de stock crítico (menos de 10 unidades). Sirve para apurar la decisión de compra del cliente.
- El botón de acción "Agregar al carrito" permanece bloqueado por lógica en la vista hasta que el usuario determine el talle o medida exacta a adquirir.

---

## 6. Carrito de Compras

- Se despliega mediante un contenedor lateral dinámico (`offcanvas`) para no interrumpir la navegación del usuario.
- Muestra la lista detallada de productos agregados con su respectiva imagen miniatura, nombre del ítem, talle seleccionado y precio unitario.
- Permite la remoción de elementos individuales mediante un botón de eliminación (🗑️), recalculando las sumatorias, subtotales y costos asociados en tiempo real.
- **Persistencia:** Mantiene el estado de los ítems en el almacenamiento local (`localStorage`), garantizando la persistencia de la estructura de compra del cliente aun si cierra el navegador por accidente o refresca la pestaña. 

---

## 7. Proceso de Compra (Checkout)

Al acceder a la ruta protegida `/confirmar-compra` (la cual requiere de forma obligatoria una sesión activa), el sistema inicializa el asistente de checkout desglosado en capas de datos estructuradas:

**Paso 1 — Datos de Envío**
El cliente debe completar un formulario obligatorio de residencia y localización que incluye: Teléfono de contacto, Dirección de calle, Ciudad, Provincia y Código Postal (CP)[cite: 1]. El sistema aplica validaciones en el controlador para asegurar que los campos no se envíen vacíos[cite: 1].

**Paso 2 — Métodos de Envío**
El usuario puede seleccionar entre tres prestadores logísticos con costos diferenciados e integrados al total:
- **OCA:** Plazo de 2 a 5 días hábiles. Costo adicional de $2.800[cite: 1].
- **Correo Argentino:** Plazo de 5 a 10 días hábiles. Costo adicional de $1.800[cite: 1].
- **Retiro Presencial:** Coordinación directa en showroom. Plazo de 24 horas hábiles sin costo (Gratis)[cite: 1].

**Paso 3 — Confirmación de la Orden**
Al presionar el botón de confirmación de pedido, el controlador abre una transacción de base de datos[cite: 1]. Inserta el registro del encabezado en la tabla `pedidos` (con estado inicial "pendiente")[cite: 1], itera los ítems del carrito para poblar la tabla relacional `detalle_ventas`[cite: 1], decrementa de forma correspondiente las unidades del stock por variante en el inventario y vacía el `localStorage` del carrito automáticamente, ofreciendo una pantalla de éxito[cite: 1].

---

## 8. Mis Pedidos (Cliente)

Espacio privado de auditoría comercial ubicado en el endpoint `/pedidos`[cite: 1]:
- Muestra una lista secuencial de todas las transacciones realizadas por el usuario ordenadas cronológicamente[cite: 1].
- Cada registro expone un desglose detallado de los productos adquiridos, talle, precio histórico, costo de envío y observaciones de entrega[cite: 1].
- Implementa un componente visual (Timeline) que lee el estado actual del pedido en la base de datos para reflejar la fase logística real: `Pendiente` ➔ `En preparación` ➔ `En camino` ➔ `Entregado`[cite: 1].

---

## 9. Sistema Interno de Consultas

La plataforma cuenta con un canal de soporte interactivo integrado que rompe la dependencia con gestores externos de correo:
- Ubicado en la vista pública de Contacto/Consultas, captura de forma obligatoria los datos del remitente: Nombre, Apellido, Email, Asunto y el cuerpo del Mensaje[cite: 1].
- Al ser procesado por el controlador, el Request valida los campos obligatorios[cite: 1]. Si la validación es correcta, los datos se insertan directamente en la tabla `contactos` con el atributo booleano de control `leido = 0` y la columna de texto `respuesta_admin = NULL`[cite: 1].

---

## 10. Panel de Administración (Crew)

Módulo restringido y protegido mediante un middleware personalizado de control de acceso que evalúa la condición del usuario logueado en la base de datos (`is_admin == 1`)[cite: 1]. Si un usuario común intenta forzar la URL, el sistema interrumpe la petición HTTP y lo redirige con un código de acceso denegado[cite: 1].

### Secciones del Panel

| Submódulo | Endpoint / Ruta | Función Técnica |
|---|---|---|
| Central de Control | `/admin` | Métricas generales del sistema, volumen de ventas y KPI de rendimiento[cite: 1]. |
| ABM Productos | `/admin/productos` | Operaciones CRUD completas (Crear, Leer, Actualizar, Eliminar) sobre productos e imágenes[cite: 1]. |
| Pedidos Pendientes | `/admin/pedidos` | Monitoreo en tiempo real, filtrado y mutación de estado de órdenes de compra entrantes[cite: 1]. |
| Gestión Usuarios | `/admin/usuarios` | Control de padrón de clientes, auditoría de registros y alteración de privilegios administrativos[cite: 1]. |
| Central Consultas | `/admin/consultas` | Lectura, filtrado por estado de lectura y respuesta directa de consultas de soporte[cite: 1]. |

### Gestión y Respuesta de Consultas
- Al ser seleccionada una consulta específica por la Crew para su visualización, el método del controlador conmuta automáticamente el campo `leido = 1` en la fila de MySQL[cite: 1].
- La interfaz despliega un cuadro de texto interactivo donde el administrador escribe la contestación formal[cite: 1]. Al presionar "Guardar respuesta", se ejecuta una petición `PATCH` que guarda el texto en la columna `respuesta_admin`, archivando el mensaje y removiéndolo de la bandeja de entrada prioritaria[cite: 1].

---

## 11. Especificación de Requisitos de Software (ERS)

### 11.1 Propósito y Alcance
Este documento define con rigurosidad académica los requerimientos funcionales y de rendimiento para la plataforma StanLee Sin[cite: 1]. El sistema abarca el ciclo completo de experiencia del usuario final en la interfaz pública y el backend administrativo enfocado en el procesamiento seguro de datos comerciales[cite: 1].

### 11.2 Requisitos Funcionales (RF)
* **RF-01 [Autenticación de Sesiones]:** El sistema debe validar el inicio de sesión comparando de forma criptográfica las credenciales con los hashes de la tabla `users`[cite: 1].
* **RF-02 [Middleware de Seguridad]:** Las rutas administrativas `/admin/*` deben rechazar peticiones HTTP que no provengan de una sesión activa donde `is_admin` sea estrictamente igual a `1`[cite: 1].
* **RF-03 [Filtro de Catálogo]:** El sistema debe permitir el filtrado reactivo de las tarjetas de productos según su categoría lógica asignada en la base de datos[cite: 1].
* **RF-04 [Bloqueo de Stock por Variante]:** La interfaz de detalle debe deshabilitar la selección de variantes y talles que cuenten con stock igual a cero (`0`) en la base de datos[cite: 1].
* **RF-05 [Tratamiento de Consultas]:** El sistema debe almacenar las consultas entrantes en la tabla `contactos` permitiendo su lectura y mutación de estado desde el panel[cite: 1].
* **RF-06 [Despacho de Pedidos]:** El administrador debe poder ejecutar un `PATCH` sobre la tabla `pedidos` para cambiar el estado de `pendiente` a `despachado`[cite: 1].
* **RF-07 [Conmutación de Roles]:** El sistema debe proveer un control binario para invertir el bit de la columna `is_admin` de cualquier usuario registrado, excluyendo al administrador logueado para evitar bloqueos internos[cite: 1].

### 11.3 Requisitos No Funcionales (RNF)
* **RNF-01 [Rendimiento de Carga]:** Las vistas renderizadas del lado del servidor (SSR) deben responder en un tiempo de carga inferior a los 3 segundos en condiciones de conectividad estándar[cite: 1].
* **RNF-02 [Arquitectura Desacoplada]:** La aplicación debe estructurarse bajo el patrón arquitectónico Modelo-Vista-Controlador (MVC), asegurando la correcta separación de responsabilidades[cite: 1].
* **RNF-03 [Abstracción de Datos]:** Las transacciones de datos deben ser procesadas utilizando el ORM Eloquent, mitigando vulnerabilidades de inyección SQL mediante sentencias parametrizadas automatizadas[cite: 1].
* **RNF-04 [Seguridad de Contraseñas]:** Los datos sensibles de acceso deben persistirse aplicando un algoritmo de hashing unidireccional Bcrypt con una ronda de costos adaptada al servidor[cite: 1].
* **RNF-05 [Diseño Adaptativo]:** La interfaz de usuario debe garantizar la usabilidad en dispositivos móviles y de escritorio (Mobile-First) manteniendo la consistencia de estilos a través de Bootstrap[cite: 1].

---

## 12. Modelo de Datos y Arquitectura MVC

El sistema procesa la información desacoplando las responsabilidades en capas lógicas bien definidas bajo el patrón **Modelo-Vista-Controlador (MVC)**, garantizando la mantenibilidad y escalabilidad del código fuente:

- **La Capa de Datos (MySQL):** Centraliza las tablas relacionales administradas desde **DBeaver** (`users`, `pedidos`, `detalle_ventas`, `contactos`)[cite: 1]. Las relaciones se gobiernan mediante claves primarias y foráneas, asegurando la integridad referencial[cite: 1].
- **La Capa del Modelo (Eloquent ORM):** Actúa como un mapeo objeto-relacional (ORM)[cite: 1]. Traduce cada tabla de MySQL a una clase de PHP (como `User.php`, `Pedido.php` y `Contacto.php`)[cite: 1]. Mapea las columnas como objetos manipulables en memoria y gestiona la persistencia automática de datos mediante el método `$model->save()`[cite: 1].
- **La Capa del Controlador (`AdminController`):** Coordina el flujo de control y gobierna la lógica de negocio[cite: 1]. Intercepta las peticiones HTTP (Requests) derivadas por el enrutador (`web.php`), ejecuta las reglas de validación, evalúa los permisos de sesión mediante middlewares y manipula los modelos para alterar o leer estados del sistema[cite: 1].
- **La Capa de la Vista (Blade):** Procesa el renderizado HTML dinámico del lado del servidor (SSR)[cite: 1]. Utiliza directivas estructurales (`@foreach`, `@if`, `@extends`) para transformar colecciones de objetos puros en la interfaz gráfica interactiva con identidad *Street-Tech*[cite: 1].

---

## 13. Políticas de Seguridad e Integridad de Datos

La plataforma implementa tres capas estrictas de seguridad nativas del framework para mitigar vulnerabilidades críticas estipuladas en el estándar internacional OWASP Top 10:

1. **Protección contra Inyección SQL (SQLi):** Al utilizar el ORM Eloquent, todas las consultas a la base de datos MySQL emplean parametrización y preparación de variables automatizada en segundo plano[cite: 1]. Ningún dato ingresado por el usuario en formularios es concatenado directamente en sentencias SQL nativas, neutralizando ataques de escape de caracteres[cite: 1].
2. **Protección contra Falsificación de Peticiones en Sitios Cruzados (CSRF):** Todos los formularios de la aplicación que realizan mutaciones de estado en la base de datos mediante métodos HTTP de escritura (`POST`, `PATCH`, `DELETE`) incluyen obligatoriamente la directiva `@csrf`[cite: 1]. Esto genera un token criptográfico aleatorio de un solo uso que valida en el servidor que la petición se originó legítimamente desde la sesión del usuario dentro del dominio de la aplicación[cite: 1].
3. **Mitigación de Ataques XSS (Cross-Site Scripting):** El motor de plantillas Blade escapa de forma automática cualquier cadena de texto renderizada mediante la sintaxis de llaves dobles `{{ $variable }}`[cite: 1]. Si un usuario intenta inyectar código JavaScript malicioso a través de los campos del formulario de contacto o registro, el sistema lo transforma en texto plano inofensivo al mostrarlo en el panel administrativo de la Crew[cite: 1].

---

## 14. Matriz de Trazabilidad de Requisitos

Esta matriz vincula formalmente los objetivos del software con los componentes físicos del código y la persistencia de datos, demostrando académicamente que cada requerimiento funcional está respaldado por el sistema[cite: 1].

| ID Requisito | Descripción Funcional | Capa de Persistencia (Tabla MySQL) | Controlador Responsable | Caso de Uso Vinculado |
| :--- | :--- | :--- | :--- | :--- |
| **RF-01** | Autenticación y hash criptográfico de credenciales[cite: 1]. | Tabla `users` / `usuarios`[cite: 1]. | `AuthController` / `LoginController`[cite: 1]. | Acceso seguro al sistema de usuarios[cite: 1]. |
| **RF-02** | Middleware de restricción estricta de la Crew[cite: 1]. | Tabla `users` (columna `is_admin = 1`)[cite: 1]. | `AdminMiddleware`[cite: 1]. | Acceso restringido al panel administrativo[cite: 1]. |
| **RF-05** | Tratamiento, guardado y respuesta de consultas[cite: 1]. | Tabla `contactos`[cite: 1]. | `AdminController`[cite: 1]. | CU-02 (Responder Soporte Interno)[cite: 1]. |
| **RF-06** | Despacho y actualización de órdenes pendientes[cite: 1]. | Tabla `pedidos` y `detalle_ventas`[cite: 1]. | `AdminController`[cite: 1]. | CU-01 (Procesamiento de Órden de Compra)[cite: 1]. |
| **RF-07** | Conmutación lógica binaria de rangos administrativos[cite: 1]. | Tabla `users` (atributo `is_admin`)[cite: 1]. | `AdminController`[cite: 1]. | Auditoría y control de staff de la Crew[cite: 1]. |

---

## 15. Casos de Uso Principales

### CU-01: Procesamiento de Órden de Compra
**Actor:** Cliente Autenticado[cite: 1].  
**Precondición:** Sesión activa, carrito de compras local con stock verificado por variante[cite: 1].
1. El cliente inicia el flujo en la vista protegida de checkout `/confirmar-compra`[cite: 1].
2. El cliente completa el formulario de localización y logística de envío (dirección, CP, provincia)[cite: 1].
3. Selecciona el método de distribución correspondiente (el sistema recalcula el total final en caliente)[cite: 1].
4. Presiona el botón de confirmación de pedido[cite: 1].
5. El controlador intercepta la petición HTTP, ejecuta las reglas de validación sobre los campos de envío e inserta el encabezado en la tabla `pedidos` con estado inicial "pendiente"[cite: 1].
6. El sistema recorre la colección de ítems del carrito, inserta los registros hijos en la tabla relacional `detalle_ventas` y descuenta las unidades correspondientes del stock físico por talle[cite: 1].
7. El sistema vacía el almacenamiento local (`localStorage`) del carrito y redirige al historial `/pedidos` con una confirmación de éxito[cite: 1].
**Postcondición:** Pedido registrado con persistencia en la base de datos relacional y decremento del stock en inventario[cite: 1].

### CU-02: Respuesta Interna a Consulta de Soporte
**Actor:** Administrador de la Crew[cite: 1].  
**Precondición:** Sesión autenticada con rango administrativo habilitado (`is_admin = 1`)[cite: 1].
1. El administrador accede a la central de consultas ingresando al submódulo `/admin/consultas`[cite: 1].
2. El sistema carga los registros de la tabla `contactos` desde el controlador[cite: 1].
3. El administrador selecciona un mensaje específico con badge "NUEVO"[cite: 1].
4. Al abrirse el detalle, el método del controlador conmuta automáticamente la columna `leido = 1` en la fila de MySQL para marcarlo como procesado[cite: 1].
5. El administrador redacta la contestación en el campo de texto interactivo de la interfaz[cite: 1].
6. Presiona el botón "Guardar respuesta", gatillando una petición HTTP con el método seguro `PATCH` hacia la ruta asignada[cite: 1].
7. El controlador valida el texto, actualiza el campo `respuesta_admin` e impacta los cambios en DBeaver (`$contacto->save()`), archivando el hilo de manera definitiva[cite: 1].
**Postcondición:** Consulta guardada con persistencia relacional y removida de la bandeja de entrada prioritaria[cite: 1].

