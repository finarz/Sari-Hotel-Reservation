<?php require_once './header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Booking</title>
    <script>
        function checkLogin(event) {
            <?php if (!isset($_SESSION["loggedin"])): ?>
                event.preventDefault(); // Stop form submission
                alert("Please sign in to proceed with booking.");
                window.location.href = "SignIn.php?redirect=Booking.php";
            <?php endif; ?>
        }

        // Function to display room details dynamically when a room type is selected
        function displayRoomDetails(roomType) {
            const rooms = {
                "Superior King": {
                    image: "superior-king.jpeg",
                    description: "A spacious room with a King-size bed and iconic views of KLCC.",
                    price: 260,
                    amenities: [
                        { icon: "fas fa-bed", text: "King-size Bed" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                },
                "Superior Twin": {
                    image: "superior-twin.jpeg",
                    description: "A comfortable Twin-size room with a great city view.",
                    price: 260,
                    amenities: [
                        { icon: "fas fa-bed", text: "Twin Beds" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                },
                "Deluxe King": {
                    image: "deluxe-king.jpeg",
                    description: "Deluxe room with a King-size bed and premium amenities.",
                    price: 300,
                    amenities: [
                        { icon: "fas fa-bed", text: "King-size Bed" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                },
                "Deluxe Twin": {
                    image: "deluxe-twin.jpeg",
                    description: "Deluxe room featuring Twin beds and luxury design.",
                    price: 300,
                    amenities: [
                        { icon: "fas fa-bed", text: "Twin Beds" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                },
                "Executive Suite": {
                    image: "executive-suite.jpeg",
                    description: "Spacious suite with a King-size bed and exclusive executive services.",
                    price: 900,
                    amenities: [
                        { icon: "fas fa-bed", text: "King-size Bed" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                },
                "President Suite": {
                    image: "president-suite.jpeg",
                    description: "Luxurious President Suite with a master bedroom and breathtaking views.",
                    price: 2500,
                    amenities: [
                        { icon: "fas fa-bed", text: "King-size Bed" },
                        { icon: "fas fa-wifi", text: "Free Wifi" },
                        { icon: "fas fa-snowflake", text: "AC" },
                        { icon: "fas fa-tv", text: "TV" },
                        { icon: "fas fa-car", text: "Parking" },
                        { icon: "fas fa-mug-hot", text: "Coffee/Tea Maker" }
                    ]
                }
            };

            const room = rooms[roomType];

            // Update the room details section
            document.getElementById("roomImage").src = "./PICTURE/" + room.image;
            document.getElementById("roomDescription").innerText = room.description;
            document.getElementById("roomPrice").innerText = "RM " + room.price + " / night";

            // Create the amenities list dynamically
            let amenitiesHTML = "";
            room.amenities.forEach(amenity => {
                amenitiesHTML += `<div class="amenity-item"><i class="fas ${amenity.icon}"></i> ${amenity.text}</div>`;
            });
            document.getElementById("roomAmenities").innerHTML = amenitiesHTML;
        }
    </script>
    <style>
        /* Flex container to align form and room details */
        .booking-container {
            display: flex;
            justify-content: space-between;
            gap: 40px;
            align-items: flex-start;
            margin: 40px auto;
            width: 90%;
            max-width: 1200px;
        }

        /* Styling the form section */
        .form-section {
            flex: 1;
            max-width: 600px;
        }

        /* Styling the room details section */
        .room-details-section {
            flex: 1;
            max-width: 500px;
            padding-left: 20px;
            text-align: left;
        }

        /* Styling the room image */
        .room-details img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .room-details p {
            font-size: 16px;
            color: white;
        }

        .room-details .price {
            font-size: 18px;
            color: rgb(242, 168, 72);
            font-weight: bold;
        }

        .room-details .amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;  /* Gap between icons */
            margin-top: 10px;
        }

        .room-details .amenities .amenity-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: calc(33.33% - 10px); /* 3 icons per row */
            margin-bottom: 10px; /* Space between rows */
        }

        .room-details .amenities i {
            color: rgb(237, 191, 93);
            font-size: 20px;
        }

        /* Styling for form elements */
        .form-section select, .form-section input, .form-section textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-section button {
            padding: 10px 20px;
            background-color: #d77f0b;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-section button:hover {
            background-color: #c4670a;
        }

        .form-section .gender {
            display: flex;
            margin-right:90px;
            gap:4px;
        }
    </style>
</head>
<body>
    <hr style="height:1px;border-width:0;background-color:rgb(209, 127, 11)">

    <section class="Booking">

        <div class="booking-container">
            <!-- Left side: Form Section -->
            <div class="form-section">
                <form action="" method="post" onsubmit="checkLogin(event)">
                    <div class="column">
                        <label> Customer Name : </label>
                        <input type="text" id="customerName" name="customerName" onchange="upperCase()">

                        <script>
                            function upperCase() {
                                const x = document.getElementById("customerName");
                                x.value = x.value.toUpperCase();
                            }
                        </script>
                        <label> No Telephone : </label>
                        <input type="tel" name="phoneNo">
                        <label> Email Address </label>
                        <input type="email" name="email">
                        <label> Gender : </label>
                        <div class="gender">
                        <input type="radio"  name="gender" value="male"> Male
                        <input type="radio"  name="gender" value="female"> Female
                        </div>
                    </div>
                    <div class="column">
                        <label> Room Type : </label>
                        <select name="roomType" onchange="displayRoomDetails(this.value)">
                            <option value="">Select a Room</option>
                            <option value="Superior King">Superior King</option>
                            <option value="Superior Twin">Superior Twin</option>
                            <option value="Deluxe King">Deluxe King</option>
                            <option value="Deluxe Twin">Deluxe Twin</option>
                            <option value="Executive Suite">Executive Suite</option>
                            <option value="President Suite">President Suite</option>
                        </select>
                        <label> Destination : </label>
                        <select name="destination">
                            <option>Kuala Lumpur</option>
                            <option>Pahang</option>
                            <option>Terengganu</option>
                            <option>Sabah</option>
                            <option>Pulau Pinang</option>
                            <option>Langkawi</option>
                        </select>
                        <label> Address : </label>
                        <textarea type="text" name="cusAddress"></textarea>
                        <label> Check In : </label>
                        <input type="date" id="checkIn" name="checkIn">
                        <label> Check Out : </label>
                        <input type="date" id="checkOut" name="checkOut">
                    </div>
                    <div style="width: 100%; text-align: right;">
                        <button type="submit">Book</button>
                    </div>
                </form>
            </div>

            <!-- Right side: Room Details Section -->
            <div class="room-details-section">
                <h2>Room Details</h2>
                <div class="room-details">
                    <img id="roomImage" src="" alt="Room Image">
                    <p id="roomDescription"></p>
                    <p id="roomPrice" class="price"></p>
                    <div id="roomAmenities" class="amenities"></div>
                </div>
            </div>
        </div>

    </section>
</body>
</html>
<?php require_once './footer.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db_connect.php';
    $CustName = $_POST['customerName'];
    $NoTel = $_POST['phoneNo'];
    $Email = $_POST['email'];
    $Gender = $_POST['gender'];
    $RoomType = $_POST['roomType'];
    $Destination = $_POST['destination'];
    $Address = $_POST['cusAddress'];
    $CheckIn = $_POST['checkIn'];
    $CheckOut = $_POST['checkOut'];

    // Prepare SQL query
    $sql = "INSERT INTO booking (customerName, phoneNo, email, gender, roomType, destination, cusAddress, checkIn, checkOut) 
            VALUES ('$CustName', '$NoTel', '$Email', '$Gender','$RoomType','$Destination', '$Address', '$CheckIn', '$CheckOut')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Your booking has been sent successfully!');
                window.location.href = 'Booking.php';
            </script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //Close db connection
    mysqli_close($conn);
    }
?>
