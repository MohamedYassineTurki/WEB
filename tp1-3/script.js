let todolist = document.querySelector('#todo-list');
let taskname = document.querySelector('#task-name');
let taskcontent = document.querySelector('#task-content');
let addtodo = document.querySelector('#add-todo');

addtodo.addEventListener('click', Addtodo);

function Addtodo() {
    let tasknamevalue = taskname.value;
    let taskcontentvalue = taskcontent.value;
    if (tasknamevalue === '' || taskcontentvalue === '') {
        alert('Please fill in the fields');
        return;
    }

    let task= document.createElement('div');
    task.classList.add('task');
    task.innerHTML = `
        <div>
            <h3>${tasknamevalue}:${taskcontentvalue}</h3>
        </div>
        <img src="https://cdn-icons-png.flaticon.com/512/484/484662.png" alt="Supprimer" class="delete-todo">`;
    
    todolist.appendChild(task);

    taskname.value = '';
    taskcontent.value = '';

    let deletetodo = task.querySelector('.delete-todo'); //task mouch document bech tafekh ken l task li hachtek beha
    deletetodo.addEventListener('click', () => {
        todolist.removeChild(task);})
}