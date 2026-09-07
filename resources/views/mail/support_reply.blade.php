<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Ticket #{{ $ticket_id }} - GoldenWay International</title>
    <style>
        body {
            background-color: #030d0a;
            color: #ffffff;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 30px 15px;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, #071f17 0%, #0c2b21 50%, #061913 100%);
            border: 1px solid rgba(255, 215, 0, 0.25);
            border-radius: 14px;
            padding: 35px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
        }
        .header {
            text-align: center;
            margin-bottom: 28px;
            padding-bottom: 22px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.15);
        }
        .brand-title {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #ffd700;
            margin: 0 0 6px 0;
            text-transform: uppercase;
        }
        .brand-subtitle {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.65);
            margin: 0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .greeting {
            font-size: 16px;
            color: #ffffff;
            margin-bottom: 14px;
            font-weight: 600;
        }
        .intro-text {
            font-size: 14px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 22px;
        }
        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: rgba(255, 215, 0, 0.85);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }
        .inquiry-card {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-left: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 15px 18px;
            margin-bottom: 22px;
        }
        .inquiry-subject {
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            margin-bottom: 6px;
        }
        .inquiry-text {
            font-size: 13px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.7);
            font-style: italic;
        }
        .reply-card {
            background: rgba(7, 31, 23, 0.7);
            border: 1px solid rgba(255, 215, 0, 0.35);
            border-left: 4px solid #ffd700;
            border-radius: 8px;
            padding: 18px 20px;
            margin-bottom: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .reply-header {
            font-size: 12px;
            font-weight: 700;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }
        .reply-text {
            font-size: 14px;
            line-height: 1.65;
            color: #ffffff;
            white-space: pre-line;
            font-weight: 400;
        }
        .btn-container {
            text-align: center;
            margin: 28px 0 15px 0;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(90deg, #ffd700, #f9a826);
            color: #071f17 !important;
            text-decoration: none;
            padding: 13px 32px;
            font-weight: 700;
            font-size: 14px;
            border-radius: 6px;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 18px rgba(249, 168, 38, 0.35);
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 35px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            line-height: 1.5;
        }
        .footer-note {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.35);
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="brand-title">GoldenWay International</h1>
            <p class="brand-subtitle">Customer Support Services</p>
        </div>

        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 22px;">
            <tr>
                <td style="background: rgba(0, 0, 0, 0.35); border: 1px solid rgba(255, 215, 0, 0.2); border-radius: 8px; padding: 12px 18px;">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left">
                                <span style="color: #ffd700; font-weight: 700; font-size: 14px; font-family: monospace;">TICKET #GW-{{ $ticket_id }}</span>
                            </td>
                            <td align="right">
                                <span style="display: inline-block; background: rgba(0, 255, 136, 0.15); border: 1px solid rgba(0, 255, 136, 0.4); color: #00ff88; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 3px 10px; border-radius: 20px;">Answered</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="greeting">Hello {{ $name }},</div>
        <p class="intro-text">Our support team has reviewed your inquiry and replied to your ticket. Below are the details and our official response:</p>

        <div class="section-title">Your Inquiry</div>
        <div class="inquiry-card">
            <div class="inquiry-subject">{{ $subject }}</div>
            <div class="inquiry-text">"{{ $customer_message }}"</div>
        </div>

        <div class="section-title">Support Team Response</div>
        <div class="reply-card">
            <div class="reply-header">&#x2714; Official Staff Reply</div>
            <div class="reply-text">{!! nl2br(e($reply_message)) !!}</div>
        </div>

        <div class="btn-container">
            <a href="https://{{ $web_url }}/dashboard/customer/support" class="btn" target="_blank">View in Support Portal</a>
        </div>

        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 25px; padding-top: 15px; border-top: 1px dashed rgba(255, 255, 255, 0.1);">
            <tr>
                <td align="left" style="font-size: 12px; color: rgba(255, 255, 255, 0.5);">
                    UID: <strong style="color: #ffd700;">{{ $uid }}</strong>
                </td>
                <td align="right" style="font-size: 12px; color: rgba(255, 255, 255, 0.5);">
                    {{ $created_at }}
                </td>
            </tr>
        </table>

        <div class="footer">
            <p>&copy; {{ date('Y') }} GoldenWay International. All rights reserved.</p>
            <p class="footer-note">If you have further questions or need additional assistance, please reply directly on the GoldenWay Support Portal or create a follow-up inquiry.</p>
        </div>
    </div>
</body>
</html>
