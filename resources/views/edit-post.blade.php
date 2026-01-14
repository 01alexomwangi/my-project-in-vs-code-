<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --bg: #f3f4f6;
            --card: #ffffff;
            --text: #111827;
            --muted: #6b7280;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .container {
            max-width: 640px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .card {
            background: var(--card);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 26px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            margin-bottom: 18px;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .btn {
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: transparent;
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
        }

        .btn-secondary:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <h1>Edit Post</h1>
        <p class="subtitle">Update your post details below</p>

        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{ $post->title }}">

            <label for="body">Content</label>
            <textarea id="body" name="body">{{ $post->body }}</textarea>

            <div class="actions">
                <a href="/" class="btn-secondary">← Back</a>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>

    </div>
</div>

</body>
</html>
