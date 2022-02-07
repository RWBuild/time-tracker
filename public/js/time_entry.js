// getDate function
function getDate() {
    $("#submit").on("click", function () {
        var date = new Date($("#date-input").val());
        day = date.getDate();
        month = date.getMonth() + 1;
        year = date.getFullYear();
        alert([day, month, year].join("-"));
    });
}
// DisplayRow function
function getContainer() {
    const row = document.getElementById("form-container");
    const node = document.createElement("div");

    node.innerHTML = `<form action="" method="POST">
   <div class="row_container">

       <div class="select_field">
           <label for="company_name">company Name:</label>
           <select>
               <option>company</option>
           </select>
       </div>


       <div class="select_field">
           <label for="project_name">project Name:</label>
           <select>
               <option>project</option>
           </select>
       </div>

       <div class="select_field">
           <label for="task">Task:</label>
           <select>
               <option>task</option>
           </select>
       </div>

       <div class="select_field">
           <label for="time">time:</label>
           <input type="text">
       </div>
       <div class="select_field">
           <label for="time"></label>
       </div>
   </div>
   </form>`;
    row.appendChild(node);
}
