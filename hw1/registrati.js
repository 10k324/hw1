function checkName(event) {
    const input = event.currentTarget;
    const errorDiv = input.parentNode.querySelector('.error');
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        input.parentNode.classList.add('errorj');
        errorDiv.textContent = 'Il nome è obbligatorio';
    }
}

function checkSurname(event) {
    const input = event.currentTarget;
    const errorDiv = input.parentNode.querySelector('.error');
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        input.parentNode.classList.add('errorj');
        errorDiv.textContent = 'Il cognome è obbligatorio';
    }
}

function jsonCheckUsername(json) {
    const errorDiv = document.querySelector('.username .error');
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        document.querySelector('.username').classList.add('errorj');
        errorDiv.textContent = 'Nome utente già utilizzato';
    }
}

function jsonCheckEmail(json) {
    const errorDiv = document.querySelector('.email .error');
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        document.querySelector('.email').classList.add('errorj');
        errorDiv.textContent = 'Email già utilizzata';
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username input');
    const errorDiv = input.parentNode.querySelector('.error');
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.classList.add('errorj');
        errorDiv.textContent = 'Sono ammesse lettere, numeri e underscore. Max. 15';
        formStatus.username = false;
    } else {
        errorDiv.textContent = '';
        fetch("checkuser.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    const errorDiv = emailInput.parentNode.querySelector('.error');
    const emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!emailPattern.test(String(emailInput.value).toLowerCase())) {
        emailInput.parentNode.classList.add('errorj');
        errorDiv.textContent = 'Email non valida';
        formStatus.email = false;
    } else {
        errorDiv.textContent = '';
        fetch("checkemail.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    const errorDiv = passwordInput.parentNode.querySelector('.error');
    if (formStatus.password = passwordInput.value.length >= 8) {
        passwordInput.parentNode.classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        passwordInput.parentNode.classList.add('errorj');
        errorDiv.textContent = 'La password deve contenere almeno 8 caratteri';
    }
}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    const errorDiv = confirmPasswordInput.parentNode.querySelector('.error');
    if (formStatus.confirmPassword = confirmPasswordInput.value === document.querySelector('.password input').value) {
        confirmPasswordInput.parentNode.classList.remove('errorj');
        errorDiv.textContent = '';
    } else {
        confirmPasswordInput.parentNode.classList.add('errorj');
        errorDiv.textContent = 'Le password non coincidono';
    }
}

function checkSignup(event) {
    const checkbox = document.querySelector('.allow input');
    formStatus[checkbox.name] = checkbox.checked;
    if (Object.keys(formStatus).length !== 8 || Object.values(formStatus).includes(false)) {
        event.preventDefault();
        console.log('Form not valid:', formStatus);
    } else {
        console.log('Form valid:', formStatus);
    }
}

const formStatus = {'upload': true};
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('form').addEventListener('submit', checkSignup);
