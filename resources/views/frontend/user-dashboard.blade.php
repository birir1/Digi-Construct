<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-container py-12">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3 class="sidebar-title">Menu</h3>
            <ul class="sidebar-menu">
                <li><a href="#" class="sidebar-link">Home</a></li>
                <li><a href="#" class="sidebar-link">Profile</a></li>
                <li><a href="#" class="sidebar-link">Settings</a></li>
                <li><a href="#" class="sidebar-link">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh; /* Full height */
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #001F3F; /* Navy Blue */
            color: white;
            z-index: 1000; /* Ensure sidebar is above content */
        }

        .sidebar-title {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-link {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
        }

        .sidebar-link:hover {
            text-decoration: underline;
        }

        .main-content {
            margin-left: 250px; /* Adjust according to sidebar width */
            padding: 20px;
            width: calc(100% - 250px); /* Adjust width to account for sidebar */
        }
    </style>
</x-app-layout>
