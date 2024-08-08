@extends('layouts.dashboard')

@section('title', 'User-Dashboard Page')
@section('content')
<style>
    .dashboard-container {
        display: flex;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
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

    /* Main section */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    .card-row {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 20px;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        margin: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex: 1 1 calc(20% - 16px); /* Ensure 5 cards fit in one row */
        text-align: center;
    }

    .card h3 {
        margin-top: 0;
    }

    .card-1, .card-2, .card-3, .card-4, .card-5 {
        background-color: #cccccc; /* Light gray for all cards */
    }

    .content-section {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 20px;
    }

    .chart-container, .materials-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        margin: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex: 1 1 calc(50% - 16px); /* Ensure both sections fit side by side */
        text-align: center;
    }

    .chart-container {
        height: 400px; /* Adjust the height as needed */
    }

    .materials-container {
        padding: 20px;
    }

    .materials-section {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .materials-section label {
        font-size: 16px;
        margin-bottom: 8px;
    }

    .materials-section select {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    /*user-profile*/

    .profile-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #13365f;
            font-size: 28px;
        }
        .profile-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            padding: 30px;
            margin-bottom: 30px;
        }
        .profile-card h5 {
            color: #13365f;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .profile-card .profile-info {
            margin-bottom: 20px;
        }
        .profile-card .profile-info label {
            font-weight: bold;
            color: #13365f;
            display: block;
            margin-bottom: 5px;
        }
        .profile-card .profile-info p {
            margin: 0;
            color: #555555;
        }
        .profile-card .edit-btn {
            background-color: #13365f;
            color: #ffffff;
            border-radius: 25px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .profile-card .edit-btn:hover {
            background-color: #0e2a44;
        }
        .profile-card .profile-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .profile-card .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .profile-card .profile-image img {
            width: 100%;
            height: auto;
        }
        .profile-card .profile-details {
            text-align: left;
        }
        .settings-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            padding: 30px;
        }
        .settings-card h5 {
            color: #13365f;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .settings-card .settings-info {
            margin-bottom: 20px;
        }
        .settings-card .settings-info label {
            font-weight: bold;
            color: #13365f;
            display: block;
            margin-bottom: 5px;
        }
        .settings-card .settings-info p {
            margin: 0;
            color: #555555;
        }
</style>

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Dashboard') }}
</h2>

<div class="dashboard-container py-12">
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="sidebar-title">Menu</h3>
        <ul class="sidebar-menu">
            <li><a href="{{ route('home') }}" class="sidebar-link">Home</a></li>
            <li><a href="{{ route('userProfile') }}" class="sidebar-link">Profile</a></li>
            <li><a href="{{ route('orderHistory') }}" class="sidebar-link">Order-History</a></li>
            <li><a href="{{ route('cartItems') }}" class="sidebar-link">Cart Items</a></li>
            <li><a href="{{ route('order') }}" class="sidebar-link">Orders</a></li>
            <li><a href="{{ route('payments') }}" class="sidebar-link">Payments</a></li>
            <li><a href="{{ route('messages') }}" class="sidebar-link">Messages</a></li>
            <li><a href="{{ route('notifications') }}" class="sidebar-link">Notifications</a></li>
            <li><a href="{{ route('settings') }}" class="sidebar-link">Settings</a></li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" class="sidebar-link" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! User-Profile") }}
                </div>
            </div>
        </div>



        <div class="container profile-container">
            <div class="profile-card">
                <h2 class="text-center" style="color: #13365f;">User Profile</h2>
                <div class="profile-info">
                    <h5>{{ $user->name }}</h5>
                    <p>Email: {{ $user->email }}</p>
                    <p>Phone: {{ $user->phone ?? 'N/A' }}</p> <!-- Use 'N/A' or a default value if phone is not set -->
                </div>
                <a href="{{ route('profile.edit') }}" class="edit-btn">Edit Profile</a>
            </div>
        </div>

@endsection




{{-- 
@extends('layouts.app')

@section('content')
<div class="container profile-container">
    <div class="profile-card">
        <h2 class="text-center" style="color: #13365f;">User Profile</h2>
        <div class="profile-info">
            <h5>{{ $user->name }}</h5>
            <p>Email: {{ $user->email }}</p>
            <p>Phone: {{ $user->phone }}</p>
        </div>
        <a href="{{ route('profile.edit') }}" class="edit-btn">Edit Profile</a>
    </div>
</div>
@endsection --}}
