<!DOCTYPE html>
<html>
<head>
    <title>Download Baby Health Checkup PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4 text-center">Download Baby Health Checkup Report</h1>

    <!-- Form to input Mother ID -->
    <form action="{{ route('download.baby.health.pdf') }}" method="POST" class="p-4 border rounded shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="mother_id" class="form-label">Enter Mother ID</label>
            <input type="text" id="mother_id" name="mother_id" class="form-control" required placeholder="Enter Mother ID">
        </div>
        <button type="submit" class="btn btn-primary">Download PDF</button>
    </form>

    <!-- Display Error Messages -->
    @if (session('error'))
        <div class="mt-4 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>
