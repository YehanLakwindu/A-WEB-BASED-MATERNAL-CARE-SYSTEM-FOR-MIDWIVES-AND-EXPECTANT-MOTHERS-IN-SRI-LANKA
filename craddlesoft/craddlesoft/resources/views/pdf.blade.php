<!DOCTYPE html>
<html>
<head>
    <title>Mother's Medical Report</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 30px;
            background: #f0f4f8;
            color: #333;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
        }
        .header h1 {
            font-size: 28px;
            color: #007bff;
            margin: 0;
            letter-spacing: 1px;
            font-weight: 500;
        }
        .header p {
            font-size: 14px;
            color: #555;
        }
        .content {
            margin: 20px auto;
            padding: 25px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            width: 90%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        table th, table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 14px;
        }
        table th {
            background-color: #e8f4fd;
            font-weight: 600;
            color: #007bff;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            width: 100%;
            border-top: 2px solid #007bff;
            padding-top: 15px;
            margin-top: 20px;
        }
        .signature-block {
            flex: 1;
            text-align: center;
            padding: 0 25px;
            position: relative;
        }
        .signature-block:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 1px;
            background-color: #f1f1f1;
        }
        .signature-title {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .signature-line {
            border-top: 2px solid #000;
            width: 85%;
            margin: 12px auto;
        }
        .signature-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 12px;
        }
        .signature-details span:first-child {
            font-weight: bold;
            color: #555;
        }
        .signature-details span:last-child {
            min-width: 120px;
            text-align: right;
        }
        .logo-section {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }
        .logo-section img {
            max-width: 200px;
            max-height: 100px;
            object-fit: contain;
        }
        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #777;
            border-top: 2px solid #dcdcdc;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="logo-section">
        <img src="images/logo1.png" alt="CraddleSoft Logo">
    </div>
    <div class="header">
        <h1>Mother's Medical Report</h1>
        <p>Generated on {{ now()->format('d-m-Y') }}</p>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Attribute</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $mothersdata->id }}</td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>{{ $mothersdata->full_name }}</td>
            </tr>
            <tr>
                <td>National ID</td>
                <td>{{ $mothersdata->national_id }}</td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>{{ $mothersdata->date_of_birth }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $mothersdata->email }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $mothersdata->address }}</td>
            </tr>
            <tr>
                <td>Nearest Landmark</td>
                <td>{{ $mothersdata->nearest_landmark }}</td>
            </tr>
            <tr>
                <td>Husband's Name</td>
                <td>{{ $mothersdata->husband_name }}</td>
            </tr>
            <tr>
                <td>Husband's Contact</td>
                <td>{{ $mothersdata->husband_contact }}</td>
            </tr>
            <tr>
                <td>Husband's Occupation</td>
                <td>{{ $mothersdata->husband_occupation }}</td>
            </tr>
            <tr>
                <td>Estimated Delivery Date</td>
                <td>{{ $mothersdata->stimated_delivery_date }}</td>
            </tr>
            <tr>
                <td>Last Menstrual Period</td>
                <td>{{ $mothersdata->last_menstrual_period }}</td>
            </tr>
            <tr>
                <td>Previous Pregnancy History</td>
                <td>{{ $mothersdata->previous_pregnancy_history }}</td>
            </tr>
            <tr>
                <td>Known Medical Conditions</td>
                <td>{{ $mothersdata->known_medical_conditions }}</td>
            </tr>
            <tr>
                <td>Blood Type</td>
                <td>{{ $mothersdata->blood_type }}</td>
            </tr>
            <tr>
                <td>Rh Factor</td>
                <td>{{ $mothersdata->rh_factor }}</td>
            </tr>
            <tr>
                <td>Chronic Illnesses</td>
                <td>{{ $mothersdata->chronic_illnesses }}</td>
            </tr>
            <tr>
                <td>Allergies</td>
                <td>{{ $mothersdata->allergies }}</td>
            </tr>
            <tr>
                <td>Previous Surgeries</td>
                <td>{{ $mothersdata->previous_surgeries }}</td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td>{{ $mothersdata->occupation }}</td>
            </tr>
            <tr>
                <td>Current Weight</td>
                <td>{{ $mothersdata->current_weigh }}</td>
            </tr>
            <tr>
                <td>Mother's Contact Number</td>
                <td>{{ $mothersdata->mother_contact_number }}</td>
            </tr>
        </table>

        <div class="signatures">
            <div class="signature-block">
                <div class="signature-title">Attending Physician</div>
                <div class="signature-line"></div>
                <div class="signature-details">
                    <span>Name:</span>
                    <span>__________________</span>
                </div>
                <div class="signature-details">
                    <span>Signature:</span>
                    <span>__________________</span>
                </div>
                <div class="signature-details">
                    <span>Date:</span>
                    <span>__________________</span>
                </div>
            </div>
            <div class="signature-block">
                <div class="signature-title">Primary Midwife</div>
                <div class="signature-line"></div>
                <div class="signature-details">
                    <span>Name:</span>
                    <span>__________________</span>
                </div>
                <div class="signature-details">
                    <span>Signature:</span>
                    <span>__________________</span>
                </div>
                <div class="signature-details">
                    <span>Date:</span>
                    <span>__________________</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 CraddleSoft. All rights reserved.</p>
    </div>
</body>
</html>
