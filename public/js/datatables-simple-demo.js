window.addEventListener('DOMContentLoaded', event => {

    const datatables = document.getElementById('datatables');
    if (datatables) {
        new simpleDatatables.DataTable(datatables);
    }
});
