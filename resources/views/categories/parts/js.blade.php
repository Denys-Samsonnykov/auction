<script>
    $(document).ready(function (){
        $('#title').on('keyup', function () {
            $('#titleHelp').text(this.value.length + '/50')
        });
    });
</script>
