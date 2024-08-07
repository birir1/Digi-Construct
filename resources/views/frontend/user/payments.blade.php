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

    /*Payments*/

    .payment-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #2c3e50;
        }
        .payment-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .payment-card-header {
            font-weight: bold;
            margin-bottom: 20px;
            color: #e74c3c;
        }
        .payment-section {
            margin-bottom: 30px;
        }
        .payment-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #bdc3c7;
            margin-bottom: 20px;
        }
        .order-summary {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .order-summary-header {
            font-weight: bold;
            margin-bottom: 20px;
            color: #34495e;
        }
        .order-summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .btn-complete-payment {
            background-color: #e74c3c;
            color: #ffffff;
            border-radius: 30px;
            padding: 15px 25px;
            font-size: 1.2rem;
            text-align: center;
            width: 100%;
            display: block;
        }
        .payment-options-header {
            font-weight: bold;
            margin-bottom: 20px;
            color: #34495e;
        }
        .payment-option {
            margin-bottom: 20px;
        }
        .payment-option-label {
            margin-right: 10px;
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
                    {{ __("You're logged in! Payments") }}
                </div>
            </div>
        </div>

        <div class="container payment-container">
            <h2 class="payment-header">Complete Your Payment</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="payment-card">
                        <h3 class="payment-card-header">Payment Options</h3>
                        <div class="payment-section">
                            <div class="payment-option">
                                <input type="radio" id="credit-card" name="payment-method" checked>
                                <label for="credit-card" class="payment-option-label">Credit/Debit Card</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="paypal" name="payment-method">
                                <label for="paypal" class="payment-option-label">PayPal</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="bank-transfer" name="payment-method">
                                <label for="bank-transfer" class="payment-option-label">Bank Transfer</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="mpesa" name="payment-method">
                                <label for="mpesa" class="payment-option-label">M-Pesa</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="bitcoin" name="payment-method">
                                <label for="bitcoin" class="payment-option-label">Bitcoin</label>
                            </div>
                        </div>
                    </div>
                    <div class="payment-card" id="card-details-section">
                        <h3 class="payment-card-header">Payment Details</h3>
                        <div class="payment-section">
                            <input type="text" class="payment-input" placeholder="Cardholder Name">
                            <input type="text" class="payment-input" placeholder="Card Number">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="payment-input" placeholder="Expiry Date (MM/YY)">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="payment-input" placeholder="CVV">
                                </div>
                            </div>
                        </div>
                        <div class="payment-section">
                            <h3 class="payment-card-header">Billing Address</h3>
                            <input type="text" class="payment-input" placeholder="Street Address">
                            <input type="text" class="payment-input" placeholder="City">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="payment-input" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="payment-input" placeholder="Zip Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-card" id="mpesa-details-section" style="display:none;">
                        <h3 class="payment-card-header">M-Pesa Details</h3>
                        <div class="payment-section">
                            <input type="text" class="payment-input" placeholder="M-Pesa Phone Number">
                        </div>
                    </div>
                    <div class="payment-card" id="bitcoin-details-section" style="display:none;">
                        <h3 class="payment-card-header">Bitcoin Details</h3>
                        <div class="payment-section">
                            <input type="text" class="payment-input" placeholder="Bitcoin Wallet Address">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-summary">
                        <h3 class="order-summary-header">Order Summary</h3>
                        <div class="order-summary-item">
                            <span>Product 1</span>
                            <span>$50.00</span>
                        </div>
                        <div class="order-summary-item">
                            <span>Product 2</span>
                            <span>$30.00</span>
                        </div>
                        <div class="order-summary-item">
                            <span>Service Fee</span>
                            <span>$5.00</span>
                        </div>
                        <hr>
                        <div class="order-summary-item">
                            <span>Total</span>
                            <span>$85.00</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-complete-payment">Complete Payment</a>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll('input[name="payment-method"]').forEach((input) => {
                input.addEventListener('change', function() {
                    document.getElementById('card-details-section').style.display = this.id === 'credit-card' ? 'block' : 'none';
                    document.getElementById('mpesa-details-section').style.display = this.id === 'mpesa' ? 'block' : 'none';
                    document.getElementById('bitcoin-details-section').style.display = this.id === 'bitcoin' ? 'block' : 'none';
                });
            });
        </script>

@endsection
