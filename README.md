# RPS Web App

Aplicación web desarrollada en Laravel para la gestión de servicios, inscripciones y generación de certificados.

## Funcionalidades principales

- **Gestión de servicios:**  
  Crea y administra tipos de servicios y servicios asociados.

- **Inscripciones:**  
  Permite registrar inscripciones de usuarios a servicios, almacenando información relevante del cliente.

- **Certificados:**  
  Genera certificados únicos para cada inscripción, con código aleatorio y fecha de expiración automática.

- **Gestión de usuarios (Admin):**  
  Permite a administradores crear, listar y gestionar usuarios desde el panel de administración.

- **Autenticación y control de acceso:**  
  Acceso protegido a rutas administrativas mediante autenticación.  
  Redirección automática a `/adminonline/` si no se ha iniciado sesión.

- **Login personalizado:**  
  Vista de login para administradores en `/adminonline/`.

- **Mensajes de error en español:**  
  Validaciones y mensajes de error adaptados al idioma español.

## Estructura del proyecto

- **Modelos principales:**  
  - `User`: Usuarios del sistema  
  - `ServiceType`: Tipos de servicio  
  - `Service`: Servicios  
  - `Inscription`: Inscripciones a servicios  
  - `Certificate`: Certificados generados para inscripciones

- **Helpers:**  
  - `CertificateHelper`: Lógica para generación de códigos y fechas de expiración de certificados

- **Controladores:**  
  - `AdminController`: Gestión de vistas y acciones administrativas  
  - `SessionController`: Login y logout de administradores

- **Middleware personalizado:**  
  - Redirección de usuarios no autenticados a `/adminonline/`

- **Migraciones:**  
  - Estructura de base de datos para usuarios, servicios, inscripciones y certificados

## Instalación

1. Clona el repositorio.
2. Instala dependencias con `composer install`.
3. Copia `.env.example` a `.env` y configura tu base de datos.
4. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```
5. (Opcional) Ejecuta los seeders si están disponibles:
   ```bash
   php artisan db:seed
   ```

## Uso

- Accede a `/adminonline/` para iniciar sesión como administrador.
- Gestiona usuarios, servicios, inscripciones y certificados desde el panel de administración.
- Los certificados se generan con un código único y una fecha de expiración automática (12 meses por defecto).
- Los mensajes de error y validación se muestran en español.

## Contribuciones

¡Las contribuciones son bienvenidas! Por favor, abre un issue o pull request para sugerencias o mejoras.

## Licencia

Este proyecto está bajo la licencia MIT.