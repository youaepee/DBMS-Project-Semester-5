<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-purple: #6b46c1;
            --light-purple: #9f7aea;
            --dark-purple: #553c9a;
            --white: #ffffff;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--white);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--primary-purple);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar a {
            text-decoration: none;
            color: var(--white);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            background-color: var(--light-purple);
            transform: translateY(-2px);
        }

        .content {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            color: var(--primary-purple);
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        img {
            max-width: 200px;
            margin: 2rem 0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }

        p {
            font-size: 1.1rem;
            color: #4a5568;
            margin: 1.5rem 0;
            line-height: 1.8;
        }

        .donate-button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: var(--primary-purple);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            margin-top: 2rem;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-purple);
        }

        .donate-button:hover {
            background-color: var(--white);
            color: var(--primary-purple);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .footer {
            background-color: var(--dark-purple);
            color: var(--white);
            padding: 1rem;
            text-align: center;
            margin-top: auto;
        }

        .footer-text {
            font-size: 0.9rem;
            margin: 0;
            opacity: 0.9;
        }

        /* Added card-like container for UPI section */
        .upi-container {
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(107, 70, 193, 0.1);
            border: 1px solid #e2e8f0;
        }

        /* Added animation for page elements */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content > * {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
    <title>GiveHope - Payment Confirmation</title>
</head>
<body>
    <header class="navbar">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="/about_us.html">About Us</a></li>
                <li><a href="/donate_now.html">Donate Now</a></li>
                <li><a href="Contact_us.html">Contact</a></li>
                <li><a href="/Faqs.html">FAQs</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h1>Payment Confirmation</h1>
        
        <div class="upi-container">
            <h1>UPI Payment</h1>
             <img src="upilogo.jpeg" alt="Your Logo">

            <p>Thank you for your generous donation to GiveHope! Your contribution means the world to us and the causes we support. With your help, we're one step closer to creating a brighter and more hopeful future for those in need.</p>
            <a href="donate_now.html" class="donate-button">Make Another Donation</a>
        </div>
    </div>

    <footer class="footer">
        <p class="footer-text">© 2023 GiveHope. All Rights Reserved.</p>
    </footer>
</body>
</html>