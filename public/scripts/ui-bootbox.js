var UIBootbox = function () {
    return {
        init: function () {
            $('.validate-delete').click(function(e) {
                var location = $(this).attr('location');
                bootbox.confirm("Emin misiniz? Kayıt bilgileri kalıcı olarak silinecektir!", function(result) {
                    if (result === true) {
                        window.location.href = location;
                    }
                });
                return false;
            });

             $('.validate-rejected').click(function(e) {
                var id = $(this).attr('id');
                var html = $(this).parent();
                console.log($(this).parent());
                bootbox.confirm("Emin misiniz? Teklif reddedilecek!", function(result) {
                    if (result === true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'proposals/proposalRejected/',
                            data: {id: id},
                            success: function(){
                                $('.message').empty();
                                $(".message").html("<div class='alert alert-danger' style='text-align: center;'><h4 style='font-weight: bold !important;'>Teklif Reddedildi.</h4></div>");
                            }
                        });
                    }
                });
                return false;
            });

             $('.validate-approval').click(function() {
                var id = $(this).attr('id');
                console.log(id);

                bootbox.confirm("Emin misiniz? Teklif onaylanacak!", function(result) {
                    if (result === true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'proposals/proposalApproval/',
                            data: {id: id},
                            success: function(e){
                                 $('.message').empty();
                                 $(".message").html("<div class='alert alert-success' style='text-align: center;'><h4 style='font-weight: bold !important;'>Teklif Onaylandı.</h4></div>");

                            }
                        });
                    }
                });
                return false;
            });
        }
    };
}();