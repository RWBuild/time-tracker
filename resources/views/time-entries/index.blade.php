<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <div>

            @forelse ($time_entries as $timeEntry)
                <div id="submit_changes" style="background: grey; padding: 30px; margin-bottom: 10px">
                    <form action="{{ route('time-entries.store') }}" method="POST" >
                        @csrf
                        @method('post')
                        <select name="client_id" id="clients_list" onchange="getProjects(this)">
                            <option value="">--select clients--</option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @empty
                                <p>No clients for this date.</p>
                            @endforelse
                        </select>
                        <select name="project_id" id="project_list" onchange="getTask(this)"></select>
                        <select name="task_id" id="task_list"></select>

                        <input type="text" name="duration" id="duration">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::User()->id }}">
                        <button type="submit" id="sub" name="save">Save</button>
                    </form>
                </div>
            @empty
                <p>No entries Found</p>
            @endforelse
    </div>

    <script>
        function getProjects(obj) {
            let clientId = obj.value;
            fetch(`http://127.0.0.1:8000/time-entries?client=${clientId}`).then(response => {
                    response.json().then((res) => {
                        obj.nextElementSibling.innerHTML = "";
                        res.forEach((value) => {
                            obj.nextElementSibling.innerHTML +=
                                `<option value="${value.id}">${value.name}</option>`;
                        })
                    })
                })
                .catch(error => {
                    console.log(error)
                });
        }

        function getTask(obj) {
            let projectId = obj.value;
            fetch(`http://127.0.0.1:8000/time-entries?project=${projectId}`).then(response => {
                    response.json().then((res) => {
                        obj.nextElementSibling.innerHTML = "";
                        res.forEach((value) => {
                            obj.nextElementSibling.innerHTML +=
                                `<option value="${value.id}">${value.name}</option>`;
                        })
                    })
                })
                .catch(error => {
                    console.log(error)
                });
        }

        const all_forms = document.querySelectorAll('#submit_changes');
        all_forms.forEach((form) => {
            form.addEventListener('focusout', (event) => {
                console.log(event.target.value)
            });
        })

        const client_inputs = document.querySelectorAll('#clients_list');
        client_inputs.forEach((clients) => {
            console.log(clients.nextElementSibling.parentNode)
        })

        function saveChanges() {
            // event.preventDefault();
            let client_id = document.querySelector('#clients_list').value;
            let project_id = document.querySelector('#project_list').value;
            let task_id = document.querySelector('#task_list').value;
            let duration = document.querySelector('#duration').value;
            let user_id = document.querySelector('#user_id').value;

            if (project_id.length == 0) {
                alert("select project");
            } else if (task_id.length == 0) {
                alert("select task");
            } else if (duration.length == 0) {
                alert("select duration");
            }else {
                document.getElementById('submit_changes').submit();
            }
        }
    </script>

</body>

</html>
