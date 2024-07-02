<!DOCTYPE html>
<html>
<head>
    <title>Your Onboarding Process is Currently Under Review</title>
</head>
<body>
    <p>Dear {{ $firstName }},</p>

    <p>We are excited to have you join our team at {{ env('COMPANY_NAME') }}! We wanted to inform you that your onboarding process is currently under review.</p>

    <p>Our team is carefully reviewing all the necessary documents and information you have provided. This is a standard procedure to ensure that everything is in order before we proceed to the next steps.</p>

    <h3>What to Expect Next</h3>
    <ul>
        <li><strong>Review Completion:</strong> We expect to complete the review process within the next 24 hours.</li>
        <li><strong>Next Steps:</strong> Once the review is complete, you will receive further instructions regarding the next steps in your onboarding process.</li>
        <li><strong>Contact Information:</strong> If we need any additional information or documentation from you, we will reach out to you via this email address.</li>
    </ul>

    <h3>Need Assistance?</h3>
    <p>If you have any questions or need further assistance, please do not hesitate to contact us at <a href="mailto:{{env('SUPPORT_EMAIL')}}">{{env('SUPPORT_EMAIL')}}</a>. Our team is here to help you and ensure a smooth onboarding experience.</p>

    <p>Thank you for your patience and cooperation. We look forward to welcoming you to {{ env('COMPANY_NAME') }}.</p>

    <p>Best regards.</p>
</body>
</html>
