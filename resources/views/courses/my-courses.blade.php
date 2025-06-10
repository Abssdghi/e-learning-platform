<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Enrolled Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-white rounded" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($mycourses as $course)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">By {{ $course->teacher }}</p>
                            <p class="mt-4 text-gray-700">{{ $course->description }}</p>
                            <p class="mt-4 text-sm text-gray-500">Starts on: {{ \Morilog\Jalali\Jalalian::fromCarbon($course->start_date)->format('Y/m/d H:i') }}</p>
                        </div>
                    </div>
                @empty
                     <div class="col-span-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                         <div class="p-6 text-gray-500">
                            You have not enrolled in any courses yet.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $mycourses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>