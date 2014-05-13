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
                bootbox.confirm("Emin misiniz? Teklif reddedilecek!", function(result) {
                    if (result === true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'proposals/proposalRejected/',
                            data: {id: id},
                            success: function(){
                                $(this).parent().remove();
                            }
                        });
                    }
                });
                return false;
            });


             $('.validate-approval').click(function() {
                var id = $(this).attr('id');
                bootbox.confirm("Emin misiniz? Teklif reddedilecek!", function(result) {
                    if (result === true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'proposals/proposalApproval/',
                            data: {id: id},
                            success: function(e){
                                $(this).parent().remove();
                            }
                        });
                    }
                });
                return false;
            });
        }
    };
}();