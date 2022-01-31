<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Edit a timeentry</title>
</head>
<body>
  
<div>
    <h2>Project_id: {{ $timeentry->project_id }}</h2>
    <p>User_id: {{ $timeentry->user_id}}</p>
    <p>Task_id: {{ $timeentry->task_id }}</p>
    <p>Duration: {{ $timeentry->duration }}</p>
</div>

</body>
</html>