<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Entry: {{ $timeEntry->date }}</title>
</head>

<body>

    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div class="rounded">
            <div
                class="w-full h-64 flex flex-col justify-between dark:bg-gray-800 bg-white dark:border-gray-700 rounded-lg border border-gray-400 mb-6 py-5 px-4">
                <div>
                    <h4 class="text-gray-800 dark:text-gray-100 font-bold mb-3">{{ $timeEntry->project->name }}</h4>
                    <p class="text-gray-800 dark:text-gray-100 text-sm">{{ $timeEntry->task->name }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
