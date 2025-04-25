<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Update Student</h2>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Display Error Message -->
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-yellow-100 text-yellow-700 border border-yellow-400 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('update.student.post', ['id' => $student->studno]) }}" class="space-y-4">
            @csrf
            <label class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="fname" placeholder="First Name" value="{{ $student->fname }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
            <input type="text" name="mname" placeholder="Middle Name" value="{{ $student->mname }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" value="{{ $student->lname }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label class="block text-sm font-medium text-gray-700">Suffix</label>
            <input type="text" name="sname" placeholder="Suffix" value="{{ $student->sname }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label class="block font-semibold text-gray-700">Gender</label>
            <div class="flex space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="M" class="form-radio text-blue-600" {{ $student->gender == 'M' ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="F" class="form-radio text-pink-600" {{ $student->gender == 'F' ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Female</span>
                </label>
            </div>

            <label class="block text-sm font-medium text-gray-700">Birth Date</label>
            <input type="date" name="bdate" placeholder="Birth Date" value="{{ $student->bdate }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit" class="w-full bg-black text-white p-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">Submit</button>
        </form>
    </div>

</body>
</html>
