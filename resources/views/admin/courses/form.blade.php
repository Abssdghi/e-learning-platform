@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('title', $course->title ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('description', $course->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="teacher" class="block text-sm font-medium text-gray-700">Teacher</label>
    <input type="text" name="teacher" id="teacher" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('teacher', $course->teacher ?? '') }}" required>
</div>


<!-- <div class="mb-4">
    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date (e.g., 1403/04/15 10:00)</label>
    <input type="text" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('start_date', isset($course) ? \Morilog\Jalali\Jalalian::fromCarbon($course->start_date)->format('Y/m/d H:i') : '') }}" required>

</div> -->

<div class="mb-4">
    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
    <input 
        type="text" 
        name="start_date" 
        id="start_date" 
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
        value="{{ old('start_date', isset($course) ? \Morilog\Jalali\Jalalian::fromCarbon($course->start_date)->format('Y/m/d H:i:s') : '') }}"        
        {{-- این اتریبیوت برای شناسایی توسط کتابخانه استفاده می‌شود --}}
        data-jdp 
        
        required>
</div>