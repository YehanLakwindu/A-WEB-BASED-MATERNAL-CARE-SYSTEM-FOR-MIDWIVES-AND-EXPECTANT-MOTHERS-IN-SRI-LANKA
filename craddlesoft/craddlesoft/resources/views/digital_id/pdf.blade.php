<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital ID</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --text-color: #1f2937;
            --light-bg: #f3f4f6;
            --border-radius: 16px;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 30px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 650px;
            width: 100%;
            margin: auto;
            background: white;
            padding: 32px;
            border-radius: var(--border-radius);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(37, 99, 235, 0.1);
            backdrop-filter: blur(10px);
        }

        .header {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e5e7eb;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .details {
            padding: 24px;
            border-radius: var(--border-radius);
            background: var(--light-bg);
            margin-bottom: 30px;
            display: grid;
            gap: 16px;
        }

        .details div {
            padding: 8px 16px;
            font-size: 16px;
            color: var(--text-color);
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .details strong {
            min-width: 140px;
            color: var(--primary-color);
            font-weight: 600;
        }

        .details i {
            margin-right: 12px;
            color: var(--primary-color);
            width: 20px;
        }

        .qr-code {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
        }

        .qr-code h4 {
            color: var(--text-color);
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .qr-code img {
            width: 200px;
            height: 200px;
            padding: 16px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                        0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease;
        }

        .qr-code img:hover {
            transform: scale(1.02);
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        @media (max-width: 640px) {
            body {
                padding: 16px;
            }
            
            .container {
                padding: 20px;
            }

            .details div {
                flex-direction: column;
                align-items: flex-start;
            }

            .details strong {
                margin-bottom: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Digital ID for {{ $mother->full_name }}
        </div>

        <div class="details">
            <div>
                <i class="fas fa-user"></i>
                <strong>Full Name:</strong> {{ $mother->full_name }}
            </div>
            <div>
                <i class="fas fa-id-card"></i>
                <strong>National ID:</strong> {{ $mother->national_id }}
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <strong>Email:</strong> {{ $mother->email ?? 'N/A' }}
            </div>
            <div>
                <i class="fas fa-phone"></i>
                <strong>Contact Number:</strong> {{ $mother->mother_contact_number }}
            </div>
            <div>
                <i class="fas fa-home"></i>
                <strong>Address:</strong> {{ $mother->address ?? 'N/A' }}
            </div>
            <div>
                <i class="fas fa-calendar"></i>
                <strong>Date of Birth:</strong> {{ $mother->date_of_birth ?? 'N/A' }}
            </div>
            <div>
                <i class="fas fa-tint"></i>
                <strong>Blood Type:</strong> {{ $mother->blood_type ?? 'N/A' }}
            </div>
        </div>

        <div class="qr-code">
            <h4>Scan QR Code to Verify Digital ID</h4>
            <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">
        </div>

        <div class="footer">
            <i class="fas fa-shield-alt"></i> This digital ID was generated automatically. Please scan the QR code for verification.
        </div>
    </div>
</body>
</html>