const url= 'http://localhost:8000/api/users/login';

const login = () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const user = {
        email,
        password
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(user),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(resp => resp.json())
    .then(data => {
        console.log(data);
        if (data.ok) {
            localStorage.setItem('token', data.token);
            window.location.href = 'http://localhost:8080/html/landing.html';
        } else {
            throw new Error(data.msg);
        }
    })
    .catch(err => {
        console.log(err);
    })

};

export {
    login
}


// Path: src\js\login\login.js
