<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
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
            margin-bottom: 20px;
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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px; /* Add margin to ensure it doesn't overlap with the header */
            margin-bottom: 60px; /* Add bottom margin to ensure space for the footer */
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4B5563; /* Tailwind's gray-600 */
            color: #fff;
        }

        .bg-gray-100 {
            background-color: #f3f4f6;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        /* Footer Style */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            padding: 10px;
            background-color: #f3f4f6;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-top: 150px; /* Adjusted margin to account for fixed header */
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

    <!-- Report Title -->
    <h2 >Items Report</h2>

    <!-- Table with Items -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Sold Item</th>
                <th>Price</th>
                <th>Total Price Sold</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="bg-gray-100">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-left">{{ $category->name }}</td>
                <td class="text-left">{{ $category->category }}</td>
                <td class="text-center">{{ $category->quantity }}</td>
                <td class="text-center">{{ $category->sold_quantity }}</td>
                <td class="text-left">&#8369;{{ number_format($category->price, 2) }}</td>
                <td class="text-left">&#8369;{{ number_format($category->total_price_sold, 2) }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer with Timestamp -->
    <div class="footer">
        Printed on: {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}
    </div>
</body>
</html>
