<nav class="navbar navbar-expand-md d-print-none">
    <!-- Primary Navigation Menu -->
    <div class="container-xl">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <h4><strong>PUPQC GradeSphere</strong></h4>
        </a>

        <!-- User Menu -->
        <div class="ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex align-items-center text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <img src="{{ asset('static/avatars/000m.jpg') }}" alt="Avatar" class="rounded-circle" style="width: 32px; height: 32px;">
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <small class="text-muted">User</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<header class="navbar navbar-expand-md">
    <div class="container-xl">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>

            <!-- Students -->
            <li class="nav-item {{ request()->routeIs('students') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('students') }}">
                    <i class="bi bi-people"></i>
                    Students
                </a>
            </li>

            <!-- Gradesheets -->
            <li class="nav-item {{ request()->routeIs('gradesheets') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('gradesheets') }}">
                    <i class="bi bi-file-earmark-text"></i>
                    Gradesheets
                </a>
            </li>

            <!-- System Configuration Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="configDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear me-2"></i> <!-- Add margin right to space out the icon -->
                    System Configuration
                </a>
                <ul class="dropdown-menu" aria-labelledby="configDropdown">
                    <li><a class="dropdown-item" href="{{ route('courses') }}">Courses Setup</a></li>
                    <li><a class="dropdown-item" href="{{ route('subjects') }}">Subjects Setup</a></li>
                    <li><a class="dropdown-item" href="{{ route('curriculums') }}">Curriculum Design</a></li>
                </ul>
            </li>


        </ul>
    </div>
</header>
