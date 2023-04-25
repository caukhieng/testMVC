const array = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "B", "A", "Enter"];
let index = 0;
document.addEventListener("keydown", (event) => {
  const key = event.key;
  if(key.toLowerCase() === array[index].toLowerCase()){
    index++;
    if(index === array.length){
      // Display password input dialog
      const dialog = document.createElement('div');
      dialog.style = 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: 1px solid black; padding: 20px; z-index: 9999; border-radius: 10px;';
      dialog.innerHTML = `
        <label for="password" style="display: block; margin-bottom: 10px; color: #a30f2d;">Admin login</label>
        <input type="password" id="password" style="width: 100%; padding: 5px; border: 1px solid black; margin-bottom: 10px; border-radius: 999px;" required autofocus>
        <div style="display: flex; justify-content: center;">
          <button id="submit" style="margin-right: 10px; padding: 5px; border: 1px solid black; outline:none; border-radius: 999px;" >Submit</button>
          <button id="cancel" style="padding: 5px; border: 1px solid black; outline:none; border-radius: 999px;">Cancel</button>
        </div>`;
      document.body.appendChild(dialog);

      // Add event listeners for the submit and cancel buttons
      const submitBtn = dialog.querySelector('#submit');
      const cancelBtn = dialog.querySelector('#cancel');
      submitBtn.addEventListener('click', () => {
        const passwordInput = dialog.querySelector('#password');
        const password = passwordInput.value;
        if (password.toLowerCase() === atob(env.ADMIN_SECRET_KEY).toLowerCase()) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = atob(env.URL);
          document.body.appendChild(form);
          form.submit();
        } else {
            passwordInput.value = '';
            passwordInput.placeholder = 'Incorrect password';
            passwordInput.focus();
        }
      });
      cancelBtn.addEventListener('click', () => {
        dialog.remove();
      });

      // Add event listeners for the Enter and Esc keys
      document.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
          submitBtn.click();
        } else if (event.key === 'Escape') {
          cancelBtn.click();
        }
      });

      index = 0;
    }
  } else {
    index = 0;
  }
});
