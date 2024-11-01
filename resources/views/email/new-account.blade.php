<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account Credentials</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f8fa; background-image: url('https://media.istockphoto.com/id/996352862/vector/financial-accounting-seamless-pattern-with-flat-line-icons-bookkeeping-background-tax.jpg?s=612x612&w=0&k=20&c=astTEiJNkiBNTzuMqutK5rvoe2UlHGI_hDxKB1Xptu8='); background-repeat: repeat;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; background-color: rgba(245, 248, 250, 0.95);">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <table role="presentation" style="width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.015);">
                    <!-- Logo Section -->
                    <tr>
                        <td style="padding: 30px 0; text-align: center;">
                            <img src="https://app.capexfinancialservices.org/public/app/img/logo-2.png" alt="Company Logo" width="150" height="50" style="display: block; margin: 0 auto;">
                        </td>
                    </tr>

                    <!-- Header with blue gradient -->
                    <tr>
                        <td style="background-image: linear-gradient(135deg, #2563eb, #3b82f6), url('https://your-domain.com/path/to/header-pattern.png'); background-blend-mode: overlay; padding: 40px 40px; border-radius: 0;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; text-align: center;">Welcome, {{ $user->fname }} {{ $user->lname }}!</h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="color: #374151; font-size: 16px; line-height: 24px; margin: 0 0 20px;">Here are your login credentials:</p>

                            <table role="presentation" style="width: 100%; background-color: #f8fafc; border-radius: 6px; margin: 20px 0;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0 0 10px; color: #6b7280; font-size: 14px;">Email:</p>
                                        <p style="margin: 0 0 20px; color: #111827; font-size: 16px; font-weight: bold;">{{ $user->email }}</p>

                                        <p style="margin: 0 0 10px; color: #6b7280; font-size: 14px;">Password:</p>
                                        <p style="margin: 0; color: #111827; font-size: 16px; font-weight: bold;">{{ $password }}</p>
                                    </td>
                                </tr>
                            </table>
                            <a style="padding:3%; background-color: #0a1249; color:#fff; border: radius 5px; text-decoration:none" href="https://app.capexfinancialservices.org/">Login to Capex Webapp</a>
                            <p style="color: #070c43; font-size: 16px; line-height: 24px; margin: 20px 0 0;">Please change your password after logging in for the first time.</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 20px; text-align: center; border-radius: 0 0 8px 8px;">
                            <p style="margin: 0; color: #6b7280; font-size: 14px;">If you didn't request this email, please ignore it or contact support.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
