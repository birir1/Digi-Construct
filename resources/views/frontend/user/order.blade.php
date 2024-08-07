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

    /*order*/

    /* .orders-wrapper {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .header-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #2c3e50;
        }
        .order-box {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            padding: 25px;
            margin-bottom: 20px;
        }
        .order-header {
            font-weight: bold;
            margin-bottom: 20px;
            color: #e74c3c;
        }
        .order-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        .summary-box {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .summary-title {
            font-weight: bold;
            margin-bottom: 15px;
            color: #34495e;
        }
        .status-tag {
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 20px;
            display: inline-block;
            text-transform: capitalize;
        }
        .status-pending {
            background-color: #f39c12;
            color: #ffffff;
        }
        .status-completed {
            background-color: #2ecc71;
            color: #ffffff;
        }
        .status-cancelled {
            background-color: #e74c3c;
            color: #ffffff;
        }
        .order-btn {
            background-color: #3498db;
            color: #ffffff;
            border-radius: 25px;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            width: 100%;
            font-size: 1rem;
            margin-top: 20px;
        } */


        .orders-table-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .orders-table-header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #13365f;
        }
        .custom-table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        .custom-table th, .custom-table td {
            text-align: center;
            padding: 15px;
        }
        .custom-table th {
            background-color: #13365f;
            color: #ffffff;
            font-weight: bold;
        }
        .custom-table td {
            background-color: #bdd6f0;
        }
        .order-status.pending {
            color: #f39c12;
            font-weight: bold;
        }
        .order-status.completed {
            color: #2ecc71;
            font-weight: bold;
        }
        .order-status.cancelled {
            color: #e74c3c;
            font-weight: bold;
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
        }
        .view-details-btn:hover {
            background-color: #0e2a44;
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
                    {{ __("You're logged in! orders") }}
                </div>
            </div>
        </div>

        {{-- <div class="container orders-wrapper">
            <h2 class="header-title">Your Orders</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Order Box Example -->
                    <div class="order-box">
                        <h3 class="order-header">Order #56789</h3>
                        <div class="order-detail">
                            <span>Product A</span>
                            <span>$75.00</span>
                        </div>
                        <div class="order-detail">
                            <span>Product B</span>
                            <span>$45.00</span>
                        </div>
                        <div class="order-detail">
                            <span>Shipping Fee</span>
                            <span>$10.00</span>
                        </div>
                        <div class="summary-box">
                            <div class="summary-title">Order Summary</div>
                            <div class="order-detail">
                                <span>Total</span>
                                <span>$130.00</span>
                            </div>
                        </div>
                        <div class="status-tag status-pending">Status: Pending</div>
                        <a href="#" class="order-btn">View Details</a>
                    </div>
    
                    <!-- Another Order Box Example -->
                    <div class="order-box">
                        <h3 class="order-header">Order #56790</h3>
                        <div class="order-detail">
                            <span>Product C</span>
                            <span>$60.00</span>
                        </div>
                        <div class="order-detail">
                            <span>Product D</span>
                            <span>$30.00</span>
                        </div>
                        <div class="order-detail">
                            <span>Shipping Fee</span>
                            <span>$8.00</span>
                        </div>
                        <div class="summary-box">
                            <div class="summary-title">Order Summary</div>
                            <div class="order-detail">
                                <span>Total</span>
                                <span>$98.00</span>
                            </div>
                        </div>
                        <div class="status-tag status-completed">Status: Completed</div>
                        <a href="#" class="order-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="container orders-table-container">
            <h2 class="orders-table-header">Your Orders</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Shipping Fee</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order Row Example -->
                        <tr>
                            <td>#56789</td>
                            <td>Product A, Product B</td>
                            <td>2</td>
                            <td>$75.00, $45.00</td>
                            <td>$10.00</td>
                            <td>$130.00</td>
                            <td class="order-status pending">Pending</td>
                            <td><a href="#" class="view-details-btn">View Details</a></td>
                        </tr>
                        <!-- Another Order Row Example -->
                        <tr>
                            <td>#56790</td>
                            <td>Product C, Product D</td>
                            <td>2</td>
                            <td>$60.00, $30.00</td>
                            <td>$8.00</td>
                            <td>$98.00</td>
                            <td class="order-status completed">Completed</td>
                            <td><a href="#" class="view-details-btn">View Details</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
