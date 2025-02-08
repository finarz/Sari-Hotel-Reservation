<?php require_once './header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Room Price</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .room-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 20px;
            margin-top: 20px;
        }
        .room-container {
            display: flex;
            flex-wrap: wrap; /* Allow cards to wrap if needed */
            justify-content: center; /* Center the cards horizontally */
            gap: 20px; /* Space between cards */
            margin-top: 20px;
        }

        .room-card {
            border: 1px solid gold;
            border-radius: 10px;
            padding: 10px;
            width: 500px; /* Set the width of the card */
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            margin: 10px auto; /* Center the card horizontally and add space around */
        }

        .room-card img {
            width: 90%;
            height: auto;
            border-radius: 10px;
        }


        .price {
            font-size: 18px;
            color: rgb(242, 168, 72);
            font-weight: bold;
        }
        .book-now {
            display: inline-block;
            padding: 10px 15px;
            background-color: #d77f0b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .book-now:hover {
            color:rgb(241, 227, 209);
        }
        .amenities {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns for the icons */
            justify-items: center; /* Center items horizontally */
            gap: 20px; /* Adds space between each amenity */
            margin-top: 10px;
        }

        .amenities div {
            display: flex;
            align-items: center; /* Align icon and text vertically in the center */
            justify-content: center; /* Center the content horizontally */
            gap: 8px; /* Space between icon and text */
            font-size: 16px;
        }

        .amenities i {
            font-size: 20px;
            color: rgb(237, 191, 93); /* Adjust color if needed */
        }


    </style>
</head>
<body>
<hr style="height:1px;border-width:0;background-color:rgb(209, 127, 11)">

    <div class="room-container" id="room-list">
        <!-- JavaScript will insert rooms here -->
    </div>

    <script>
        // Function to return amenities with icons
        function getAmenities(bedSize) {
            return `
                <div class="amenities">
                    <div><i class="fas fa-wifi"></i> Free Wifi</div>
                    <div><i class="fas fa-bed"></i> ${bedSize} Bed</div>
                    <div><i class="fas fa-snowflake"></i> AC</div>
                    <div><i class="fas fa-tv"></i> TV</div>
                    <div><i class="fas fa-car"></i> Parking facility</div>
                    <div><i class="fas fa-mug-hot"></i> Coffee/tea maker</div>
                </div>
            `;
        }

        // Updated function to include dynamic bed size in the room details
        function getRoomDetails(name, image, price, description, bedSize) {
            return `
                <div class="room-card">
                    <h2>${name}</h2>
                    <img src="./PICTURE/${image}" alt="${name}">
                    <p class="price">RM ${price} / night</p>
                    <p>${description}</p><br>
                    ${getAmenities(bedSize)} <br> 
                    <a href="Booking.php?room=${encodeURIComponent(name)}&price=${price}" class="book-now">BOOK NOW</a>
                </div>
            `;
        }

        // Array of room objects with different bed sizes
        const rooms = [
            {
                name: "SUPERIOR KING",
                image: "superior-king.jpeg",
                price: 260,
                description: "A spacious room with a King-size bed and iconic views of KLCC.",
                bedSize: "King"  
            },
            {
                name: "SUPERIOR TWIN",
                image: "superior-twin.jpeg",
                price: 260,
                description: "A comfortable Twin-size room with a great city view.",
                bedSize: "Twin Single" 
            },
            {
                name: "DELUXE KING",
                image: "deluxe-king.jpeg",
                price: 300,
                description: "Deluxe room with a King-size bed and premium amenities.",
                bedSize: "King"  
            },
            {
                name: "DELUXE TWIN",
                image: "deluxe-twin.jpeg",
                price: 300,
                description: "Deluxe room featuring Twin beds and luxury design.",
                bedSize: " Twin Single"  
            },
            {
                name: "EXECUTIVE SUITE",
                image: "executive-suite.jpeg",
                price: 900,
                description: "Spacious suite with a King-size bed and exclusive executive services.",
                bedSize: "King"  
            },
            {
                name: "PRESIDENT SUITE",
                image: "president-suite.jpeg",
                price: 2500,
                description: "Luxurious President Suite with a master bedroom and breathtaking views.",
                bedSize: "King" 
            }
        ];

        // Function to display all rooms
        function displayRooms() {
            let roomContainer = document.getElementById("room-list");
            let roomHTML = "";

            rooms.forEach(room => {
                roomHTML += getRoomDetails(room.name, room.image, room.price, room.description, room.bedSize); // Pass bedSize dynamically
            });

            roomContainer.innerHTML = roomHTML;
        }

        // Call the function to display rooms
        displayRooms();

    </script>

</body>
</html>
<br><br>
<?php require_once './footer.php'; ?>
