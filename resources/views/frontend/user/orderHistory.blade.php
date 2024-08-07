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

    /*oder-history page*/

    .order-history-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .order-history-header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #13365f;
            font-size: 24px;
        }
        .order-history-table {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            overflow: hidden;
            border: 1px solid #e1e1e1;
        }
        .order-history-table th, .order-history-table td {
            text-align: center;
            padding: 15px;
        }
        .order-history-table th {
            background: linear-gradient(to right, #13365f, #0066cc);
            color: #ffffff;
            font-weight: bold;
        }
        .order-history-table td {
            background-color: #f0f8ff;
            border-bottom: 1px solid #e1e1e1;
        }
        .order-history-table tr:last-child td {
            border-bottom: none;
        }
        .order-status {
            font-weight: bold;
            padding: 5px;
            border-radius: 5px;
        }
        .order-status.pending {
            color: #f39c12;
            background-color: #fff5e6;
        }
        .order-status.completed {
            color: #2ecc71;
            background-color: #e6f9e6;
        }
        .order-status.cancelled {
            color: #e74c3c;
            background-color: #fce6e6;
        }
        .view-details-btn {
            background-color: #13365f;
            color: #ffffff;
            border-radius: 25px;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        .view-details-btn:hover {
            background-color: #0e2a44;
        }
        .empty-cart {
            text-align: center;
            margin-top: 50px;
            color: #13365f;
            font-size: 18px;
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
                    {{ __("You're logged in! orderHistory") }}
                </div>
            </div>
        </div>

        <div class="container order-history-container">
            <h2 class="order-history-header">Your Order History</h2>
            <div class="table-responsive">
                <table class="table table-striped order-history-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order Row Example -->
                        <tr>
                            <td>#12345</td>
                            <td>2024-07-10</td>
                            <td>Product A, Product B</td>
                            <td>$120.00</td>
                            <td class="order-status completed">Completed</td>
                            <td><a href="#" class="view-details-btn">View Details</a></td>
                        </tr>
                        <!-- Another Order Row Example -->
                        <tr>
                            <td>#12346</td>
                            <td>2024-07-12</td>
                            <td>Product C</td>
                            <td>$45.00</td>
                            <td class="order-status pending">Pending</td>
                            <td><a href="#" class="view-details-btn">View Details</a></td>
                        </tr>
                        <!-- Additional Order Rows -->
                        <tr>
                            <td>#12347</td>
                            <td>2024-07-15</td>
                            <td>Product D, Product E</td>
                            <td>$90.00</td>
                            <td class="order-status cancelled">Cancelled</td>
                            <td><a href="#" class="view-details-btn">View Details</a></td>
                        </tr>
                        <!-- Empty Cart Message -->
                        <!-- Uncomment below to display when no orders -->
                        <!--
                        <tr>
                            <td colspan="6" class="empty-cart">Your order history is empty.</td>
                        </tr>
                        -->
                    </tbody>
                </table>
            </div>
        </div>

@endsection
