<!DOCTYPE html>
<html>
<head>
    <title>Final Medical Report</title>
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
            font-size: 24px;
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 10px;
            border-bottom: 2px solid #007bff;
            color: #007bff;
            padding-bottom: 5px;
            font-size: 18px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .signature {
            width: 45%;
            text-align: center;
        }
        .signature-line {
            margin-top: 40px;
            border-top: 1px solid #333;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <h2>Final Medical Report</h2>
        <p><strong>Reference Number:</strong> {{ $mothersdata->reference_number }}</p>
        <p><strong>Mother ID:</strong> {{ $mothersdata->id }}</p>
        <p><strong>Name:</strong> {{ $mothersdata->full_name }}</p>
        <p><strong>Generated On:</strong> {{ now()->format('Y-m-d') }}</p>
    </div>

    <!-- Personal Information Section -->
    <div class="section">
        <h3>Personal Information</h3>
        <p><strong>National ID:</strong> {{ $mothersdata->national_id }}</p>
        <p><strong>Contact Number:</strong> {{ $mothersdata->mother_contact_number }}</p>
        <p><strong>Email:</strong> {{ $mothersdata->email }}</p>
        <p><strong>Address:</strong> {{ $mothersdata->address }}</p>
        <p><strong>Husband's Name:</strong> {{ $mothersdata->husband_name }}</p>
        <p><strong>Husband's Contact:</strong> {{ $mothersdata->husband_contact }}</p>
        <p><strong>Known Medical Conditions:</strong> {{ $mothersdata->known_medical_conditions }}</p>
        <p><strong>Blood Type:</strong> {{ $mothersdata->blood_type }}</p>
        <p><strong>RH Factor:</strong> {{ $mothersdata->rh_factor }}</p>
    </div>

    <!-- Health Tracking Data Section -->
    <div class="section">
        <h3>Health Tracking Data</h3>

        <!-- After 3 Months -->
        <h4>After 3 Months</h4>
        @if($mothersdata->healthTrackingsAfter3Month->isEmpty())
            <p>No data available for this period.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Checkup Date</th>
                        <th>Weight</th>
                        <th>Blood Pressure</th>
                        <th>Glucose Level</th>
                        <th>Hemoglobin Level</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mothersdata->healthTrackingsAfter3Month as $record)
                        <tr>
                            <td>{{ $record->checkup_date }}</td>
                            <td>{{ $record->weight }}</td>
                            <td>{{ $record->blood_pressure }}</td>
                            <td>{{ $record->glucose_level }}</td>
                            <td>{{ $record->hemoglobin_level }}</td>
                            <td>{{ $record->notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- After 6 Months -->
        <h4>After 6 Months</h4>
        @if($mothersdata->healthTrackingsAfter6Month->isEmpty())
            <p>No data available for this period.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Checkup Date</th>
                        <th>Weight</th>
                        <th>Blood Pressure</th>
                        <th>Glucose Level</th>
                        <th>Hemoglobin Level</th>
                        <th>Vitamin Supplements</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mothersdata->healthTrackingsAfter6Month as $record)
                        <tr>
                            <td>{{ $record->checkup_date }}</td>
                            <td>{{ $record->weight }}</td>
                            <td>{{ $record->blood_pressure }}</td>
                            <td>{{ $record->glucose_level }}</td>
                            <td>{{ $record->hemoglobin_level }}</td>
                            <td>{{ $record->vitamin_supplements }}</td>
                            <td>{{ $record->notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- After 9 Months -->
        <h4>After 9 Months</h4>
        @if($mothersdata->healthTrackingsAfter9Month->isEmpty())
            <p>No data available for this period.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Checkup Date</th>
                        <th>Weight</th>
                        <th>Blood Pressure</th>
                        <th>Fetal Position</th>
                        <th>Ultrasound Findings</th>
                        <th>Risk of Complications</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mothersdata->healthTrackingsAfter9Month as $record)
                        <tr>
                            <td>{{ $record->checkup_date }}</td>
                            <td>{{ $record->weight }}</td>
                            <td>{{ $record->blood_pressure }}</td>
                            <td>{{ $record->fetal_position }}</td>
                            <td>{{ $record->ultrasound_findings }}</td>
                            <td>{{ $record->risk_of_complications }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
        <!-- Signature Section -->
        <div class="signature-section" style="margin-top: 40px; font-size: 12px;">
          <!-- Midwife's Signature -->
          <div style="margin-bottom: 40px;">
              <p><strong>Midwife's Signature:</strong></p>
              <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                  <div style="width: 45%;">
                      <div style="border-top: 1px solid #333; width: 100%; margin-bottom: 5px;"></div>
                      <p style="margin: 0;">(Signature)</p>
                  </div>
                  <div style="width: 45%; text-align: right;">
                      <div style="border-top: 1px solid #333; width: 100%; margin-bottom: 5px;"></div>
                      <p style="margin: 0;">(Date)</p>
                  </div>
              </div>
              <p><strong>Name:</strong> _____________________</p>
              <p><strong>Position:</strong> _____________________</p>
          </div>
  
          <!-- Doctor's Signature -->
          <div>
              <p><strong>Doctor's Signature:</strong></p>
              <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                  <div style="width: 45%;">
                      <div style="border-top: 1px solid #333; width: 100%; margin-bottom: 5px;"></div>
                      <p style="margin: 0;">(Signature)</p>
                  </div>
                  <div style="width: 45%; text-align: right;">
                      <div style="border-top: 1px solid #333; width: 100%; margin-bottom: 5px;"></div>
                      <p style="margin: 0;">(Date)</p>
                  </div>
              </div>
              <p><strong>Name:</strong> _____________________</p>
              <p><strong>Position:</strong> _____________________</p>
          </div>
      </div>
  
      <!-- Footer Section -->
      <div class="footer" style="text-align: center; margin-top: 50px; font-size: 11px; color: #555;">
          <p>Final Medical Report generated by <strong>CraddleSoft</strong>.</p>
      </div>
  

</body>
</html>
