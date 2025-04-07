<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .error-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fc;
        }
        .error-content {
            text-align: center;
            padding: 2rem;
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #e74a3b;
            margin-bottom: 1rem;
        }
        .error-message {
            font-size: 24px;
            color: #5a5c69;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="error-page">
        <div class="error-content">
            <div class="error-code">404</div>
            <div class="error-message">Page Not Found</div>
            <p class="text-muted mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Back to Home
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>