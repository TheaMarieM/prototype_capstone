<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEU Monitoring - Select Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-center items-center font-sans py-10">

    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-slate-800 tracking-tight">BEU Monitoring System</h1>
        <p class="text-slate-500 mt-2">Identify your role to proceed</p>
    </div>

    <div class="flex flex-wrap justify-center gap-6 max-w-6xl px-6 w-full">
        
        <a href="/admin/login" class="w-full md:w-80 group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border-t-4 border-red-600 cursor-pointer text-center">
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-red-600">Discipline Chair</h3>
            <p class="text-sm text-slate-500 mt-2">Log in with Employee ID</p>
        </a>

        <a href="/admin/login" class="w-full md:w-80 group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 cursor-pointer text-center">
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600">Principal / Asst.</h3>
            <p class="text-sm text-slate-500 mt-2">Log in with Employee ID</p>
        </a>

        <a href="/admin/login" class="w-full md:w-80 group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border-t-4 border-green-600 cursor-pointer text-center">
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-green-600">Class Adviser</h3>
            <p class="text-sm text-slate-500 mt-2">Log in with Employee ID</p>
        </a>

        <a href="/admin/login" class="w-full md:w-80 group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border-t-4 border-yellow-500 cursor-pointer text-center">
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-yellow-500">Student</h3>
            <p class="text-sm text-slate-500 mt-2">Log in with Student ID</p>
        </a>
        
        <a href="/admin/login" class="w-full md:w-80 group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border-t-4 border-purple-500 cursor-pointer text-center">
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-purple-500">Parent</h3>
            <p class="text-sm text-slate-500 mt-2">Log in with Parent ID</p>
        </a>
    </div>
</body>
</html>