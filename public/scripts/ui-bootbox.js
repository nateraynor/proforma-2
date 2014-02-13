var UIBootbox = function () {
    return {
        init: function () {
            $('.validate-delete').click(function(e) {
                var location = $(this).attr('location');
                bootbox.confirm("Eminmisiniz? Kayıt bilgileri kalıcı olarak silinecektir!", function(result) {
                    console.log(location);
                    if (result === true) {
                        window.location.href = location;
                    }                
                }); 

                return false;
            });
        }
    };
}();