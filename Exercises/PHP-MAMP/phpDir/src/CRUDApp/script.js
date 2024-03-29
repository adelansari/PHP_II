function showToast(message) {
  const toast = document.querySelector('#toast');
  toast.innerHTML = message;
  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 3000);
}

function setToastMessage(message) {
  if (message !== undefined) {
    showToast(message);
  }
}

function editRow(icon) {
  const row = icon.parentNode.parentNode;
  const id = row.children[0].innerHTML;
  const username = row.children[1];
  const password = row.children[2];
  const actions = row.children[3];

  if (icon.innerHTML === 'edit') {
    username.innerHTML = `<input type="text" class="edit-input" value="${username.innerHTML}">`;
    password.innerHTML = `<input type="text" class="edit-input" value="${password.dataset.password}">`;
    actions.innerHTML = '<i class="material-icons check-icon" onclick="submitEdit(this)">check</i>';
    icon.innerHTML = 'cancel';
  } else {
    username.innerHTML = username.children[0].value;
    password.innerHTML = '••••••••';
    actions.innerHTML = `<i class="material-icons" onclick="editRow(this)">edit</i>
         <form method="post" style="display: inline-block;">
           <input type="hidden" name="delete_id" value="${id}">
           <button type="submit"><i class="material-icons">delete</i></button>
         </form>`;
    icon.innerHTML = 'edit';
  }
}

function deleteRow(id) {
  if (confirm('Are you sure you want to delete this row?')) {
    const form = createForm('delete_id', id);
    document.body.appendChild(form);
    form.submit();
  }
}

function submitEdit(icon) {
  const row = icon.parentNode.parentNode;
  const id = row.children[0].innerHTML;
  const username = row.children[1].children[0].value;
  const password = row.children[2].children[0].value;

  const form = createForm('edit_id', id);
  form.appendChild(createInput('edit_username', username));
  form.appendChild(createInput('edit_password', password));
  document.body.appendChild(form);
  form.submit();
}

function createForm(name, value) {
  const form = document.createElement('form');
  form.method = 'post';
  form.style.display = 'none';
  form.appendChild(createInput(name, value));
  return form;
}

function createInput(name, value) {
  const input = document.createElement('input');
  input.type = 'hidden';
  input.name = name;
  input.value = value;
  return input;
}
