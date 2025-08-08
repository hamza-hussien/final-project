var taskInput = document.getElementById('taskText');
var addBtn = document.getElementById('addBtn');
var listItems = document.getElementById('listItems');
var switchModeBtn = document.getElementById('switchMode');

addBtn.onclick = function () {
    var taskText = taskInput.value.trim();

    if (taskText !== '') {
        var li = document.createElement('li');
        var span = document.createElement('span');
        span.textContent = taskText;

        var editBtn = document.createElement('button');
        editBtn.textContent = 'Edit';
        editBtn.style.marginLeft = '10px';
        editBtn.style.backgroundColor = '#ffc107';
        editBtn.style.color = '#fff';
        editBtn.style.border = 'none';
        editBtn.style.borderRadius = '5px';
        editBtn.style.padding = '5px 10px';
        editBtn.style.cursor = 'pointer';

        editBtn.onclick = function () {
            var newText = prompt('Edit your task:', span.textContent);
            if (newText !== null && newText.trim() !== '') {
                span.textContent = newText.trim();
            }
        };

        var deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.style.marginLeft = '10px';
        deleteBtn.style.backgroundColor = '#dc3545';
        deleteBtn.style.color = '#fff';
        deleteBtn.style.border = 'none';
        deleteBtn.style.borderRadius = '5px';
        deleteBtn.style.padding = '5px 10px';
        deleteBtn.style.cursor = 'pointer';

        deleteBtn.onclick = function () {
            listItems.removeChild(li);
        };

        li.appendChild(span);
        li.appendChild(editBtn);
        li.appendChild(deleteBtn);
        listItems.appendChild(li);

        taskInput.value = '';
    }
};

taskInput.onkeypress = function (e) {
    if (e.key === 'Enter') {
        addBtn.click();
    }
};

switchModeBtn.onclick = function () {
    document.body.classList.toggle('dark-mode');
};