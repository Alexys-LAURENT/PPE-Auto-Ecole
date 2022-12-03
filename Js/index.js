function closeAlertDanger() {
    let alerte = document.querySelectorAll(".alert-danger");
    alerte.forEach(element => {
        element.style.cssText = "display : none !important";
    });
}