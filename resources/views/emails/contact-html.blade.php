<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Message du Portfolio</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; }
        p { margin-bottom: 15px; }
        strong { color: #4fc3f7; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nouveau Message du Portfolio</h2>
        <hr>
        <p><strong>Nom :</strong> {{ $name }}</p>
        <p><strong>Email :</strong> {{ $email }}</p>
        <p><strong>Sujet :</strong> {{ $subject }}</p>
        <p><strong>Message :</strong></p>
        <div>
            {!! nl2br(e($messageContent)) !!} 
        </div>
    </div>
</body>
</html>