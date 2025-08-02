<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bachelor Sphere</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
        }
        h1 {
            text-align: center;
            color: #007bff;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            color: #444;
            font-size: 1.2rem;
            margin: 15px 0;
            line-height: 1.8;
        }
        h2 {
            color: #333;
            margin-top: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            font-size: 1.8rem;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 12px 0;
            padding: 15px;
            background: #f9f9f9;
            border-left: 4px solid #007bff;
            transition: background 0.3s ease, transform 0.3s ease;
            border-radius: 5px;
        }
        ul li:hover {
            background: #e8f4ff;
            transform: scale(1.02);
        }
        ul li strong {
            color: #007bff;
        }
        .cta {
            text-align: center;
            margin-top: 40px;
        }
        .cta a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }
        .cta a:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .container {
                width: 95%;
                padding: 20px;
            }
            h1 {
                font-size: 2rem;
            }
            h2 {
                font-size: 1.5rem;
            }
            .cta a {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>About Bachelor Sphere</h1>
    <p><strong>Bachelor Sphere</strong> is a digital platform designed to simplify rental property management and enhance community engagement, specifically catering to bachelors and individuals living in shared accommodations. Our mission is to revolutionize how rental properties are managed and how people interact in communal living environments.</p>
    
    <h2>Key Features</h2>
    <ul>
        <li><strong>User Management:</strong> Secure registration, profile management, and authentication processes.</li>
        <li><strong>Admin Oversight:</strong> Tools for overseeing user activities and managing platform configurations.</li>
        <li><strong>To-Let Listings:</strong> List, search, filter, and verify rental properties efficiently.</li>
        <li><strong>Mess Management:</strong> Manage shared living resources, bill splitting, and coordination.</li>
        <li><strong>Social Networking:</strong> Engage through posts, comments, and direct messaging.</li>
        <li><strong>Booking & Payment Integration:</strong> Secure payment processing with local systems like bKash.</li>
        <li><strong>Rickshaw Fare Division:</strong> Easily split fares for shared rides with transparency.</li>
        <li><strong>Location Tracking:</strong> Track nearby amenities and shared resources using GPS.</li>
        <li><strong>Tuition Finder:</strong> Search and manage tuition services and revenue.</li>
        <li><strong>Lost & Found:</strong> Track and claim lost items within the community.</li>
    </ul>

    <p>Join Bachelor Sphere today and experience the future of rental property management and shared living!</p>

    <div class="cta">
        <a href="index.php">Get Started</a>
    </div>
</div>

</body>
</html>
