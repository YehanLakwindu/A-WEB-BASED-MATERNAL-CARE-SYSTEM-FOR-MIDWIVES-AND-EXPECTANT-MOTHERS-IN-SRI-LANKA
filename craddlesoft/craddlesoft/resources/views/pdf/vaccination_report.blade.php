<!DOCTYPE html>
<html>
<head>
    <title>Baby Vaccination Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            font-size: 16px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Baby Vaccination Report</h2>
        <p><strong>Mother ID:</strong> {{ $babies->first()->mother_id }}</p>
    </div>

    @foreach ($babies as $baby)
        <div class="section">
            <h3>Baby Details</h3>
            <p><strong>Name:</strong> {{ $baby->baby_name }}</p>
            <p><strong>Gender:</strong> {{ $baby->gender }}</p>
            <p><strong>Date of Birth:</strong> {{ $baby->date_of_birth }}</p>
            <p><strong>Birth Weight:</strong> {{ $baby->birth_weight }} kg</p>
            <p><strong>Birth Length:</strong> {{ $baby->birth_length }} cm</p>
            <p><strong>Blood Type:</strong> {{ $baby->blood_type }}</p>

            <h3>Vaccination Records</h3>
            @if ($baby->vaccinations->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Vaccine Name</th>
                            <th>Vaccination Date</th>
                            <th>Dose</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baby->vaccinations as $vaccination)
                            <tr>
                                <td>{{ $vaccination->vaccine_name }}</td>
                                <td>{{ $vaccination->vaccination_date }}</td>
                                <td>{{ $vaccination->dose }}</td>
                                <td>{{ $vaccination->notes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No vaccination records available.</p>
            @endif
        </div>
    @endforeach
</body>
</html>
