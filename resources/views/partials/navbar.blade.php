<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons (optional) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <!-- Navbar Code -->
  <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
        <div class="d-flex align-items-center">
          <!-- Additional elements can go here if needed -->
        </div>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <!-- Link for dropdown toggle -->
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="media d-flex align-items-center">
                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('assets/images/me.png') }}">
                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                  <span class="mb-0 font-small fw-bold text-gray-900">YsfAlfarabi</span>
                </div>
              </div>
            </a>
            <!-- Dropdown Menu -->
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
              <!-- Logout Button -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="dropdown-item d-flex align-items-center" type="submit">
                  <i class="fa fa-power-off me-2"></i> Logout
                </button>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap Bundle JS (including Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
