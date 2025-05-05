<!DOCTYPE html>
<html>
<head>
    <title>Kishan Suvidha</title>
    <style>
        .scheme-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.scheme-table th, .scheme-table td {
    border: 1px solid #dee2e6;
    padding: 12px 15px;
    text-align: center;
}

.scheme-table th {
    background-color: #3498db;
    color: white;
    font-weight: bold;
}

.scheme-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.scheme-table tr:hover {
    background-color: #d1ecf1;
}

.badge {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
    color: white;
}

.badge.success {
    background-color: #28a745;
}

.badge.danger {
    background-color: #dc3545;
}

.btn {
    padding: 6px 12px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin: 2px;
    font-size: 13px;
    display: inline-block;
}

.btn.small {
    padding: 4px 8px;
}

.btn.danger {
    background-color: #e74c3c;
}

.btn:hover {
    opacity: 0.9;
}

       .form-card {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    max-width: 500px;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #2c3e50;
}

.form-group input,
.form-group textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.checkbox-group {
    flex-direction: row;
    align-items: center;
}

.checkbox-group label {
    margin-right: 10px;
}

.form-actions {
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
}

.btn:hover {
    background-color: #2980b9;
}

.btn.secondary {
    background-color: #95a5a6;

.btn.secondary:hover {
    background-color: #7f8c8d;
}


    </style>
</head>
<body>

    <h1>Kishan Suvidha - Schemes</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @yield('content')

</body>
</html>
