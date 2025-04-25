<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col items-center justify-start min-h-screen bg-gray-100 space-y-10 py-10">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <div class="flex items-center mb-4">
            <h2 class="text-2xl font-bold">Student Registration</h2>
            <form method="POST" action="{{ route('logout') }}" class="logout-container">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
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

        <!-- Registration Form -->
        <form action="{{ route('register.student') }}" method="post" class="space-y-4">
            @csrf
            <label class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="fname" placeholder="Enter your first name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
            <input type="text" name="mname" placeholder="Enter your middle name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="lname" placeholder="Enter your last name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label class="block text-sm font-medium text-gray-700">Suffix</label>
            <input type="text" name="sname" placeholder="Enter your suffix" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label for="gender" class="block font-semibold text-gray-700">Gender</label>
            <div class="flex space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="M" class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-700">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="F" class="form-radio text-pink-600">
                    <span class="ml-2 text-gray-700">Female</span>
                </label>
            </div>

            <input type="date" name="bdate" placeholder="Enter your birthdate" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <button type="submit" class="w-full bg-black text-white p-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">Submit</button>
        </form>
    </div>

    <div class="w-full max-w-4xl mt-10 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left border-b border-gray-300">#</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Name</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Gender</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Birthdate</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($students as $student)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $student->studno }}</td>
                        <td class="py-3 px-6 text-left">{{ $student->lname }}, {{ $student->fname }} {{ $student->mname }} {{ $student->sname }}</td>
                        <td class="py-3 px-6 text-left">{{ $student->gender }}</td>
                        <td class="py-3 px-6 text-left">{{ $student->bdate }}</td>
                        <td class="py-3 px-6 text-left">
                            <a href="{{ route('update.student',['id'=>$student->studno]) }}" class="btn-update">Update</a>
                            <a href="{{ route('delete.student', ['id'=>$student->studno]) }}" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
