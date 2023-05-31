import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteBtns = document.querySelectorAll('.btn-delete');

if(deleteBtns.length > 0) {
    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            event.preventDefault()
            const comicTitle = btn.getAttribute ('data-comic-title');

            const deleteModal = new bootstrap.Modal (
                document.getElementById("delete-modal")
            );
            
            document.getElementById("action-delete").addEventListener("click", function () {
                btn.parentElement.submit();
            });
            document.getElementById('comic-title').innerText = comicTitle;
            deleteModal.show();
        })
    })
}