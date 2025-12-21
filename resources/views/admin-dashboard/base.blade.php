<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin-dashboard-components.head-link')
</head>

<body class="bg-gray-50">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 lg:hidden hidden"></div>

    <!-- Sidebar -->
    @include('admin-dashboard-components.aside')

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation Bar -->
        @include('admin-dashboard-components.header')

        <!-- Dashboard Content -->
        <main class="p-4 sm:p-6 lg:p-8">

            @yield('content')
            
        </main>
    </div>


    <script src="/js/script.js" defer></script>

</body>

</html>
