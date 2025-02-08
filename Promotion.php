<?php require_once './header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Special Offers</title>
    <style>

        .promo_section {
            max-width: 900px;
            margin: 0 auto;
            background-color: #000000; 
            border: 1px solid rgb(209, 127, 11); 
            border-radius: 10px;
        }

        .title {
            text-align: center;
            color: #d4af37; 
            font-weight: bold;
            margin: 20px 0;
        }

        .promo_details {
            padding-left: 20px;
        }

        .promo {
            display: flex;
            background-color: #000000; 
            box-shadow: 0 4px 10px rgba(212, 175, 55, 0.3); 
            border: 1px solid rgb(209, 127, 11); 
            border-radius: 8px;
            overflow: hidden;
        }

        .promo:hover {
            transform: scale(1.02); 
        }

        .promo img {
            width: 35%;
            border-right: 1px solid rgb(209, 127, 11); 
        }

        .promo_details h2 {
            margin-bottom: 15px;
            color: #d4af37; 
            font-family: sans-serif;
        }

        .promo_details p {
            margin-bottom: 20px;
            color: #d4af37;
            font-family: sans-serif;
        }

        button {
            background-color: #000000; 
            color: #d4af37; 
            border: 2px solid rgb(209, 127, 11); 
            padding: 10px 20px;
            font-family: sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 5px;
        }

        button:hover {
            background-color: #d4af37; 
            color: #1a1a1a; 
            border: 2px solid #1a1a1a;
        }

    </style>
</head>
<body>
    <hr style="height:1px;border-width:0;background-color:rgb(209, 127, 11)">
    <br>
    <div class="promo_section">
        <h1 class="title">Special Promotions</h1>
        <div class="promo">
            <img src="./PICTURE/pic2.avif" alt="Get Away For Just RM99">
            <div class="promo_details">
                <h2>Your Perfect Escape for Only RM 199</h2>
                <p>
                    Treat yourself to an unforgettable three-night stay in the vibrant cities of Kuala Lumpur or Pulau Penang starting at <strong>RM 199</strong>. Plus, enjoy <strong>25,000 Sari Honors Points</strong> redeemable for a free night at over 500 luxurious Sari Hotel locations.
                </p>
                <button onclick="myFunction()">Claim Promo Code</button>
            </div>
        </div>

        <div class="promo">
            <img src="./PICTURE/pic1.avif" alt="Sari Honor Discount">
            <div class="promo_details">
                <h2>Book Now & Save: Exclusive Honors Discount</h2>
                <p>
                    Unlock up to <strong>17% off</strong> our Best Available Rate by securing your next stay in advance. Plan your dream vacation today!
                </p>
                <button onclick="myFunction()">Claim Promo Code</button>
            </div>
        </div>

        <div class="promo">
            <img src="./PICTURE/pic3.avif" alt="2X Points">
            <div class="promo_details">
                <h2>Double the Points, Double the Fun</h2>
                <p>
                    Earn twice the <strong>Sari Honors Points</strong> with every night you stay! Whether its a quick escape or a long vacation, the more nights you stay, the more rewards you get. Don't miss out on earning double the perks!
                </p>
                <button class="offer-button"  onclick="myFunction()">Claim Points</button>
            </div>
        </div>

        <div class="promo">
            <img src="./PICTURE/pic4.avif" alt="Breakfast Included">
            <div class="promo_details">
                <h2>Wake Up to Complimentary Breakfast</h2>
                <p>
                    Start every morning with a delicious complimentary breakfast for all registered guests during their stay. It's the perfect way to fuel up for your day of adventure. Plus, as a welcome gift, all first-time guests can enjoy a free breakfast on us during your stay.
                </p>
                <button class="offer-button"  onclick="myFunction()">Claim Breakfast</button>
            </div>
        </div>

        <div class="promo">
            <img src="./PICTURE/pic5.avif" alt="Season To Stay Sale">
            <div class="promo_details">
                <h2>Seasonal Sale: Save 20%</h2>
                <p>
                    Take advantage of an exclusive <strong>20% discount</strong> during our Seasonal Sale.
                    <br><strong>Book By:</strong> January 15, 2025<br><strong>Stay By:</strong> April 21, 2025
                </p>
                <button onclick="myBook()">Book Your Stay Now</button>
            </div>
        </div>

        <div class="promo">
            <img src="./PICTURE/pic6.avif" alt="Stay Longer in Paradise">
            <div class="promo_details">
                <h2>Stay Longer, Save More</h2>
                <p>
                    Enjoy up to <strong>20% off</strong> when you stay longer at our stunning resorts in <strong>Pahang</strong>, <strong>Terengganu</strong>, <strong>Sabah</strong>, and more. The more nights you stay, the bigger the savings. Its the perfect escape!
                </p>
                <button class="offer-button" onclick="myFunction()">Claim Promo Code</button>
            </div>
        </div>
    
        <div class="promo">
            <img src="./PICTURE/pic7.avif" alt="Experience the Stay">
            <div class="promo_details">
                <h2>Luxury Awaits: Premium Stay</h2>
                <p>
                    Treat yourself to the ultimate stay with perks like on-property credit, fast WiFi, early check-in, and more. Experience luxury like never before.
                </p>
                <button class="offer-button" onclick="myFunction()">Claim Promo Code</button>
            </div>
        </div>
    </div>
    <br><br>

        <script>
        function myFunction() {
            let x = confirm('Your Redeem Succesfull!');
            window.location.href = 'Promotion.php';
        }

        function myBook() {
            window.location.href = 'RoomPrice.php';
        }

        
    </script>

</body>
</html>
<?php require_once './footer.php'; ?>