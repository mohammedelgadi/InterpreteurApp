$(document).ready(function() {

    table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ],
        tableTools: {
            "columnDefs": [{"visible": false, "searchable": false, "targets": [0]}]
        }
    });

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        if(title!="" && title != 'Action') $(this).html( '<input type="text" placeholder="'+title+'"  style="width: 100%;" />' );
    } );

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


    table2 = $('#demandesTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ],
        tableTools: {
            "columnDefs": [{"visible": false, "searchable": false, "targets": [0]}]
        }
    });

    // Setup - add a text input to each footer cell
    $('#demandesTable tfoot th').each( function () {
        var title = $(this).text();
        if(title!="" && title != 'Action') $(this).html( '<input type="text" placeholder="'+title+'"  style="width: 100%;" />' );
    } );

    // Apply the search
    table2.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


    table3 = $('#tableCommande').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ],
        tableTools: {
            "columnDefs": [{"visible": false, "searchable": false, "targets": [0]}]
        }
    });

    // Setup - add a text input to each footer cell
    $('#tableCommande tfoot th').each( function () {
        var title = $(this).text();
        if(title!="" && title != 'Action') $(this).html( '<input type="text" placeholder="'+title+'"  style="width: 100%;" />' );
    } );

    // Apply the search
    table3.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $("#tableCommande").css("width","100%");
    $("#demandesTable").css("width","100%");
    $("#example").css("width","100%");


    $('#resend').on('click',function (e) {
        $id = $(this).parent().find('#idResend').val();

        $.ajax({
            url: '/facture/resend?id='+$id,
            type:"GET",
            success:function(data){
                $("#resendModal").modal('hide');
                $('#modalSuccess').find('.modal-body').html('Facture renvoyé au client');
                $('#modalSuccess').modal('toggle');
            },error:function(){
                alert("error!!!!");
            }
        });
    });

    $('.resendButton').on('click',function (e) {
        e.preventDefault();
        $("#idResend").val($(this).attr('data-id'));
        console.log($("#idResend").val());
        $("#resendModal").modal('show');
    });


    $("#factPanel").addClass('collapse');
    $("#demandePanel").addClass('collapse');
    $("#commandePanel").addClass('collapse');

});
