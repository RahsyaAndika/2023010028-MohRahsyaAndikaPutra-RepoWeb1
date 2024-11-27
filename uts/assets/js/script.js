function toggleForm() {
    const form = document.getElementById('login-form');
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block'; 
    } else {
        form.style.display = 'none'; 
    }
}