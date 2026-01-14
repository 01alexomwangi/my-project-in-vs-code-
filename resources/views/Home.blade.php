<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts App</title>

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #16a34a;
            --danger: #dc2626;
            --gray: #6b7280;
            --bg: #f3f4f6;
            --card: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: #111827;
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 20px;
        }

        header {
            background: var(--card);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        header h1 {
            margin: 0;
            font-size: 22px;
        }

        .logout-btn {
            background: var(--danger);
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .card {
            background: var(--card);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
            margin-bottom: 30px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin-bottom: 15px;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .btn {
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-edit {
            background: var(--success);
            color: white;
        }

        .btn-delete {
            background: var(--danger);
            color: white;
        }

        .posts {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .post {
            background: #f9fafb;
            border-radius: 10px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0,0,0,.05);
        }

        .post h3 {
            margin: 0 0 8px 0;
            font-size: 18px;
        }

        .post small {
            color: var(--gray);
            font-size: 13px;
        }

        .post p {
            margin: 12px 0;
            font-size: 14px;
            color: #374151;
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .post-actions a {
            text-decoration: none;
        }

        .auth-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 700px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }

            header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">

@auth

    <header>
        <h1>Welcome, {{ auth()->user()->name }}</h1>

        <form action="/logout" method="POST">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </header>

    <div class="card">
        <h2>Create New Post</h2>

        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <textarea name="body" placeholder="Write your post..."></textarea>
            <button class="btn btn-primary">Publish</button>
        </form>
    </div>

    <div class="card">
        <h2>Your Posts</h2>

        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <div>
                        <h3>{{ $post->title }}</h3>
                        <small>by {{ $post->user->name }}</small>
                        <p>{{ $post->body }}</p>
                    </div>

                    <div class="post-actions">
                        <a href="/edit-post/{{ $post->id }}">
                            <button class="btn btn-edit">Edit</button>
                        </a>

                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@else

    <div class="auth-grid">
        <div class="card">
            <h2>Create Account</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" placeholder="Name">
                <input name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button class="btn btn-primary">Register</button>
            </form>
        </div>

        <div class="card">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" placeholder="Name">
                <input type="password" name="loginpassword" placeholder="Password">
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

@endauth

</div>

</body>
</html>

