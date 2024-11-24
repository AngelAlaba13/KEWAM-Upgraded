<!-- resources/views/vendor/pagination/custom-tailwind.blade.php -->
@if ($paginator->hasPages())
    <div class="flex items-center justify-center">
        @if ($paginator->onFirstPage())
            <span class=" bg-slate-200 px-2 py-1 text-black rounded-sm mr-3 text-xs border border-gray-500">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="bg-slate-700 px-2 py-1 text-white rounded-sm mr-3 text-xs border border-gray-500 hover:bg-slate-800">Previous</a>
        @endif

        <!-- Only show "Next" and "Previous" buttons -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="bg-slate-700 px-4 py-1 text-white rounded-sm mr-3 text-xs border border-gray-500 hover:bg-slate-800">Next</a>
        @else
            <span class="bg-slate-200 px-4 py-1 text-black rounded-sm mr-3 text-xs border border-gray-500">Next</span>
        @endif
    </div>
@endif
