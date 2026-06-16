<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GoldenWay International</title>
    <style>
        body {
            background-color: #030d0a;
            color: #ffffff;
            font-family: 'Inter', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, #071f17, #0c2820);
            border: 1px solid rgba(249, 168, 38, 0.2);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 10px 0;
        }
        .accent-text {
            color: #ffd700;
            font-weight: bold;
        }
        .subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }
        .content {
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 30px;
        }
        .credentials-box {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(249, 168, 38, 0.15);
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .credential-row {
            margin: 10px 0;
            font-size: 16px;
        }
        .label {
            color: rgba(255, 255, 255, 0.5);
            width: 100px;
            display: inline-block;
        }
        .value {
            color: #ffd700;
            font-weight: 600;
            font-family: monospace;
        }
        .btn {
            display: block;
            text-align: center;
            background: linear-gradient(90deg, #ffd700, #f9a826);
            color: #071f17 !important;
            text-decoration: none;
            padding: 14px 24px;
            font-weight: 700;
            font-size: 15px;
            border-radius: 6px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3);
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="title"><span class="accent-text">GoldenWay International</span></h2>
            <p class="subtitle">Your account has been successfully registered</p>
        </div>
        
        <div class="content">
            <p>Hi {{ $name }},</p>
            <p>Welcome to GoldenWay International! We are thrilled to have you as part of our premium community. Your account is now active, and you can access your dashboard using the credentials below:</p>
            
            <div class="credentials-box">
                <div class="credential-row">
                    <span class="label">Email:</span>
                    <span class="value">{{ $email }}</span>
                </div>
                <div class="credential-row">
                    <span class="label">Password:</span>
                    <span class="value">{{ $password }}</span>
                </div>
            </div>
            
            <p>Please keep this email safe and do not share your login credentials with anyone.</p>
            
            <a href="https://{{ env('WEB_URL') }}/login" class="btn">Log In to Your Dashboard</a>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} GoldenWay International. All rights reserved.</p>
            <p>If you did not create this account, please contact our support team immediately.</p>
        </div>
    </div>
</body>
</html>
