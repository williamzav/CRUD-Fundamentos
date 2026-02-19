
</div>


<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-ocultar alertas-->
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert-auto').forEach(el => {
            new bootstrap.Alert(el).close();
        });
    }, 4000);
</script>

</body>
</html>
