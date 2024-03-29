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
  const usernameCell = row.children[1];
  const passwordCell = row.children[2];
  const username = usernameCell.textContent;
  const password = passwordCell.getAttribute('data-password');
  const actions = row.children[3];
  const deleteIcon = actions.querySelector('.delete-icon');

  if (icon.textContent === 'edit') {
    usernameCell.innerHTML = `<input type="text" value="${username}">`;
    passwordCell.innerHTML = `<input type="text" value="${password}">`;
    usernameCell.setAttribute('data-original', username); // Store the original username
    passwordCell.setAttribute('data-original', password); // Store the original password
    icon.textContent = 'save';
    deleteIcon.textContent = 'close';
    deleteIcon.onclick = function () {
      cancelEdit(this);
    };
  } else {
    submitEdit(icon);
  }
}

function cancelEdit(icon) {
  const row = icon.parentNode.parentNode;
  const usernameCell = row.children[1];
  const passwordCell = row.children[2];
  usernameCell.textContent = usernameCell.getAttribute('data-original'); // Revert to the original username
  passwordCell.textContent = '••••••••'; // Revert to the original password
  row.querySelector('.edit-icon').textContent = 'edit';
  icon.textContent = 'delete';
  icon.onclick = function () {
    deleteRow(this);
  };
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
