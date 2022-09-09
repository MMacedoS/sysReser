function getUrl() {
    return document.getElementById("baseurl").value;
}


$(".btn-add").on("click", function () {
    $("tbody select.select2").select2("destroy");
    var $table = $(this).closest(".row").prev().find(".table-dynamic");
    var $tr = $table.find(".dynamic-form").first();
    var $clone = $tr.clone();
    $clone.show();
    $clone.find("input,select").not(".ignore").val("");
    $clone.find(".error-stock").remove();
    $table.append($clone);
    setTimeout(function () {
        $("tbody select.select2").select2({
            language: "pt-BR",
            width: "100%",
            theme: "bootstrap4",
        });
    }, 100);
});

$("body").on("click", ".btn-remove", "click", function (e) {
    e.preventDefault();
    swal({
        title: "Você esta certo?",
        text: "Deseja remover esse item mesmo?",
        icon: "warning",
        buttons: true,
    }).then((willDelete) => {
        if (willDelete) {
            var trLength = $(this)
                .closest("tr")
                .closest("tbody")
                .find("tr").length;
            if (trLength > 1) {
                $(this).closest("tr").remove();
            } else {
                swal(
                    "Atenção",
                    "Você deve ter ao menos um item na lista",
                    "warning"
                );
            }
        }
    });
});

$('body').on('change', '.product','change', function(e){
    var trLength = $(this).closest("tr").closest("tbody").find("tr");

    console.log(trLength.children());
});

