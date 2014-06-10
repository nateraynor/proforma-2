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

            $('.validate-repeat-send').click(function(e) {
                console.log('test');
                var id = $(this).attr('id');
                var html = $(this).parent();
                bootbox.confirm("Teklifi daha önce gönderdiniz . Tekrar göndermek ister misiniz ?", function(result) {
                    if (result === true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'proposals/sendProposalAjax/',
                            data: {id: id},
                            success: function(){
                                $('.message').empty();
                                $(".message").html("<div class='alert alert-success' style='text-align: center;'><h4 style='font-weight: bold !important;'>Teklif başarıyla gönderildi.</h4></div>");
                            }
                        });
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

              $('.add-customer').click(function(e) {
                var customer_name = $(this).parents('.modal-footer').siblings('.modal-body').find('.customer_name').val();
                var customer_surname = $(this).parents('.modal-footer').siblings('.modal-body').find('.customer_surname').val();
                var customer_email = $(this).parents('.modal-footer').siblings('.modal-body').find('.customer_email').val();
                var customer_company = $(this).parents('.modal-footer').siblings('.modal-body').find('.customer_company').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'customers/addCustomerAjax/',
                        data: {customer_name: customer_name, customer_surname: customer_surname, customer_email: customer_email, customer_company: customer_company},
                        success: function(customer_id){
                            $('.message').empty();
                            $(".message").html('<div class="alert alert-success" style="align: center;"><button class="close" data-close="alert"></button><span >Müşteri başarıyla eklendi.</span></div>');
                            $('.clear input[type="text"]').val('');
                            $('#customers-select').append('<option selected value="' +customer_id+ '">' + customer_name + '</option>');
                            $('#customers-select').multiSelect('refresh');
                        }
                    });

                });

        }
    };
}();