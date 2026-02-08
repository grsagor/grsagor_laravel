<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h2 style="color: #ff5722; margin-top: 0;">New Contact Form Submission</h2>
        <p style="margin: 0;">You have received a new message from your portfolio website.</p>
    </div>

    <div style="background: #ffffff; padding: 20px; border: 1px solid #e9ecef; border-radius: 8px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px 0; font-weight: bold; width: 120px; color: #555;">Name:</td>
                <td style="padding: 10px 0;">{{ $name }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555;">Email:</td>
                <td style="padding: 10px 0;"><a href="mailto:{{ $email }}" style="color: #ff5722; text-decoration: none;">{{ $email }}</a></td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555;">Subject:</td>
                <td style="padding: 10px 0;">{{ $subject }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; vertical-align: top; color: #555;">Message:</td>
                <td style="padding: 10px 0; white-space: pre-wrap;">{{ $message }}</td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; text-align: center; font-size: 12px; color: #6c757d;">
        <p style="margin: 0;">This email was sent from the contact form on your portfolio website.</p>
        <p style="margin: 5px 0 0 0;">You can reply directly to this email to respond to {{ $name }}.</p>
    </div>
</body>
</html>
