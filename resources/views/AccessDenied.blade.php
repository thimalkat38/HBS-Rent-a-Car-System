<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-10 max-w-lg text-center border border-red-400">

        <!-- Warning Icon -->
        <div class="flex justify-center mb-5">
            <svg class="w-20 h-20 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M12 9v3m0 3h.01M10.29 3.86L1.82 18a1.5 1.5 0 001.29 2.25h17.78A1.5 1.5 0 0022.18 18L13.71 3.86a1.5 1.5 0 00-2.42 0z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-red-600 mb-3">Unauthorized Access</h1>
        <p class="text-gray-700 mb-6">
            You don't have permission to view this page.  
            Please contact your administrator if you believe this is a mistake.
        </p>

        <!-- Back Button -->
        <button onclick="history.back()"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
            ← Go Back
        </button>

    </div>

</body>
</html>
