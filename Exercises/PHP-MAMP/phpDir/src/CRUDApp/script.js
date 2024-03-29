function showToast(message) {
  const toast = document.getElementById('toast');
  toast.innerHTML = message;
  toast.className = 'toast show';
  setTimeout(function () {
    toast.className = toast.className.replace('show', '');
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

  if (icon.innerHTML == 'edit') {
    username.innerHTML = '<input type="text" class="edit-input" value="' + username.innerHTML + '">';
    password.innerHTML = '<input type="text" class="edit-input" value="' + password.innerHTML + '">';
    actions.innerHTML = '<i class="material-icons" onclick="submitEdit(this)">check</i>';
    icon.innerHTML = 'cancel';
  } else {
    username.innerHTML = username.children[0].value;
    password.innerHTML = password.children[0].value;
    actions.innerHTML =
      '<i class="material-icons" onclick="editRow(this)">edit</i><form method="post" style="display: inline-block;"><input type="hidden" name="delete_id" value="' +
      id +
      '"><button type="submit"><i class="material-icons">delete</i></button></form>';
    icon.innerHTML = 'edit';
  }
}

function submitEdit(icon) {
  const row = icon.parentNode.parentNode;
  const id = row.children[0].innerHTML;
  const username = row.children[1].children[0].value;
  const password = row.children[2].children[0].value;

  const form = document.createElement('form');
  form.method = 'post';
  form.style.display = 'none';
  document.body.appendChild(form);

  const editId = document.createElement('input');
  editId.type = 'hidden';
  editId.name = 'edit_id';
  editId.value = id;
  form.appendChild(editId);

  const editUsername = document.createElement('input');
  editUsername.type = 'hidden';
  editUsername.name = 'edit_username';
  editUsername.value = username;
  form.appendChild(editUsername);

  const editPassword = document.createElement('input');
  editPassword.type = 'hidden';
  editPassword.name = 'edit_password';
  editPassword.value = password;
  form.appendChild(editPassword);

  form.submit();
}
