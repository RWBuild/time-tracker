@extends('layouts.main')

@section('page-title') Create Client @endsection

@section('content') 
@include('includes.main-nav')

  <div class="wrapper">
      <div class="card">
          <div class="flex items-center space-x-2 mb-5">
             <div>
              <a href="#" class="btn"><i class="ri-arrow-left-s-fill"></i></a>
             </div>
             <div>
                <p class="text-lg font-bold uppercase">{{ date('M d, Y', strtotime( now() ))}}</p>
             </div>
             <div>
              <button  disabled class="btn opacity-50 cursor-not-allowed"><i class="ri-arrow-right-s-fill"></i></button>
             </div>
          </div>

          <div class="divide-y-4">
            <form action="#" method="post" class="pb-4">
              <div class="flex space-x-2 py-2">
                  <select name="client" id="client" class="form-input">
                    <option value="company">Company</option>
                    <option value="company">Company</option>
                    <option value="company">Company</option>
                  </select>
                  <select name="project" id="project" class="form-input">
                    <option value="Project-test">Project-test</option>
                    <option value="Project-test">Project-test</option>
                    <option value="Project-test">Project-test</option>
                  </select>
              </div>
                <div class="flex space-x-2 items-start">
                 <div class="flex-1">
                  <select name="task" id="task" class="form-input">
                    <option value="task-1">task-1</option>
                    <option value="task-1">task-1</option>
                    <option value="task-1">task-1</option>
                  </select>
                 </div>
                  <div class="flex space-x-1 flex-1">
                      <input type="number" name="hours" id="hours" class="form-input" placeholder="HOURS">
                      <input type="number" name="minutes" id="minutes" class="form-input" placeholder="MINUTES">
                  </div>
                </div>
            </form>

            <div class="forms-wrapper"></div>

            <div class="py-4">
              <button onclick="handleAddNewRow()" class="btn btn-sm">
                Add Row
              </button>
            </div>

          </div>

      </div>
  </div>

@endsection

@section('scripts')
    <script>
        function handleAddNewRow(){
          const formsWrapper = document.querySelector('.forms-wrapper');
          const div = document.createElement('div');
          div.innerHTML = `

          <form action="#" method="post" class="pb-4">
              <div class="flex space-x-2 py-2">
                  <select name="client" id="client" class="form-input">
                    <option value="company">Company</option>
                    <option value="company">Company</option>
                    <option value="company">Company</option>
                  </select>
                  <select name="project" id="project" class="form-input">
                    <option value="Project-test">Project-test</option>
                    <option value="Project-test">Project-test</option>
                    <option value="Project-test">Project-test</option>
                  </select>
              </div>
                <div class="flex space-x-2 items-start">
                 <div class="flex-1">
                  <select name="task" id="task" class="form-input">
                    <option value="task-1">task-1</option>
                    <option value="task-1">task-1</option>
                    <option value="task-1">task-1</option>
                  </select>
                 </div>
                  <div class="flex space-x-1 flex-1">
                      <input type="number" name="hours" id="hours" class="form-input" placeholder="HOURS">
                      <input type="number" name="minutes" id="minutes" class="form-input" placeholder="MINUTES">
                  </div>
                </div>
            </form>
          
          `;

          formsWrapper.appendChild(div);

        }
    </script>
@endsection

