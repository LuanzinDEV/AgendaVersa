<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Validação de E-mail</title>
</head>
<body>
    <h1>Resultado da Validação de E-mail</h1>
    <p><strong>E-mail:</strong> {{ $email }}</p>
    <p><strong>Formato Válido:</strong> {{ $is_valid ? 'Sim' : 'Não' }}</p>
    <p><strong>SMTP Válido:</strong> {{ $is_smtp_valid ? 'Sim' : 'Não' }}</p>
    <p><strong>E-mail Gratuito:</strong> {{ $is_free_email ? 'Sim' : 'Não' }}</p>
    <p><strong>E-mail de Papel:</strong> {{ $is_role_email ? 'Sim' : 'Não' }}</p>
    <p><strong>E-mail Temporário:</strong> {{ $is_disposable_email ? 'Sim' : 'Não' }}</p>
</body>
</html>
