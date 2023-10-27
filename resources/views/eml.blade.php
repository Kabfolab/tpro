<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <h1>Send an Email</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('send-email') }}">
        @csrf
        <label>Email Address:</label>
        <input type="email" name="email" required>
        <br>
        <label>Subject:</label>
        <input type="text" name="subject" required>
        <br>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <br>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
