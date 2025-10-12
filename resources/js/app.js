import "./bootstrap";
import Alpine from "alpinejs";
import "flowbite";
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";
window.Alpine = Alpine;

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#book_id_add")) {
        new TomSelect("#book_id_add", {
            create: false,
            placeholder: "Cari judul buku...",
            allowEmptyOption: true,
            sortField: {
                field: "text",
                direction: "asc",
            },
        });
    }

    if (document.querySelector("#student_id_add")) {
        new TomSelect("#student_id_add", {
            placeholder: "Cari nama siswa...",
            allowEmptyOption: true,
        });
    }
});

Alpine.start();
