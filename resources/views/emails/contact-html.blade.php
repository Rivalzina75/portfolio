<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message - Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Space Grotesk', 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #0a0f1f 0%, #0e1428 100%);
            padding: 40px 20px;
            line-height: 1.65;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, rgba(17, 29, 46, 0.95), rgba(10, 15, 31, 0.98));
            border: 1px solid rgba(0, 217, 255, 0.2);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        .header {
            background: linear-gradient(135deg, rgba(0, 217, 255, 0.15), rgba(0, 255, 204, 0.1));
            padding: 32px 24px;
            border-bottom: 1px solid rgba(0, 217, 255, 0.2);
            text-align: center;
        }
        .header h1 {
            color: #00d9ff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .header p {
            color: #7cffe3;
            font-size: 14px;
            font-weight: 500;
        }
        .content {
            padding: 32px 24px;
        }
        .field {
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .field:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .field-label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #7cffe3;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .field-value {
            color: #e8f2ff;
            font-size: 16px;
            line-height: 1.6;
            word-wrap: break-word;
        }
        .message-box {
            background: rgba(0, 217, 255, 0.05);
            border: 1px solid rgba(0, 217, 255, 0.15);
            border-radius: 12px;
            padding: 16px;
            margin-top: 8px;
        }
        .footer {
            background: linear-gradient(180deg, rgba(0, 5, 15, 0.5), rgba(0, 0, 0, 0.7));
            padding: 24px;
            text-align: center;
            border-top: 1px solid rgba(0, 217, 255, 0.1);
        }
        .footer p {
            color: #7a8fa3;
            font-size: 13px;
            margin-bottom: 4px;
        }
        .footer a {
            color: #00d9ff;
            text-decoration: none;
        }
        .footer a:hover {
            color: #7cffe3;
        }
        .badge {
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 217, 255, 0.2);
            border: 1px solid rgba(0, 217, 255, 0.3);
            border-radius: 8px;
            color: #00d9ff;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📧 Nouveau Message</h1>
            <p>Via le formulaire de contact du portfolio</p>
        </div>
        
        <div class="content">
            <div class="field">
                <span class="field-label">Expéditeur</span>
                <div class="field-value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <span class="field-label">Adresse Email</span>
                <div class="field-value">
                    <a href="mailto:{{ $email }}" style="color: #00d9ff; text-decoration: none;">{{ $email }}</a>
                </div>
            </div>
            
            <div class="field">
                <span class="field-label">Sujet</span>
                <div class="field-value">{{ $subject }}</div>
            </div>
            
            <div class="field">
                <span class="field-label">Message</span>
                <div class="message-box">
                    <div class="field-value">{!! nl2br(e($messageContent)) !!}</div>
                </div>
            </div>
            
            <div style="text-align: center;">
                <span class="badge">Portfolio BTS SIO SLAM</span>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>Mekaoui Reda</strong> — BTS SIO SLAM • Promotion 2025</p>
            <p>
                <a href="mailto:{{ $email }}">Répondre à cet email</a>
            </p>
        </div>
    </div>
</body>
</html>
