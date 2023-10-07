</main>
<footer>
    
<footer class="footer">
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Todos los derechos reservados</p>
    </div>
</footer>
<a href="#top" class="floating-button">&#8593;</a>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script>
$(document).ready(function () {
    $('#tabla_id').DataTable({
        "pageLength":3,
        lengthMenu:[
            [3, 10, 15],
            [3, 10, 15]
        ],
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"

        }        
        
    });
});
</script>
<script>
$(document).ready(function(){
    $("#tabla_id").DataTable({
        "pageLength":3,
        lengthMenu:[
            [3,10,25,50],
            [3,10,25,50]
        ]
    })
});
</script>

<script>
    function borrar(id){
    Swal.fire({
        title: '¿Desea borrar el registro?',
        showDenyButton: true,
        confirmButtonText: 'Si, Borrar'
    }).then((result) => {
         if (result.isConfirmed) {
            window.location="index.php?txtID="+id;
  }     
})       
    }
 </script>

</body>
</html>
