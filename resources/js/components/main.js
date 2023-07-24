function loginButton() {
    const formData = new FormData(Event.target);
    const email = formData.get("email");
    const password = formData.get("password");
    const correctEmail = email;
    const correctPassword = password;
    const isLoggedIn = email === correctEmail && password === correctPassword;
    if (isLoggedIn) {
        Swal.fire({
            icon: "success",
            title: "Login Berhasil",
            text: "Selamat datang! Anda berhasil login.",
            showConfirmButton: false,
            timer: 3000,
        });
    } else {
        Swal.fire({
            icon: "error",
            title: "Login Gagal",
            text: "Username atau password salah. Silahkan coba lagi.",
            showConfirmButton: false,
            timer: 3000,
        });
    }
    //Event.preventDefault();
}
document.getElementById("formLogin").addEventListener("submit", loginButton);
