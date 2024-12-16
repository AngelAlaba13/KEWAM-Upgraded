<!-- resources/views/pdf/service.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details</title>
    <style>
        body {
            font-family: 'Arial', 'DejaVu Sans', sans-serif;
            margin: 30px;  /* Adjusted margin for the page */
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background-color: #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;  /* Increased bottom margin for spacing */
        }

        .header {
            max-height: 50px;
        }

        img {
            max-height: 90px;
        }

        .header .shop-info {
            text-align: right;
            font-size: 12px;
        }

        .title {
            font-size: 21px;  /* Increased font size for emphasis */
            font-weight: bold;
            margin-top: 120px;  /* Added space to accommodate the header */
            margin-bottom: 40px; /* Added bottom margin */
            text-align: center;
        }

        .section {
            margin: 12px 0; /* Increased margin between sections */
        }

        /* Label styles */
        .label {
            font-weight: bold;
            display: inline-block;
            width: 160px;  /* Set a fixed width to align labels properly */
            padding-right: 10px; /* Added space between label and value */
            text-align: left;
            font-size: 13px;
        }

        /* Value styles */
        .value {
            display: inline-block;
            text-align: left;
            line-height: 1.5;
            font-size: 13px;
        }

        .details {
            text-align: center;
            font-size: 13px;

            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header Section with Logo and Shop Information -->
    <div class="header">
        <div class="shop-info">
            <strong>KEWAM Computer Shop & Services</strong><br>
            Cabrera St., Bag-ong Lungsod, Tandag City, Philippines<br>
            09101720724
        </div>
    </div>

    <div class="title">SERVICE SHEET</div>

    <div class="details">CLIENT DETAILS</div>
    <br>

    <div class="section">
        <span class="label">Client Name:</span>
        <span class="value">{{ $data['clientName'] }}</span>
    </div>
    <div class="section">
        <span class="label">Contact:</span>
        <span class="value">{{ $data['clientContact'] }}</span>
    </div>
    <div class="section">
        <span class="label">Address:</span>
        <span class="value">{{ $data['clientAddress'] }}</span>
    </div>
    <br><br>


    <div class="details">SERVICE DETAILS</div>
    <br>

    <div class="section">
        <span class="label">Service:</span>
        <span class="value">{{ $data['service'] }}</span>
    </div>
    <div class="section">
        <span class="label">Service Provider:</span>
        <span class="value">{{ $data['serviceProvider'] }}</span>
    </div>

    <div class="section">
        <span class="label">Service Description:</span>
        <span class="value">{{ $data['status'] }}</span>
    </div>


    <br><br><br>

    <div class="section">
        <span class="label">Total Amount:</span>
        <span class="value">{{ $data['price'] }}</span>
    </div>

    <div>
        <span class="label">Down-Payment:</span>
        <span class="value">___________</span>
    </div>

    <div>
        <span class="label">Balance:</span>
        <span class="value">___________</span>
    </div>



    <div class="section">
        <span class="label">Status:</span>
        <span class="value">{{ $data['description'] }}</span>
    </div>
</body>
</html>
