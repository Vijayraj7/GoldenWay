<?php 
function sendMail($mail)
{
    // HTML message
    $msg = '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 14px;
                color: #000;
            }
            .reply {
                font-weight: bold;
            }
            .quote-block {
                margin-top: 20px;
                padding-left: 10px;
                border-left: 2px solid #ccc;
                color: #444;
            }
            .quote-block .header {
                color: #777;
                font-size: 13px;
                margin-bottom: 10px;
            }
            .quote-block p {
                color: #1a73e8;
                margin: 6px 0;
            }
            .signature-img {
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <p class="reply">Confirmed.</p>
        <p>Thanks &amp; regards.</p>
        <br/>

        <div class="quote-block">
            <div class="header">
                From: Jithin Parakkad Unnikrishnan &lt;forv100@gmail.com&gt;<br/>
                Sent: 2025-05-20 11:06<br/>
                To: shanmugaraj.m@algurg.com<br/>
                Subject: RV FOR SHANMUGARAJ MOHANRAJ
            </div>

            <p><strong>Greetings from Emirates NBD!</strong></p>

            <p>Dear Mr. SHANMUGARAJ MOHANRAJ,</p>

            <p>Thank you for your interest in Emirates NBD Card products.</p>

            <p>As part of the credit card product verification process, we would like to confirm whether you have applied for the ENBD VISA INFINITE CREDIT CARD.</p>

            <p>Please <em>`reply all`</em> to this mail with your comment <strong>“Confirmed”</strong> or <strong>“Not Confirmed”</strong> as soon as you receive this e-mail.</p>

            <p>Basis your confirmation, we will proceed further on your credit card application.</p>

            <p>Should you choose to not confirm your application, we will cancel the application in the system and confirm this back to you.</p>

            <p>We look forward to your revert at the earliest and assure you of our best services at all times.</p>
        </div>

        <div class="signature-img">
            <img src="https://backend.dayalifeline.com/p/signature_g.png" alt="Signature" style="height: 300px;" />
        </div>
    </body>
    </html>';

    // set headers for HTML content
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: SHANMUGARAJ MOHANRAJ <shanmugaraj.m@algurg.com>\r\n";
$headers .= "Reply-To: forv100@gmail.com\r\n";
$headers .= "Cc: IISVerification@EmiratesNBD.com, confirmation@emiratesnbd.com, sajeeshkumar@mabeaat.com, AmrMAH@EmiratesNBD.com, saleem@mabeaat.com, jayaram@mabeaat.com, mirza.raheel@mabeaat.com, surumi@mabeaat.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();



date_default_timezone_set('Asia/Dubai');
    // send the mail
    echo $headers;
    // if(mail($mail, 'Re: RV FOR SHANMUGARAJ MOHANRAJ', $msg, $headers)) {
    //     echo "Mail sent successfully.";
    // } else {
    //     echo "Mail sending failed.";
    // }
}
sendMail('forv100@gmail.com');
