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


    /*message*/

    .msg-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .msg-sidebar {
            background-color: #34495e;
            padding: 20px;
            height: 80vh;
            overflow-y: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .msg-sidebar-header {
            color: #ecf0f1;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .msg-thread {
            background-color: #2c3e50;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            color: #ecf0f1;
            cursor: pointer;
        }
        .msg-thread:hover {
            background-color: #e74c3c;
        }
        .msg-main-content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .msg-header {
            margin-bottom: 20px;
            font-weight: bold;
            color: #2c3e50;
        }
        .msg-bubble {
            background-color: #ecf0f1;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .msg-bubble-sent {
            background-color: #e74c3c;
            color: #ffffff;
            text-align: right;
        }
        .msg-input-container {
            margin-top: 20px;
        }
        .msg-input-textarea {
            width: 100%;
            height: 100px;
            border-radius: 8px;
            border: 1px solid #bdc3c7;
            padding: 10px;
            font-size: 1rem;
        }
        .btn-msg-send {
            background-color: #e74c3c;
            color: #ffffff;
            border-radius: 30px;
            padding: 10px 25px;
            margin-top: 10px;
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
                    {{ __("You're logged in! messages") }}
                </div>
            </div>
        </div>


        <div class="container msg-container">
            <div class="row">
                <div class="col-md-4">
                    <div class="msg-sidebar">
                        <h2 class="msg-sidebar-header">Conversations</h2>
                        <div class="msg-thread">
                            <p>John Doe</p>
                        </div>
                        <div class="msg-thread">
                            <p>Jane Smith</p>
                        </div>
                        <div class="msg-thread">
                            <p>Construction Team</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="msg-main-content">
                        <h2 class="msg-header">John Doe</h2>
                        <div class="msg-bubble msg-bubble-received">
                            <p>Hey there! How's the construction going?</p>
                        </div>
                        <div class="msg-bubble msg-bubble-sent">
                            <p>Hi John! It's going great, thanks for asking.</p>
                        </div>
                        <div class="msg-bubble msg-bubble-received">
                            <p>Good to hear! Let me know if you need any help.</p>
                        </div>
                        <div class="msg-input-container">
                            <textarea class="msg-input-textarea" placeholder="Type your message..."></textarea>
                            <button class="btn btn-msg-send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
