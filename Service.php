<?php require_once './header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Service</title>
    <style>
        h2 {
            color: white;
            text-align: center;
            background-color: rgb(209, 119, 3);
            padding: 12px 0px;
            font-family: Arial, sans-serif;
        }

        .service-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
        }

        .service-column {
            background-color: rgb(7, 7, 7);
            border: 2px solid rgb(209, 127, 11);
            flex: 1 1 36%;
            max-width: 36%;
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgb(209, 127, 11);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-column:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 30px rgb(209, 127, 11);
        }

        .service-column img {
            width: 100%;
            max-height: 300px; 
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid rgb(209, 127, 11);
        }

        .service-info {
            padding: 20px;
        }

        .service-info h3 {
            margin: 0 0 15px;
            font-size: 25px;
            color: #FFD700;
        }

        .service-info p {
            margin: 10px 0;
            color: #ccc;
            font-size: 1.2em;
        }

        .service-info .price {
            color: #FFD700;
            font-weight: bold;
            font-size: 1.3em;
            margin: 10px 0;
        }

        .service-info .book-now {
            display: inline-block;
            padding: 12px 25px;
            background-color: #FFD700;
            color: #121212;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 8px;
            margin-top: 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .service-info .book-now:hover {
            background-color: rgb(170, 51, 1);
            color: #FFD700;
        }
    </style>
</head>

<body>
    <hr style="height:2px;border-width:0;background-color:rgb(209, 127, 11)">
    <h2> Service & Facilities</h2>
    <div class="service-row">

        <!-- Restaurant -->
        <div class="service-column">
            <div class="service-info">
                <h3>Restaurant</h3>
                <img src="./PICTURE/restaurant.jpg" alt="Restaurant">
                <p class="price">From RM 500</p>
                <p>Offering a variety of local and international dishes.</p>
            </div>
        </div>

        <!-- Spa and Wellness -->
        <div class="service-column">
            <div class="service-info">
                <h3>Spa and Wellness</h3>
                <img src="./PICTURE/spa-and-wellness.jpg" alt="Spa and Wellness">
                <p class="price">From RM 360</p>
                <p>Relax and rejuvenate with our spa and wellness services.</p>
            </div>
        </div>

        <!-- Swimming Pool -->
        <div class="service-column">
            <div class="service-info">
                <h3>Swimming Pool</h3>
                <img src="./PICTURE/swimming-pool.jpg" alt="Swimming Pool">
                <p class="price">From RM 139.90</p>
                <p>Enjoy our outdoor swimming pool with a beautiful view.</p>
            </div>
        </div>

        <!-- Fitness Center -->
        <div class="service-column">
            <div class="service-info">
                <h3>Fitness Center</h3>
                <img src="./PICTURE/fitness-center.jpg" alt="Fitness Center">
                <p class="price">From RM 199</p>
                <p>Stay fit with our fully equipped fitness center.</p>
            </div>
        </div>

        <!-- Concierge Service -->
        <div class="service-column">
            <div class="service-info">
                <h3>Concierge Service</h3>
                <img src="./PICTURE/concierge-service.jpg" alt="Concierge Service">
                <p class="price">From RM 129</p>
                <p>Personalized concierge service to assist with your needs.</p>
            </div>
        </div>

        <!-- Event Planning -->
        <div class="service-column">
            <div class="service-info">
                <h3>Event Planning</h3>
                <img src="./PICTURE/event-planning.jpg" alt="Event Planning">
                <p class="price">From RM 1000</p>
                <p>Professional event planning for weddings and conferences.</p>
            </div>
        </div>
    </div>

    <br><br>
</body>
</html>

<?php require_once './footer.php'; ?>
