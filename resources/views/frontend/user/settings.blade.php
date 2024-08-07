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
    .unique-container {
            margin-top: 50px;
        }
        .unique-section-title {
            margin-top: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }
        .unique-form-group {
            margin-bottom: 1.5rem;
        }
        .unique-settings-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        /*setting*/
        .settings-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .settings-header {
            margin-bottom: 40px;
            text-align: center;
        }
        .settings-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000;
        }
        .settings-card {
            background: #ebedee;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
            margin-bottom: 30px;
        }
        .settings-section-title {
            margin-bottom: 20px;
            font-weight: bold;
            color: #000;
            border-bottom: 3px solid #bdd6f0;
            padding-bottom: 10px;
        }
        .settings-form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            background-color: #cccccc;
            border: 1px solid #13365f;
            color: #ecf0f1;
        }
        .form-control:focus {
            background-color: #2c3e50;
            border-color: #bdd6f0;
            color: #ecf0f1;
        }
        .btn-custom {
            background-color: #bdd6f0;
            color: #ffffff;
            border-radius: 30px;
            padding: 10px 25px;
        }
        .btn-custom-danger {
            background-color: #13365f;
            color: #ffffff;
            border-radius: 30px;
            padding: 10px 25px;
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
                    {{ __("You're logged in! Settings") }}
                </div>
            </div>
        </div>

        <div class="container settings-container">
            <div class="settings-header">
                <h1>Settings</h1>
                <p>Manage your preferences and account settings</p>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="settings-card">
                        <h2 class="settings-section-title">User Settings</h2>
                        <form>
                            <div class="settings-form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="settings-form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="settings-form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter new password">
                            </div>
                            <button type="submit" class="btn btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="settings-card">
                        <h2 class="settings-section-title">Notification Settings</h2>
                        <form>
                            <div class="settings-form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="emailNotifications">
                                    <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                                </div>
                            </div>
                            <div class="settings-form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">SMS Notifications</label>
                                </div>
                            </div>
                            <div class="settings-form-group">
                                <label for="notificationFrequency">Notification Frequency</label>
                                <select class="form-control" id="notificationFrequency">
                                    <option>Daily</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="settings-card">
                        <h2 class="settings-section-title">Privacy Settings</h2>
                        <form>
                            <div class="settings-form-group">
                                <label for="profileVisibility">Profile Visibility</label>
                                <select class="form-control" id="profileVisibility">
                                    <option>Public</option>
                                    <option>Friends</option>
                                    <option>Private</option>
                                </select>
                            </div>
                            <div class="settings-form-group">
                                <label for="searchVisibility">Search Visibility</label>
                                <select class="form-control" id="searchVisibility">
                                    <option>Everyone</option>
                                    <option>Friends</option>
                                    <option>No one</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="settings-card">
                        <h2 class="settings-section-title">Account Settings</h2>
                        <form>
                            <div class="settings-form-group">
                                <label for="accountStatus">Account Status</label>
                                <select class="form-control" id="accountStatus">
                                    <option>Active</option>
                                    <option>Deactivated</option>
                                </select>
                            </div>
                            <div class="settings-form-group">
                                <label for="deleteAccount">Delete Account</label>
                                <button type="button" class="btn btn-custom-danger" id="deleteAccount">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    

@endsection
