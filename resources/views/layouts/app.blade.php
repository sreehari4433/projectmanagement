<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('leads.index') }}"><button class="btn btn-primary">Leads</button></a>
            <a class="navbar-brand" href="{{ route('proposals.index') }}"><button class="btn btn-secondary">Proposals</button></a>
            <a class="navbar-brand" href="{{ route('estimates.index') }}"><button class="btn btn-success">Estimates</button></a>
           
            <a class="navbar-brand" href="{{ route('invoices.index') }}"><button class="btn btn-warning">Invoices</button></a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
        </div>
    </nav>
   
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
