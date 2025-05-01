<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Mother's Details</title>
    <!-- Bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .card-header {
            background-color: #0069d9;
            color: #fff;
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #0069d9;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .text-danger {
            font-size: 0.9rem;
        }
        .card-body {
            background-color: #ffffff;
            border-radius: 0 0 8px 8px;
        }
        .container {
            margin-top: 5rem;
        }
        .card-footer {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Search Mother's Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mother.details.fetch') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="mother_id" class="form-label">Mother ID</label>
                                <input
                                    type="text"
                                    name="mother_id"
                                    id="mother_id"
                                    class="form-control"
                                    placeholder="Enter Mother ID (e.g., M10001)"
                                    required>
                                @error('mother_id')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        <a href="{{ route('mothersdatas.index') }}" class="mt-3 btn btn-secondary">
                            View All Mothers
                        </a>
                    </div>
                    <div class="card-footer">
                        <p>Search for a specific mother's details by ID or view all mothers' records.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>