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
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <h2 class="text-center text-xl font-bold mb-5">Items Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Sold Item</th>
                <th>Price</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="bg-gray-100">
                <td class="text-center">{{ $category->id }}</td>
                <td class="text-left">{{ $category->name }}</td>
                <td class="text-left">{{ $category->category }}</td>
                <td class="text-center">{{ $category->quantity }}</td>
                <td class="text-center">{{ $category->sold_quantity }}</td>
                <td class="text-left">&#8369;{{ number_format($category->price, 2) }}</td>
                <td class="text-left">&#8369;{{ number_format($category->value, 2) }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
