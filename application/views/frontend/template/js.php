<div id="backscrollUp">
    <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
</div>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/wow.min.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/back-menus.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/plugins.js"></script>
<script src="<?= base_url('template/frontend/assets/') ?>assets/js/main.js"></script>
<script type="text/javascript">
window.onload = function() {
    tampilkanTanggal();
    jam();
}

function jam() {
    var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;

    h = set(d.getHours());
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout(jam, 1000);
}

function tampilkanTanggal() {
    var e = document.getElementById('tanggal'),
        d = new Date(),
        day, month, year;

    day = set(d.getDate());

    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    month = monthNames[d.getMonth()];
    year = d.getFullYear();

    e.innerHTML = day + ' ' + month + ' ' + year;
}

function set(e) {
    e = e < 10 ? '0' + e : e;
    return e;
}
</script>

<!-- <script type="text/javascript">
document.addEventListener('contextmenu', event => event.preventDefault());

document.onkeydown = function(e) {
    if (e.key === 'ContextMenu' || e.which === 93) {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'i' || e.key === 'j' || e.key === 'c')) {
        e.preventDefault();
        return false;
    }
    if (e.key === 'F12' || e.which === 123) {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
        return false;
    }
};
</script> -->