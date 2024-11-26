document.addEventListener('DOMContentLoaded', function () {
    const tasksContainer = document.getElementById('tasks');

    // Perform AJAX request
    fetch('http://localhost:7070/view_tasks.php')
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(tasks => {
        // Clear loading message
        tasksContainer.innerHTML = '';

        // Loop through tasks and display them
        tasks.forEach(task => {
          const taskDiv = document.createElement('div');
          taskDiv.classList.add('task');
          taskDiv.innerHTML = `
            <h2>${task.title}</h2>
            <p>${task.descriptiion}</p>
          `;
          tasksContainer.appendChild(taskDiv);
        });
      })
      .catch(error => {
        tasksContainer.innerHTML = `Error loading tasks: ${error.message}`;
      });
  });
