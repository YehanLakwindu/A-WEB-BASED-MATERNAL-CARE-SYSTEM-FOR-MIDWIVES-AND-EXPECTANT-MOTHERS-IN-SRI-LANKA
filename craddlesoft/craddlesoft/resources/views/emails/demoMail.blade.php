<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h1 {
            color: #333333;
            font-size: 24px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }
        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #555555;
        }
        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .do-not-reply {
            font-size: 12px;
            color: #999999;
            margin-top: 20px;
        }
        .do-not-reply a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Email Header -->
        <div class="email-header">
            <h2>CraddleSoft</h2>
            <p>Empowering Maternity Care</p>
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <h1>{{ $mailData['title'] }}</h1>
            <p>{{ $mailData['body'] }}</p>
            <p>Thank you for trusting CraddleSoft!</p>
        </div>

        <!-- Do Not Reply Message -->
        <div class="do-not-reply">
            <p><strong>Note:</strong> This is an automated message. Please do not reply to this email. If you have any questions, please contact us at <a href="mailto:support@craddlesoft.com">support@craddlesoft.com</a>.</p>
        </div>

        <!-- Email Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} CraddleSoft. All rights reserved.</p>
            <p>
                Visit us at <a href="https://www.craddlesoft.com">www.craddlesoft.com</a> | 
                Follow us on <a href="https://twitter.com/craddlesoft">Twitter</a>
            </p>
        </div>
    </div>
</body>
</html>
