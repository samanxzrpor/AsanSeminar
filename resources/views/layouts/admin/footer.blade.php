
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#roles").change(function(){
            let selectedCountry = $(this).children("option:selected").val();
            console.log(selectedCountry);
        });
    });

    $(document).ready(function() {
        $(".event-date").persianDatepicker({
            altField: '.alt-field-event'
        });
    });
</script>
</html>
