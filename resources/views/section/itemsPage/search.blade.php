@foreach ($categories as $category)
    <tr class="even:bg-gray-100 odd:bg-white text-xs sm:text-sm md:text-base text-gray-800 cursor-pointer hover:bg-gray-200">
        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->id }}</td>
        <td class="px-2 py-1 border border-gray-300 flex items-center space-x-2 h-10">
            <img src="{{ asset($category->image_path) }}" alt="Image" class="w-8 h-8 object-cover mr-2">
            <span>{{ $category->name }}</span>
        </td>
        <td class="px-3 py-2 border border-gray-300">{{ $category->category }}</td>
        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->quantity }}</td>
        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->price, 2) }}</td>
        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->value, 2) }}</td>
    </tr>
@endforeach
