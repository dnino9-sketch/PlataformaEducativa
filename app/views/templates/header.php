<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Plataforma Educativa - <?php echo $pageTitle ?? 'Inicio'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Iconos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Estilos personalizados -->
    <link href="/css/style.css" rel="stylesheet" />
</head>
<body>

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <!-- Logo e imagen -->
    <a class="navbar-brand d-flex align-items-center" href="/inicio">
      <img src="/PlataformaEducativa/img/logo.svg" alt="Logo Plataforma Educativa" width="40" height="40" class="me-2" />
      <span><strong>Plataforma</strong> <span class="text-primary">Educativa</span></span>
    </a>
    <!-- Botón colapsable para móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
      aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menú navegación -->
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'inicio' ? ' active' : ''; ?>" href="/inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'tareas' ? ' active' : ''; ?>" href="/tareas">Tareas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'calificaciones' ? ' active' : ''; ?>" href="/calificaciones">Calificaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'buzon' ? ' active' : ''; ?>" href="/buzon">Buzón de Mensajes</a>
        </li>
        <?php if (isset($_SESSION['usuario'])): ?>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><a class="dropdown-item" href="/PlataformaEducativa/perfil">Mi Perfil</a></li>
      <li><hr class="dropdown-divider"/></li>
      <li><a class="dropdown-item" href="/PlataformaEducativa/logout">Cerrar Sesión</a></li>
    </ul>
  </li>
<?php else: ?>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-primary ms-2" href="/PlataformaEducativa/login">Iniciar Sesión</a>
  </li>
<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenedor principal -->
<main class="container my-4">