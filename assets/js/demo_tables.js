
    function delete_row(row){
        
        var box = $("#mb-remove-row");
        box.addClass("open");
        
        box.find(".mb-control-yes").on("click",function(){
            box.removeClass("open");
            $("#"+row).hide("slow",function(){
                // $(this).remove();
                var id = $(this).data('id');
                $.get("/admin/khu-vuc/xoa/" + id,function(){
                    noty({text: 'Xoá Thành Công', layout: 'bottomRight', type: 'success'});  
                })
            });
        });
        
    }
