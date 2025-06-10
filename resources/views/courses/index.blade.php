<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-white rounded" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-white rounded" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($courses as $course)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                        <div class="p-6 flex-grow">
                            <h3 class="font-bold text-lg text-gray-900">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">By {{ $course->teacher }}</p>
                            <p class="mt-4 text-gray-700">{{ $course->description }}</p>
                        </div>
                        <div class="p-6 bg-gray-50 border-t border-gray-200">
                             <p class="text-sm text-gray-500 mb-4">Starts on: {{ \Morilog\Jalali\Jalalian::fromCarbon($course->start_date)->format('Y/m/d H:i') }}</p>
                            <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-500">
                                    Enroll Now
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                         <div class="p-6 text-gray-500">
                            There are no courses available for enrollment at the moment.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>